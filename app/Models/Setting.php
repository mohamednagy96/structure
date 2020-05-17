<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Setting extends Model implements HasMedia
{
    use HasMediaTrait;
    protected $fillable = [
        'key', 'value'
    ];

    public static function getValue($key){
        if ( $setting = self::where('key', $key)->first() ){
            return $setting->value;
        }else{
            throw new Exception("Key ({$key}) Not found in settings");
        }
    }

    public static function setValue($key , $value){
        

        if ( $setting = self::where('key', $key)->first() ){
            $setting->update([
                'value' => $value
            ]);
        }else{
            throw new Exception("Key ({$key}) Not found in settings");
        }
    }

    public static function setKey($key, $value = null){
        try{
            self::firstOrCreate([
                'key' => $key,
                'value' => $value
            ]);
        }catch(Exception $ex){
            if($ex instanceof QueryException){
                if($ex->getCode() == 23000){
                    if($ex->errorInfo['1'] == 1062){
                        throw new Exception("Key ({$key}) Exists");
                    }
                }
            }
            throw $ex;
        }
    }


    public function images(){
        return $this->media();
    }

    public function image(){
        return $this->morphOne(config('medialibrary.media_model'), 'model');
    }
}
