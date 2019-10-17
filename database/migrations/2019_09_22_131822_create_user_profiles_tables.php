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
      $table->string('fname', 100)->nullable();
      $table->string('lname', 100)->nullable();
      $table->string('bio', 250)->nullable();
      $table->text('avatar')->nullable();
      $table->date('dob')->nullable();
      $table->char('gender', 1)->nullable();
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('user_profiles');
  }
}