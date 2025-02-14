<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Akun extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akun', function (Blueprint $table){             
            $table->string('no_akun',5)->primary();             
            $table->string('nm_akun',25);  
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('setting', function (Blueprint $table){             
            $table->string('id_setting',5)->primary();             
            $table->string('no_setting',5);  
            $table->string('nama_transaksi',30);
        });
    }
}
