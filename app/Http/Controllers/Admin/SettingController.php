<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\services\MediaService;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function __construct(){
        $this->middleware(['permission:settings_list'])->only('index');
        $this->middleware(['permission:settings_edit'])->only('update');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $settings=Setting::pluck('value','key')->toArray();
        $logo=Setting::where('key','website_logo')->first();
        $image=$logo->getFirstMedia('image');
        return view('admin.pages.settings.index',compact('settings','image'));
        }
        
        
        
    public function update(Request $request)
    {
        
        // dd($request->all());
        $this->updateDate($request->data);
        $this->upadateSocialLinks($request->social_links);
        $this->upadateLogo($request,$request->file);
        return redirect()->back();
        }
    

    public function updateDate($data){
        foreach($data as $key => $val){
            Setting::setValue($key, $val);
        }
    }

    public function upadateSocialLinks($links){ 
        foreach($links as $k=>$v){
            $newSocial[]=['name'=>$k,'link'=>$v];
            }
        Setting::setValue('social_links', json_encode($newSocial));
    }

    public function upadateLogo(Request $request,$file){   
 
        $logo=Setting::where('key','website_logo')->first();
        if ($request->hasfile('file')) {
            MediaService::updateFile($request->file('file'), $logo);
       }   
    }
    
}
