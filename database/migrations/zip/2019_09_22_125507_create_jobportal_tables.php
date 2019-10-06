<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobportalTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_skills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 200);
            $table->timestamps();
        });

        Schema::create('job_companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('location_id');
            $table->string('name', 200);
            $table->timestamps();
        });

        // Schema::create('job_locations', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->string('title', 100);
        //     $table->unsignedInteger('country_id');
        //     $table->unsignedInteger('state_id');
        //     $table->unsignedInteger('city_id');
        //     $table->text('description')->nullable();
        //     $table->timestamps();
        // });

        Schema::create('job_alerts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('title', 100);
            $table->text('keywords');
            $table->text('locations');
            $table->unsignedInteger('work_exp');
            $table->unsignedInteger('expt_salary');
            $table->date('alert_start_dt');
            $table->timestamps();
        });

        Schema::create('job_resumes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('job_skills');
        Schema::dropIfExists('job_companies');
        Schema::dropIfExists('job_locations');
        Schema::dropIfExists('job_alerts');
        Schema::dropIfExists('job_resumes');
    }
}
