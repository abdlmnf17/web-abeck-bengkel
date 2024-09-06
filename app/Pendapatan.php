<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendapatan extends Model
{
    protected $primaryKey = 'no_pen';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $table = "pendapatan";
    protected $fillable=['no_pen','tgl_pen','no_faktur','total_pen','no_jual'];

    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class);
    }
}
