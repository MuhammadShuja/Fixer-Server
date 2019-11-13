<?php

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \DB::table('admins')->delete();
        
        \DB::table('admins')->insert(array (
            0 => 
            array (
                'user_status_id' => \App\Models\UserStatus::active(),
                'name' => 'Skipper',
                'username' => 'root',
                'email' => 'admin@root.com',
                'password' => bcrypt('root@toor'),
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now(),
            ),
            1 => 
            array (
                'user_status_id' => \App\Models\UserStatus::active(),
                'name' => 'Demo Account',
                'username' => 'demo',
                'email' => 'demo@root.com',
                'password' => bcrypt('demo123'),
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now(),
            ),
        ));

        \DB::table('permissions')->delete();

        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'name' => 'manage dashboard',
                'guard_name' => 'admin',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now(),
            ),
            1 => 
            array (
                'name' => 'manage services',
                'guard_name' => 'admin',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now(),
            ),
            2 => 
            array (
                'name' => 'manage workers',
                'guard_name' => 'admin',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now(),
            ),
            3 => 
            array (
                'name' => 'manage jobs',
                'guard_name' => 'admin',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now(),
            ),
            4 => 
            array (
                'name' => 'manage customers',
                'guard_name' => 'admin',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now(),
            ),
            5 => 
            array (
                'name' => 'manage payments',
                'guard_name' => 'admin',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now(),
            ),
            6 => 
            array (
                'name' => 'manage settings',
                'guard_name' => 'admin',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now(),
            ),
            7 => 
            array (
                'name' => 'manage staff',
                'guard_name' => 'admin',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now(),
            ),
        ));

        $admins = Admin::all();
        $permissions = Permission::pluck('name')->toArray();

        foreach($admins as $admin){
            $admin->syncPermissions($permissions);
        }

    }
}