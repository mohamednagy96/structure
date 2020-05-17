<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
/**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name'=>'test',
            'last_name'=>'test',
            'email'=>'user@test.com',
            'mobile'=>'0111111111',
            'password'=> Hash::make('12345678')
        ]);
    }
}
