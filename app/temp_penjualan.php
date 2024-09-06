<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class temp_penjualan extends Model
{
    protected $primaryKey = 'kd_brg';     
    public $incrementing = false;     
    protected $keyType = 'string';     
    public $timestamps = false;     
    protected $table = "temp_penjualan";     
    protected $fillable=['kd_brg','qty_jual','hrg_jasa']; 
}
