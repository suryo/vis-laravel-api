<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisJenisSuratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('vis_jenis_surats');
        Schema::create('vis_jenis_surats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_desa');
            $table->text('jenis_surat');
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
        Schema::dropIfExists('vis_jenis_surats');
    }
}


