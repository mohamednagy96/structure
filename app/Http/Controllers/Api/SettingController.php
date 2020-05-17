<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings=Setting::get()->mapWithKeys(function($item, $key){
            $value = $item->value;
            //social links
            if($item->value != null){
                if(is_array(json_decode($item->value))){
                    $value = json_decode($item->value);
                }
            }
            //LOGO
            if($item->key == 'website_logo'){
                $value = $item->image ? $item->image->getUrl() : '/images/default.jpg';
            }

            return [$item->key => $value];
        })->toArray();

        $res['data'] = $settings;

        return $this->dataResponse($res);
    }
}
