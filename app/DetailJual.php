<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailJual extends Model
{
    // protected $primaryKey = 'no_jual';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $table = "detailjual";
    protected $fillable=['no_jual','kd_brg','qty_jual', 'hrg_jasa','total_jual'];
}
