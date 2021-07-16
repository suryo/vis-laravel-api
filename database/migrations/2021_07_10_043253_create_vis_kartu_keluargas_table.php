<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisKartuKeluargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	 Schema::dropIfExists('vis_kartu_keluargas');
        Schema::create('vis_kartu_keluargas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('no_kk');
            $table->unsignedBigInteger('nik');
            $table->timestamps();

            //$table->foreign('nik')->references('id')->on('vis_data_penduduks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vis_kartu_keluargas');
    }
}

