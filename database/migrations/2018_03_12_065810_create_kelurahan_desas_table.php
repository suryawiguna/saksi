<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKelurahanDesasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_kelurahandesa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_kelurahandesa', 100);
            $table->unsignedInteger('id_kecamatan');
            $table->foreign('id_kecamatan')->references('id')->on('tb_kecamatan')->onDelete('cascade');
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
        Schema::dropIfExists('kelurahan_desas');
    }
}
