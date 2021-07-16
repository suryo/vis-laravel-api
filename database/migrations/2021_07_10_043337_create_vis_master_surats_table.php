<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisMasterSuratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('vis_master_surats');
        Schema::create('vis_master_surats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_jenis_surat');
            $table->text('file');
            $table->text('link');
            $table->date('version_date');
            $table->timestamps();

            $table->foreign('id_jenis_surat')->references('id')->on('vis_jenis_surats');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vis_master_surats');
    }
}


