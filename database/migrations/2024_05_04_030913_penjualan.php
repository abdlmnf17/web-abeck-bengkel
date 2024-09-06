<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Penjualan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan', function (Blueprint $table){
            $table->string('no_jual',20)->primary();
            $table->date('tgl',8);
            $table->string('kd_brg',10);
            $table->integer('qty_jual');
            $table->integer('hrg_jasa');
            $table->integer('total_jual');
            $table->timestamps();
       
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penjualan');
    }
}
