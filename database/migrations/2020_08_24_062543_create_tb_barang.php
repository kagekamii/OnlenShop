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
          $table->string('lokasi');
          $table->string('filter1');
          $table->string('filter2');
          $table->string('filter3');
          $table->string('filter4');
          $table->string('filter5');
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
