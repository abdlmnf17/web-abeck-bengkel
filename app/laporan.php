<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class laporan extends Model
{
    protected $table = "bukubesar";
    protected $fillable = ['notrans','tgl','ket','debet','kredit'];
}
