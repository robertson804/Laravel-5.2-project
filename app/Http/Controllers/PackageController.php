<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePackagePriceRequest;
use App\Http\Requests\UpdatePackageRequest;
use App\Http\Utilities\ImageHandler;
use App\Http\Utilities\ShippingCalculations;
use App\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Yajra\Datatables\Services\DataTable;
use Yajra\Datatables\Datatables;
use App\Http\Requests\CreateAuthRequest;
use App\Http\Requests\CreatePackageRequest;
use App\Http\Requests\resolvePackageIssue;
use App\Package;
use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::all();

        return view('admin.package.index', compact('packages'));
    }

    public function show($id)
    {

        $package = Package::findOrFail($id);

        return view('admin.package.show', compact('package'));
    }


    public function create()
    {
        return view('admin.package.create');
    }

    public function store(CreatePackageRequest $request)
    {
        //Mass Assign
        $package = Package::create($request->except('weight'));

        $package->status = $request->price == 0 ? 'resolve' : 'pending';
        $package->weight = $request->weight;

        //HAndle the image saving
        $image = $request->open_image;
        $filename = 'package-open-' . time() . '.' . $image->getClientOriginalExtension();
        ImageHandler::storeImage($image, $filename);
        $package->open_image = $filename;

        $image = $request->close_image;
        $filename = 'package-close-' . time() . '.' . $image->getClientOriginalExtension();
        ImageHandler::storeImage($image, $filename);
        $package->close_image = $filename;

        //Get an open order or create it
        $order = $package->user->orders()->whereIn('status', ['pending', 'consolidated'])->firstOrCreate([
            'user_id' => $package->user_id,
        ]);
        //Reset the order Status
        $order->update([
            'status' => 'pending',
            'consolidated_at' => Carbon::now()
        ]);

        //Attach the package to the order
        $package->order()->associate($order);
        $package->save();

        \Session::flash('flash_message', "Package has been created");
        return redirect()->action('OrderController@process', $order);
    }

    public function edit(Package $package)
    {

        return view('admin.package.edit', compact('package'));
    }

    public function update(Package $package, UpdatePackageRequest $request)
    {
        //Only do this update if the package is unused
        if (in_array($package->status, ['pending', 'resolve'])) {
            if ($request->price) {
                $package->status = 'pending';
            } else {
                $package->status = 'resolve';
            }
        }
        $package->update($request->except('open_image','close_image'));

        if ($request->open_image) {
            //HAndle the image saving
            $image = $request->open_image;
            $filename = 'package-open-' . time() . '.' . $image->getClientOriginalExtension();
            ImageHandler::storeImage($image, $filename);
            $package->open_image = $filename;
        }

        if ($request->close_image) {

            $image = $request->close_image;
            $filename = 'package-close-' . time() . '.' . $image->getClientOriginalExtension();
            ImageHandler::storeImage($image, $filename);
            $package->close_image = $filename;
        }

        $package->save();

        \Session::flash('flash_message', 'Package Updated');
        return redirect()->action('PackageController@show', $package);
    }

    public function updateResolve(UpdatePackagePriceRequest $request, Package $package)
    {
        $package->status = 'pending';

        $old_price = $package->price;

        $package->price = $request->price;
        $package->save();
        \Session::flash('flash_message', trans('account.flash_update_package'));

        \Mail::send('emails.admin.package-price', ['package' => $package, 'old_price' => $old_price], function ($m) {
            $m->from(\Config::get('mail.from.address'), trans('general.site_name'));
            $m->to('info@postshipper.com', 'PostshipperAdmin')->subject('PostShipper Admin - Package Price Changed');
        });

        return redirect('account');
    }

    public function resolve(Package $package)
    {
        $user = Auth::user();
        return view('account.package.resolve', compact('package'), compact('user'));
    }

    public function destroy(Package $package)
    {
        $order = $package->order;
        $package->delete();

        /*
         * If the order is now empty
         * we'll need to delete it
         */
        if ($order->packages->isEmpty()) {
            $order->delete();
        }

        Session::flash('flash_message', 'Package deleted');
        return redirect()->action('PackageController@index');
    }
}
