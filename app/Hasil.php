<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    protected $primaryKey = 'no_jual';
public $incrementing = false;
protected $keyType = 'string';
public $timestamps = false;
protected $table = "tampil_penjualan";
protected $fillable=['kd_brg','no_jual','nm_brg','qty_jual','hrg_jasa','total_jual'];
}
