<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaseTables extends Migration
{
  public function up()
  {
    Schema::create('user_profile_basic', function (Blueprint $table) {
        $table->unsignedBigInteger('user_id')->primary();
        $table->string('fname', 100)->nullable();
        $table->string('lname', 100)->nullable();
        $table->string('bio', 250)->nullable();
        $table->text('avatar')->nullable();
        $table->date('dob')->nullable();
        $table->timestamps();
      });

      Schema::create('wallet', function (Blueprint $table) {
          $table->unsignedBigInteger('user_id')->primary();
          $table->decimal('bal', 15, 3)->default(0.000);
          $table->timestamps();
      });

      Schema::create('wallet_transactions', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('wallet_id');
          $table->char('trans_type', 1);
          $table->datetime('trans_dt');
      });
  }

  public function down()
  {
      Schema::dropIfExists('user_profile_basic');
      Schema::dropIfExists('wallet');
      Schema::dropIfExists('wallet_transactions');
  }
}
