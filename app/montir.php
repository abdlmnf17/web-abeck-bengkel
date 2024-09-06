<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class montir extends Model
{
    protected $primaryKey = 'kd_mtr';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $table = "montir";
    protected $fillable=['kd_mtr','nm_mtr','alamat_mtr','telp_mtr'];
}
