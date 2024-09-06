<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pendapatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Pendapatan', function (Blueprint $table){
            $table->string('no_pen',20);
            $table->date('tgl_pen',8);
            $table->string('no_faktur',20);
            $table->integer('total_pen');
            $table->string('no_jual',20);
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
        //
    }
}
