<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserStatusesTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(ServiceStatusesTableSeeder::class);
        $this->call(JobStatusesTableSeeder::class);
    }
}