<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use App\bukubesar;
Use App\Service;
use App\Barang;
use App\montir;
use App;
use DB;
Use PDF;
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servis = \App\Service::All();
        return view( 'service.service' , ['service' => $servis]);
    }

    public function pdf($id){
        $decrypted = Crypt::decryptString($id);
        $service = DB::table('service')->where('no_servis',$decrypted)->get();
        $barang= DB::table('barang')->get();
        $montir= DB::table('montir')->get();
        $pdf = PDF::loadView('laporan.fakturservice',
        ['service'=>$service, 'no_servis'=>$decrypted, 'barang'=>$barang, 'hrg_jual', 'montir'=>$montir, 'kd_mtr']);

        return $pdf->stream();
       }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $servis = \App\Service::All();
       $mtr = \App\Montir::All();
        ///No otomatis untuk transaksi service
        $AWAL = 'NS-AJM';
        $bulanRomawi = array("", "I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
        $noUrutAkhir = \App\Service::max('no_servis');
        $no = 1;
        $formatnya=sprintf("%03s", abs((int)$noUrutAkhir + 1)). '-' . $AWAL .'-' . $bulanRomawi[date('n')] .'-' . date('Y');
        return view('service.input', 
        [ 'montir' => $mtr, 'formatnya'=>$formatnya]); 
            
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Menyimpan Data Ke Tabel Service
        $save_servis = new \App\Service;
        $save_servis->no_servis=$request->get('no_servis');
        $save_servis->kd_mtr=$request->get('kd_mtr');
        $save_servis->tgl_servis=$request->get('tgl_servis');
        $save_servis->ket_servis=$request->get('ket_servis');
        $save_servis->hrg_jasa=$request->get('hrg_jasa');
        $save_servis->hrg_jual=$request->get('hrg_jual');
        $save_servis->total_servis=$request->get('total_servis');
        $save_servis->save();

        //Menyimpan Data Ke Tabel BukuBesar
        $savebb= new \App\bukubesar;
        $savebb->notrans=$request->get('no_servis');
        $savebb->tgl=$request->get('tgl_servis');
        $savebb->ket=$request->get('ket_servis');
        $savebb->jmldb=$request->get('total_servis');
        $savebb->jmlcr=0;
        $savebb->save();

    
        return redirect()->route( 'service.index' );

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
        $servis = \App\Service::findOrFail($id);
        $servis->delete();
        DB::table('bukubesar')->where('notrans','=', $servis->no_servis)->delete();
        return redirect()->route( 'service.index');
    }
}
