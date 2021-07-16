<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisJenisLembagaDesasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('vis_jenis_lembaga_desas');
        Schema::create('vis_jenis_lembaga_desas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_lembaga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vis_jenis_lembaga_desas');
    }
}

