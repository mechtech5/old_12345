<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dev_tool_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->timestamps();
        });

        Schema::create('dev_tools', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 200);
            $table->unsignedInteger('type');
            $table->text('description')->nullable();
            $table->integer('dev_count')->default(0);
            $table->timestamps();
        });

        Schema::create('dev_toolsets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedInteger('tool_id');
            $table->timestamps();
        });

        Schema::create('dev_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('location_id');
            $table->unsignedInteger('top_lang')->nullable();
            $table->unsignedInteger('top_framework')->nullable();
            $table->timestamps();
        });

        Schema::create('dev_teams', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('creator_id');
            $table->unsignedInteger('main_interest');
            $table->timestamps();
        });

        // Schema::create('dev_locations', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->string('title', 100);
        //     $table->unsignedInteger('country_id');
        //     $table->unsignedInteger('state_id');
        //     $table->unsignedInteger('city_id');
        //     $table->text('description')->nullable();
        //     $table->timestamps();
        // });

        /*
            Profile
            Portfolio
            CV
            Resume
            Cover Letter
        */

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dev_tool_types');
        Schema::dropIfExists('dev_tools');
        Schema::dropIfExists('dev_toolsets');
        Schema::dropIfExists('dev_profiles');
        Schema::dropIfExists('dev_teams');
        Schema::dropIfExists('dev_locations');
    }
}
