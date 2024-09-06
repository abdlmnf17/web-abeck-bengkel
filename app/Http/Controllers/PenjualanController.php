<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Akun;
use App\Barang;
use App\Penjualan;
use App\Pelanggan;
use App\Temp_jual;
use App\Temp_penjualan;
use Alert;

class PenjualanController extends Controller
{
    public function index()
    {
        $akun = \App\Akun::All();
        $barang = \App\Barang::All();
        $pelanggan = \App\Pelanggan::All();
        $temp_jual = \App\Temp_jual::All();
        //No otomatis untuk transaksi penjualan
        $AWAL = 'NJ';
        $bulanRomawi = array("", "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII");
        $noUrutAkhir = \App\Penjualan::max('no_jual');
        $no = 1;
        $formatnya = sprintf("%03s", abs((int)$noUrutAkhir + 1)) . '/' . $AWAL . '/' . $bulanRomawi[date('n')] . '/' . date('Y');
        return view(
            'penjualan.penjualan',
            [
                'barang' => $barang,
                'akun' => $akun,
                'pelanggan' => $pelanggan,
                'temp_penjualan' => $temp_jual,
                'formatnya' => $formatnya
            ]
        );
    }

    public function tambahOrder()
    {
        return view('penjualan');
    }
    public function store(Request $request)
    {
        //Validasi jika barang sudah ada pada tabel temporari maka QTY akan di edit
        if (temp_penjualan::where('kd_brg', $request->brg)->exists()) {
            Alert::warning('Pesan ', 'barang sudah ada.. QTY akan terupdate ?');
            temp_penjualan::where('kd_brg', $request->brg)->update(['qty_jual' => $request->qty]);
            return redirect('transaksi');
        } else {
            temp_penjualan::create([
                'qty_jual' => $request->qty,
                'kd_brg' => $request->brg,
                'hrg_jasa' => $request->hrg_jasa
            ]);
            return redirect('transaksi');
        }
    }
    public function destroy($kd_brg)
    {
        //
        $barang = \App\temp_penjualan::findOrFail($kd_brg);
        $barang->delete();
        Alert::success('Pesan ', 'Data berhasil dihapus');
        return redirect('transaksi');
    }
}
