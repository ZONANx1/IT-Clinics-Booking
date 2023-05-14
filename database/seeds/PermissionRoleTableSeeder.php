<?php

use App\Permission;
use App\Role;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    public function run()
    {
        $admin_permissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));

        $authoriser_permissions = $admin_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 5) != 'user_' && substr($permission->title, 0, 5) != 'role_' && substr($permission->title, 0, 11) != 'permission_' && substr($permission->title, 0, 7) != 'client_';
        });
        Role::findOrFail(2)->permissions()->sync($authoriser_permissions);

        $user_permissions = $admin_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 8) != 'service_' && substr($permission->title, 0, 9) != 'employee_' && substr($permission->title, 0, 5) != 'user_' && substr($permission->title, 0, 5) != 'role_' && substr($permission->title, 0, 11) != 'permission_'
            && substr($permission->title, 0, 7) != 'client_';
        });
        Role::findOrFail(3)->permissions()->sync($user_permissions);     
    }
}
