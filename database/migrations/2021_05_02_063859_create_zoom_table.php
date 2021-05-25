<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZoomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zoom', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reserver');
            $table->string('email');
            $table->string('topic');
            $table->string('platform');
            $table->date('date');
            $table->time('time_start');
            $table->time('time_end');
            $table->string('type');
            $table->string('setup');
            $table->string('remarks');
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
        Schema::dropIfExists('zoom');
    }
}
