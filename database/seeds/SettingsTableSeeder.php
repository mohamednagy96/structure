<?php

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('config:cache');
        $settings = config('settings');
        foreach($settings as $setting){
            Setting::setKey($setting);
        }

        Setting::setValue('social_links',json_encode([['name' => 'facebook', 'link' => 'www.facebook.com'],['name'=>'google','link'=>'www.google.com']]));
    }
}
