<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisLembagaDesasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('vis_lembaga_desas');
        Schema::create('vis_lembaga_desas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_jenis_lembaga');
            $table->unsignedBigInteger('id_desa');
            $table->text('lembaga_desa');
            $table->timestamps();

            $table->foreign('id_jenis_lembaga')->references('id')->on('vis_jenis_lembaga_desas');
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
        Schema::dropIfExists('vis_lembaga_desas');
    }
}


