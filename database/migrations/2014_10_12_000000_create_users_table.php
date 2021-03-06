<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('firstName')->nullable();
            $table->string('surname')->nullable();
            $table->string('country')->nullable();
            $table->string('phone')->nullable();
            $table->string('birthday')->nullable();
            $table->string('mainPhoto')->nullable()->default('default.jpg');
            $table->string('sex')->nullable();
            $table->integer('viewers')->nullable()->default(0);
            $table->integer('stars')->nullable()->default(0);
            $table->integer('friends')->nullable()->default(0);
            $table->ipAddress('ip')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
