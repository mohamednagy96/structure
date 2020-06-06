<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Post extends Model implements HasMedia
{
    use HasMediaTrait;
    protected $fillable=['title','body','photo','admin_id'];
    
    public function admin(){
        return $this->belongsTo(Admin::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class,'post_id');
    }

    public function images(){
        return $this->media();
    }

    public function image(){
        return $this->morphOne(config('medialibrary.media_model'), 'model');
    }
}
