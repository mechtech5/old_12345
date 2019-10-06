<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_activity_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->timestamps();
        });

        Schema::create('social_activities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('type');
            $table->string('name', 200);
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('social_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('f_name', 100);
            $table->string('m_name', 100)->nullable();
            $table->string('l_name', 100)->nullable();
            $table->char('gender', 1)->nullable();
            $table->timestamps();
        });

        Schema::create('social_hashtags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id'); //who started this
            $table->string('title', 200);
            $table->char('status', 1);
            $table->bigInteger('use_count')->default(1);
            $table->timestamps();
        });

        Schema::create('social_posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('title', 250);
            $table->text('body');
            $table->text('media')->nullable();
            $table->timestamps();
        });

        Schema::create('social_groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('creator_id');
            $table->unsignedInteger('main_interest');
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
        Schema::dropIfExists('social_profiles');
    }
}
