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
            $table->unsignedBigInteger('p1');
            $table->unsignedBigInteger('p2');
            $table->decimal('p1_score', 4, 1);
            $table->decimal('p2_score', 4, 1);
            $table->decimal('no_of_ques', 3, 1);
            $table->decimal('marks_per_ques', 3, 1);
            $table->string('invite_code', 8);
            $table->timestamps();
        });

        Schema::create('cpt_questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('creator_id');
            $table->text('body');
            $table->timestamps();
        });

        Schema::create('cpt_round_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('round_id');
            $table->unsignedBigInteger('p_id');
            $table->unsignedBigInteger('ques_id');
            $table->text('response')->nullable();
            $table->boolean('skipped')->default(false);
            $table->decimal('marks', 3, 1);
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
        Schema::dropIfExists('rounds1v1');
    }
}
