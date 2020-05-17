<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use League\CommonMark\Environment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(LanguagesTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(AdminUserSeeder::class);
        if(App::environment('local')){
            $this->call(UserTableSeeder::class);
        }



    }
}
