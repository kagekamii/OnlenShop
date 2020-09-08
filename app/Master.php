<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
  protected $table = "tb_master";
  protected $fillable = ['username', 'nohp', 'alamat_rumah', 'kecamatan', 'kota', 'provinsi', 'barang_id', 'nama_barang',
                        'jml_barang', 'kurir', 'total_harga', 'ongkos_kirim', 'total_bayar', 'metode_bayar',
                        'batas_waktu', 'batas_waktu2', 'batas_waktu3', 'kode_transaksi', 'catatan'];
  public $timestamps = false;
  public function barang()
  {
    return $this->belongsTo('App\Barang');
  }
}
