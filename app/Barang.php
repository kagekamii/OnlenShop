<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
  protected $table = "tb_barang";
  // protected $fillable = ['username', 'password'];
  public $timestamps = false;
  public function master()
  {
    return $this->hasOne('App\Master');
  }
}
