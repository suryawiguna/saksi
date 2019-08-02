<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saksis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kab_kota');
            $table->string('kecamatan');
            $table->string('desa');
            $table->string('no_tps');
            $table->string('nama_koor');
            $table->string('nama_saksi');
            $table->text('alamat');
            $table->string('no_hp');
            $table->string('foto_ktp');
            $table->string('foto_diri');
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
        Schema::dropIfExists('saksis');
    }
}
