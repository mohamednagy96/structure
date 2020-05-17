<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $fillable=['name','subject','message','email','service_id','phone'];


    public function service(){
        return $this->belongsTo(Service::class);
    }
}
