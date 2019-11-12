<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfilesTables extends Migration
{
  public function up()
  {
    Schema::create('user_profiles', function (Blueprint $table) {
      $table->unsignedBigInteger('user_id')->primary();
      $table->string('fname');
      $table->string('lname');
      $table->text('bio')->nullable();
      $table->text('avatar')->nullable();
      $table->date('dob')->nullable();
      $table->string('gender')->default('M');
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('user_profiles');
  }
}