<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosHasCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos_has_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('photo')->unsigned();
            $table->integer('comment')->unsigned();
            $table->foreign('photo')->references('id')->on('photos');
            $table->foreign('comment')->references('id')->on('comments');
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
        Schema::dropIfExists('photos_has_comments');
    }
}
