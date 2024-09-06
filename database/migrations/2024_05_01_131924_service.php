<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Service extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service', function (Blueprint $table){
            $table->string('no_servis',20)->primary();
            $table->string('kd_mtr',10);
            $table->string('tgl_servis',10);
            $table->string('ket_servis',30);
            $table->integer('hrg_jasa');
            $table->integer('hrg_jual');
            $table->integer('total_servis');
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
