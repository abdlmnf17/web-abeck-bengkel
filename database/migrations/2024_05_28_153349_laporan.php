<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Laporan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('laporan', function (Blueprint $table){
            $table->string('notrans',20)->primary();
            $table->date('tgl',8);
            $table->string('ket',30);
            $table->integer('debet');
            $table->integer('kredit');
      
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
