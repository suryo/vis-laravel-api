<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisJenisPotensiDesasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('vis_jenis_potensi_desas');
        Schema::create('vis_jenis_potensi_desas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_desa');
            $table->text('nama_potensi');
            $table->timestamps();

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
        Schema::dropIfExists('vis_jenis_potensi_desas');
    }
}
