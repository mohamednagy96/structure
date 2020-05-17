<?php

namespace App\services;

class MediaService
{

    public static function uploadFiles($files = [], $model, $collection = 'image')
    {
        //store array of files
        $files = is_array($files) ? $files : [];

        if(count($files)){
            foreach ($files as $key => $file) {

                $media = $model->addMedia($file)->toMediaCollection($collection);

                //set first image for model as default
                if($key == 0 && $model->getMedia($collection)->count() == 1){

                    self::setDefaultFile($media);
                }
            }
        }

    }

    public static function uploadFile($file, $model, $collection ='image')
    {
        //store new file
        $model->addMedia($file)->toMediaCollection($collection);
    }

    //set file as default
    public static function setDefaultFile($media){
        $media->update([
            'isDefault' => 1
        ]);
    }

    public static function updateFile($file, $model, $collection ='image')
    {
        if($model->getFirstMedia($collection)){
            $model->getFirstMedia($collection)->delete();
        }
        $model->addMedia($file)->toMediaCollection($collection);
    }
}
