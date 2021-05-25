<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicleRequisitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_requisitions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('vehicle_name');
            $table->string('driver');
            $table->string('date_from');
            $table->string('date_to');
            $table->string('time_from');
            $table->string('time_to');
            $table->string('destination_route');
            $table->string('passenger');
            $table->string('charge_to');
            $table->string('requested');
            $table->string('reccommended_by');
            $table->string('purpose');
            $table->dateTime('timedepartureoffice');
            $table->time('timearrival');
            $table->time('timedeparturelocation');
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
        Schema::dropIfExists('vehicle_requisitions');
    }
}
