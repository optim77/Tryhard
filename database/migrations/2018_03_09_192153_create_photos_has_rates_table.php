<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosHasRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos_has_rates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('photo')->unsigned();
            $table->integer('rate')->unsigned();
            $table->foreign('photo')->references('id')->on('photos');
            $table->foreign('rate')->references('id')->on('rates');
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
        Schema::dropIfExists('photos_has_rates');
    }
}
