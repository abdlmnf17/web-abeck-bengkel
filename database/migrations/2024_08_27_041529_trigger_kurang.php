<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TriggerKurang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
CREATE TRIGGER update_stok after INSERT ON DetailPendapatan
FOR EACH ROW BEGIN
UPDATE barang
SET stok = stok - NEW.qty_pen
WHERE
kd_brg = NEW.kd_brg;
END
');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER update_stok');
    }
}
