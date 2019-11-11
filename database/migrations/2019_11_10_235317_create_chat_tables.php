<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chatrooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('creator_id');
            $table->string('name');
            $table->text('meta');
            $table->timestamps();
        });

        Schema::create('chatroom_user', function (Blueprint $table) {
            $table->unsignedBigInteger('chatroom_id');
            $table->unsignedBigInteger('user_id');
        });

        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('message_type', 1); // private or group
            $table->char('data_type', 1); // text, image, file
            $table->unsignedBigInteger('chatroom_id')->nullable();
            $table->unsignedBigInteger('sender_id');
            $table->unsignedBigInteger('receiver_id')->nullable();
            $table->text('body');
            $table->text('meta');
            $table->boolean('seen')->default(false);
            $table->timestamps();
        });

        Schema::create('message_status', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('chatroom_id');
            $table->unsignedBigInteger('message_id');
            $table->unsignedBigInteger('user_id');
            $table->boolean('seen')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chatrooms');
        Schema::dropIfExists('chatroom_user');
        Schema::dropIfExists('messages');
        Schema::dropIfExists('message_status');
    }
}
