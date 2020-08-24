<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbBarang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('tb_barang', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nama')->unique();
          $table->string('berat');
          $table->string('kondisi');
          $table->string('kategori');
          $table->integer('harga');
          $table->string('gambar');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
