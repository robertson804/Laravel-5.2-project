<?php


namespace App\Http\Utilities;


use Intervention\Image\Facades\Image;

/**
 * Class ImageHandler
 * @package App\Http\Utilities
 */
class ImageHandler
{


    public static function storeImage($image, $filename)
    {

        $destinationPath = storage_path() . '/uploads/';

        try {

            $img = Image::make($image);

            $img->fit(300, 300);

            //Save normally
            $img->save($destinationPath . $filename);
            //Save thumbnails
            $img->resize(150, 150)->save($destinationPath . 'card/' . $filename);
            $img->resize(64, 64)->save($destinationPath . 'thumbnail/' . $filename);
            $img->destroy();
        } catch (\Exception $e) {
            throw new ImageSaveException($e);
        }
    }

    public static function storeSlide($image, $filename)
    {
            $img = Image::make($image);
            $img->save(storage_path() . '/uploads/slides/' . $filename);
            $img->destroy();
    }

}