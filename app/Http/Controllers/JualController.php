<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use App\bukubesar;
Use App\Penjualan;
use App\Barang;
use DB;
Use PDF;
class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jual = \App\Penjualan::All();
        return view( 'penjualan.penjualan' , ['penjualan' => $jual]);
    }

    public function pdf($id){
        $decrypted = Crypt::decryptString($id);
        $penjualan = DB::table('penjualan')->where('no_jual',$decrypted)->get();
        $barang= DB::table('barang')->get();
        $pdf = PDF::loadView('laporan.fakturjual',
        ['penjualan'=>$penjualan, 'no_jual'=>$decrypted, 'barang'=>$barang, 'nm_brg' ]);

        return $pdf->stream();
       }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jual = \App\Penjualan::All();
        $brg  =  \App\Barang::All();
         ///No otomatis untuk transaksi penjualan
         $AWAL = 'NJ-AJM';
         $bulanRomawi = array("", "I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
         $noUrutAkhir = \App\Pembelian::max('no_beli');
         $no = 1;
         $nomor = sprintf("%03d", abs((int)$noUrutAkhir + 1)) . '-' . $AWAL . '-' . $bulanRomawi[date('n')] . '-' . date('Y');
         return view('penjualan.input', ['barang' => $brg, 'nomor'=>$nomor]);
            
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Menyimpan Data Ke Tabel Penjualan
        $save_jual = new \App\Penjualan;
        $save_jual->no_jual=$request->get('no_jual');
        $save_jual->tgl_jual=$request->get('tgl_jual');
        $save_jual->nm_brg=$request->get('nm_brg');
        $save_jual->hrg_jual=$request->get('hrg_jual');
        $save_jual->qty_jual=$request->get('qty_jual');
        $save_jual->total_jual=$request->get('total_jual');
        $save_jual->save();

        //Menyimpan Data Ke Tabel BukuBesar
        $savebb= new \App\bukubesar;
        $savebb->notrans=$request->get('no_jual');
        $savebb->tgl=$request->get('tgl_jual');
        $savebb->ket=$request->get('nm_brg');
        $savebb->jmldb=$request->get('total_jual');
        $savebb->jmlcr=0;
        $savebb->save();

    
        return redirect()->route( 'penjualan.index' );

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jual = \App\Penjualan::findOrFail($id);
        $jual->delete();
        DB::table('bukubesar')->where('notrans','=', $jual->no_jual)->delete();
        return redirect()->route( 'penjualan.index');
    }
}
