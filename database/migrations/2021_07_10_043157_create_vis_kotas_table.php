<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisKotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('vis_kotas');
        Schema::create('vis_kotas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_provinsi');
            $table->string('kota');
            $table->timestamps();

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
        Schema::dropIfExists('vis_kotas');
    }
}
