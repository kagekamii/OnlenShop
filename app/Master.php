<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
  protected $table = "tb_master";
  protected $fillable = ['username', 'nohp', 'alamat_rumah', 'kecamatan', 'kota', 'provinsi',
                        'nama_barang', 'jml_barang', 'kurir', 'total_harga', 'ongkos_kirim', 'total_bayar',
                        'metode_bayar', 'batas_waktu', 'kode_transaksi'];
  public $timestamps = false;
}
