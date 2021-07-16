<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisKabupatensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('vis_kabupatens');
        Schema::create('vis_kabupatens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_provinsi');
            $table->string('kabupaten');
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
        Schema::dropIfExists('vis_kabupatens');
    }
}

