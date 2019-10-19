<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompeteTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cpt_rounds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->unsignedBigInteger('p1');
            $table->unsignedBigInteger('p2')->nullable();
            $table->decimal('p1_score', 4, 1)->nullable();
            $table->decimal('p2_score', 4, 1)->nullable();
            $table->decimal('no_of_ques', 3, 1);
            $table->decimal('marks_per_ques', 3, 1);
            $table->string('invite_code', 10);
            $table->boolean('started')->default(false);
            $table->boolean('ended')->default(false);
            $table->timestamps();
        });

        Schema::create('cpt_round_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('round_id');
            $table->unsignedBigInteger('asker_id');
            $table->unsignedBigInteger('responder_id')->nullable();
            $table->text('question');
            $table->text('response')->nullable();
            $table->text('solution')->nullable();
            $table->boolean('skipped')->default(false);
            $table->decimal('marks', 3, 1)->nullable();
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
        Schema::dropIfExists('cpt_rounds');
        Schema::dropIfExists('cpt_round_details');
    }
}
