<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclereservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiclereservations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('driver');
            $table->string('vehiclename');
            $table->string('passenger');
            $table->string('destination');
            $table->string('purpose');
            $table->date('date');
            $table->dateTime('timedepartureoffice');
            $table->time('timearrival');
            $table->time('timedeparturelocation');
            $table->integer('distance');
            $table->integer('tankbalance');
            $table->integer('officestock');
            $table->integer('purchased');
            $table->integer('used');
            $table->integer('balance');
            $table->integer('gearoilissued');
            $table->integer('luboilissued');
            $table->integer('greaseissued');
            $table->integer('odometerbeg');
            $table->integer('odometerend');
            $table->integer('distance');
            $table->longText('remarks');
            $table->status('status');
            $table->string('file');
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
        Schema::dropIfExists('vehiclereservations');
    }
}
