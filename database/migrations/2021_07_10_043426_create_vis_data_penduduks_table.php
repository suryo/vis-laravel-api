<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisDataPenduduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('vis_data_penduduks');
        Schema::create('vis_data_penduduks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('no_kk');
            $table->unsignedBigInteger('id_desa');
            $table->text('nama_penduduk');
            $table->text('jenis_kelamin');
            $table->text('alamat_penduduk');
            $table->timestamps();

            //$table->foreign('no_ka')->references('no_kk')->on('vis_kartu_keluargas');
            $table->foreign('id_desa')->references('id')->on('vis_desas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vis_data_penduduks');
    }
}
