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
        // Dev Profile
        // $table->string('dev_tagline', 250)->nullable();
        // $table->unsignedInteger('top_lang')->nullable();
        // $table->unsignedInteger('top_framework')->nullable();
        // $table->string('website_url', 200)->nullable();

        /*  Education
            Current Employer Name
            Current Employer URL
            Current Employement Title
         */
        // $table->text('edu_texts')->nullable();
        // $table->text('emp_texts')->nullable();

        // booleans
        // $table->boolean('display_email')->default(0);
        // $table->boolean('is_work_avail')->default(0);
        // $table->boolean('display_work_avail')->default(0);

        /* skills/languages = What tools and languages are you most experienced with? are you specialized or more of a generalist?
            i'm getting into = what are you learning right now? what are the new tools nand languages you're picking up in {year}?
            my projects and hacks = What projects are currently occupying most of your time?
            available for = What kinds of collaborations or discussions are you available for? what's a good reason to say hey to you these days?
        */
        //$table->text('bio_texts')->nullable(); // json key-value

        /* facebook, twitter, behance, dribbble, stackoverflow, linkedin, medium, gitlab, mastodon, twitch, youtube, instagram*/
        //$table->text('social_links')->nullable(); // json key-value

        // Schema::create('dev_tool_types', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('name', 100);
        //     $table->timestamps();
        // });

        Schema::create('dev_tools', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 200);
            $table->unsignedInteger('type_id'); // from dev_tool_types
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

        Schema::create('dev_teams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('tagline', 250);
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('dev_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('tagline', 250);
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('dev_communities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('tagline', 250);
            $table->text('description')->nullable();
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
