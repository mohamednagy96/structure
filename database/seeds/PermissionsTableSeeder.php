<?php

use App\Models\PermissionGroup;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = config('roles.permissions');

        foreach ($permissions as $key => $value) {
            $permissionGroup = PermissionGroup::firstOrCreate([
                'name' => $key
            ]);

            foreach ($value as $permission) {

                $permissionGroup->permissions()->firstOrCreate(['name' => $permission, 'guard_name'=> 'admin']);
            }
        }

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $role = Role::where('name', 'admin')->first();
        $role->givePermissionTo(Permission::pluck('name'));
    }
}
