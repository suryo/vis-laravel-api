<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisKecamatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('vis_kecamatans');
        Schema::create('vis_kecamatans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_kota');
            $table->unsignedBigInteger('id_kabupaten');
            $table->unsignedBigInteger('id_provinsi');
            $table->string('kecamatan');
            $table->timestamps();

            $table->foreign('id_kota')->references('id')->on('vis_kotas');
            $table->foreign('id_kabupaten')->references('id')->on('vis_kabupatens');
            $table->foreign('id_provinsi')->references('id')->on('vis_provinsis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vis_kecamatans');
    }
}
