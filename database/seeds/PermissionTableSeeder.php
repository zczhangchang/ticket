<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $createPermission               = new Permission();
        $createPermission->display_name = '角色';
        $createPermission->name         = 'manage-roles';
        $createPermission->description  = 'Permission for Managing Roles';
        $createPermission->save();

        $createPermission               = new Permission();
        $createPermission->display_name = '工单';
        $createPermission->name         = 'manage-tickets';
        $createPermission->description  = 'Permission for Managing Tickets';
        $createPermission->save();

        $createPermission               = new Permission();
        $createPermission->display_name = '用户';
        $createPermission->name         = 'manage-users';
        $createPermission->description  = 'Permission for Managing Users';
        $createPermission->save();

        $createPermission               = new Permission();
        $createPermission->display_name = '后台';
        $createPermission->name         = 'view-backend';
        $createPermission->description  = 'Permission for Viewing Backend';
        $createPermission->save();

        $createPermission               = new Permission();
        $createPermission->display_name = '权限';
        $createPermission->name         = 'manage-permissions';
        $createPermission->description  = 'Permission for Managing Permissions';
        $createPermission->save();

        $createPermission               = new Permission();
        $createPermission->display_name = '配置';
        $createPermission->name         = 'manage-settings';
        $createPermission->description  = 'Permission for Managing Settings';
        $createPermission->save();
    }
}
