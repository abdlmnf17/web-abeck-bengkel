<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetailPendapatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DetailPendapatan', function (Blueprint $table){
            $table->string('no_pen',20);
            $table->string('kd_brg',10);
            $table->integer('qty_pen');
            $table->integer('hrg_jasa');
            $table->integer('sub_pen');
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
