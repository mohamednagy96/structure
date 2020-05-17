<?php

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::firstOrcreate([
            'name' => 'super admin',
            'email' => 'admin@test.com',
            'password' => 12345678
            ]);

        // app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $admin->assignRole('admin');

    }
}
