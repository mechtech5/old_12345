<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaseTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('base_modules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
        });

        Schema::create('base_cities', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('state_id');
            $table->string('name', 100);
        });

        Schema::create('base_states', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('country_id');
            $table->string('name', 100);
        });

        Schema::create('base_countries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
        });

        Schema::create('wallet', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('base_modules');
        Schema::dropIfExists('base_cities');
        Schema::dropIfExists('base_states');
        Schema::dropIfExists('base_countries');
        Schema::dropIfExists('wallet');
        Schema::dropIfExists('wallet_transactions');
    }
}
