<?php

use Illuminate\Database\Seeder;

class UserStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('user_statuses')->delete();
        
        \DB::table('user_statuses')->insert(array (
            0 => 
            array (
            	'id' => '1',
                'label' => 'Active',
                'key' => 'active',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now(),
            ),
            1 => 
            array (
            	'id' => '2',
                'label' => 'Inactive',
                'key' => 'inactive',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now(),
            ),
            2 => 
            array (
            	'id' => '3',
                'label' => 'Banned',
                'key' => 'banned',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now(),
            ),
            3 => 
            array (
            	'id' => '4',
                'label' => 'Deleted',
                'key' => 'deleted',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now(),
            ),
        ));
    }
}