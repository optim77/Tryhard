<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFriendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friends', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id1')->unsigned()->onDelete('cascade');
            $table->integer('user_id2')->unsigned()->onDelete('cascade');
            $table->string('status')->nullable();
            $table->timestamps();
            $table->foreign('user_id1')->references('id')->on('users');
            $table->foreign('user_id2')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('friends');
    }
}
