<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisPerangkatDesasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('vis_perangkat_desas');
        Schema::create('vis_perangkat_desas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_desa');
            $table->unsignedBigInteger('nik');
            $table->text('nama_perangkat_desa');
            $table->text('jabatan');
            $table->timestamps();

            $table->foreign('id_desa')->references('id')->on('vis_desas');
            $table->foreign('nik')->references('id')->on('vis_data_penduduks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vis_perangkat_desas');
    }
}

