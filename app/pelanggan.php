<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pelanggan extends Model
{
    protected $primaryKey = 'kd_pel';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $table = "pelanggan";
    protected $fillable=['kd_pel','nm_pel','alamat_pel','telp_pel'];
}
