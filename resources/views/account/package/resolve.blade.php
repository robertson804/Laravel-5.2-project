{{ Form::open(['method' => 'PATCH', 'action' => ['PackageController@updateResolve', $package->id] ,'class'=>'form-inline resolve-form']) }}
@if($package->getOriginal('price') == 0)
    <div class="alert alert-warning">
        {{ Lang::get('account.package_resolve_help') }}
    </div>
@else
    <div class="alert alert-info">
        {{ Lang::get('account.package_resolve_edit') }}
    </div>

@endif
<div class="form-group">
    <label class="sr-only" for="exampleInputAmount">{{Lang::get('account.package_resolve_amount')}}</label>
    <div class="input-group">
        <div class="input-group-addon">$</div>
        {{ Form::text('price',null,['class'=>'form-control']) }}
    </div>
    {{ Form::submit(Lang::get('account.package_resolve_submit'),['class'=>'btn btn-primary']) }}
</div>
{{ Form::close() }}

@include('partials.error-box')
