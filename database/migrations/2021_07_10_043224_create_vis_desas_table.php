<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisDesasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('vis_desas');
        Schema::create('vis_desas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_provinsi');
            $table->unsignedBigInteger('id_kota');
            $table->unsignedBigInteger('id_kabupaten');
            $table->unsignedBigInteger('id_kecamatan');
            $table->text('nama_desa');
            $table->text('alamat_lengkap');
            $table->text('deskripsi');
            $table->timestamps();

            $table->foreign('id_provinsi')->references('id')->on('vis_provinsis');
            $table->foreign('id_kota')->references('id')->on('vis_kotas');
            $table->foreign('id_kabupaten')->references('id')->on('vis_kabupatens');
            $table->foreign('id_kecamatan')->references('id')->on('vis_kecamatans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vis_desas');
    }
}

