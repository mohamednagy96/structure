<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use Notifiable, HasRoles;

    protected $guard = 'admin';

    protected $casts=['is_active'=>'boolean'];
    protected $fillable = [
        'name', 'email', 'password','fcm_token','is_active'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($password)
    {
        if ( $password !== null & $password !== "" )
        {
            $this->attributes['password'] = bcrypt($password);
        }else{
            $this->attributes['password'];
        }
    }
    public function posts(){
        return $this->hasMany(Post::class,'admin_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'admin_id');
    }
}
