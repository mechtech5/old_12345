<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetaTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_modules', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('name');
        });

        Schema::create('site_tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedTinyInteger('module_id');
            $table->string('tag');
            $table->string('value');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_modules');
        Schema::dropIfExists('site_tags');
    }
}
