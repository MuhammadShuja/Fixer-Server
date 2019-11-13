<?php

use Illuminate\Database\Seeder;

class ServiceStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('service_statuses')->delete();
        
        \DB::table('service_statuses')->insert(array (
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
        ));
    }
}
