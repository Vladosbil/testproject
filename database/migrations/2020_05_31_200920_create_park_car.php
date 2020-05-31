<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParkCar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('park_car', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('park_id');
            $table->foreign('park_id')
                ->references('id')->on('parks')
                ->onDelete('cascade');

            $table->unsignedBigInteger('car_id');
            $table->foreign('car_id')
                ->references('id')->on('cars')
                ->onDelete('cascade');

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
        Schema::dropIfExists('park_cars');
    }
}
