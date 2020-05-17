<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class About extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $fillable=['title','description'];

    public function images(){
        return $this->media();
    }

    public function image(){
        return $this->morphOne(config('medialibrary.media_model'), 'model');
    }
}
