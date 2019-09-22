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
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('dev_tools', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
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
    }
}
