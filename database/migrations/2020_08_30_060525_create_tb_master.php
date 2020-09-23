<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbMaster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('tb_master', function (Blueprint $table) {
          $table->increments('id');
          $table->string('username');
          $table->string('nohp');
          $table->string('alamat_rumah');
          $table->string('kecamatan');
          $table->string('kota');
          $table->string('provinsi');
          $table->integer('barang_id')->length(10);
          $table->string('nama_barang');
          $table->string('jml_barang');
          $table->string('kurir');
          $table->string('total_harga');
          $table->string('ongkos_kirim');
          $table->string('total_bayar');
          $table->string('metode_bayar');
          $table->string('batas_waktu');
          $table->string('batas_waktu2');
          $table->string('batas_waktu3');
          $table->string('kode_transaksi');
          $table->longText('catatan')->nullable();
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
