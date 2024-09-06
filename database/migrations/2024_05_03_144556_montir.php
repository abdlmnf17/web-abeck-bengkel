<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Montir extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('montir', function (Blueprint $table){
            $table->string('kd_mtr',10)->primary();
            $table->string('nm_mtr',30);
            $table->string('alamat_mtr',30);
            $table->string('telp_mtr', 13);
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
