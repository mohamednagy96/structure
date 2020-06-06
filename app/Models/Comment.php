<?php

namespace App\Models;

use App\Models\Admin;
use App\Models\Post;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable=['comment','post_id','admin_id'];
    
    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function admin(){
        return $this->belongsTo(Admin::class);
    }
}