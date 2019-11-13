<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reference')->unique();
            $table->integer('job_status_id')->unsigned();
            $table->foreign('job_status_id')->references('id')->on('job_statuses')->onDelete('CASCADE');
            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('SET NULL');
            $table->integer('service_id')->unsigned()->nullable();
            $table->foreign('service_id')->references('id')->on('services')->onDelete('SET NULL');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->string('name')->nullable();
            $table->string('price')->nullable();
            $table->longText('job_notes')->nullable();
            $table->timestamp('schedule_date')->nullable();
            $table->string('schedule_time')->nullable();
            $table->integer('user_address_id')->unsigned()->nullable();
            $table->foreign('user_address_id')->references('id')->on('user_addresses')->onDelete('SET NULL');
            $table->integer('worker_id')->unsigned()->nullable();
            $table->foreign('worker_id')->references('id')->on('workers')->onDelete('SET NULL');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('jobs');
        Schema::enableForeignKeyConstraints();
    }
}