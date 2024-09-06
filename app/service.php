<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class service extends Model
{
     //jika tidak di definisikan maka primary akan terdetek id 
     protected $primaryKey = 'no_servis'; 
     public $incrementing = false; 
     protected $keyType = 'string'; 
     public $timestamps = false; 
     protected $table = "service"; 
     protected $fillable=['no_servis','kd_mtr','ket_servis','hrg_jasa','hrg_jual','total_servis'];
}
