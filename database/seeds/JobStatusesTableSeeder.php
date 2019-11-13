<?php

use Illuminate\Database\Seeder;

class JobStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('job_statuses')->delete();
        
        \DB::table('job_statuses')->insert(array (
            0 => 
            array (
            	'id' => '1',
                'label' => 'Pending',
                'key' => 'pending',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now(),
            ),
            1 => 
            array (
            	'id' => '2',
                'label' => 'Assigned',
                'key' => 'assigned',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now(),
            ),
            2 => 
            array (
                'id' => '3',
                'label' => 'Completed',
                'key' => 'completed',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now(),
            ),
            3 => 
            array (
                'id' => '4',
                'label' => 'Failed',
                'key' => 'failed',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now(),
            ),
            4 => 
            array (
                'id' => '5',
                'label' => 'Cancelled',
                'key' => 'cancelled',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now(),
            ),
            5 => 
            array (
                'id' => '6',
                'label' => 'Rejected',
                'key' => 'rejected',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now(),
            ),
        ));
    }
}