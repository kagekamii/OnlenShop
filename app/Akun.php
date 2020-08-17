<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    protected $table = "tb_akun";
    protected $fillable = ['username', 'password'];
    public $timestamps = false;
}
