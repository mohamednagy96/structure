<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable=['name','language_id'];

    public function language(){
        return $this->belongsTo(Language::class);
    }

    public function cities(){
        return $this->hasMany(City::class,'country_id');
    }
}
