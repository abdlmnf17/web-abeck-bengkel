<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
class montirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $montir=\App\Montir::All();
        $AWAL = 'MTR';
        $bulanRomawi = array("", "I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
        $noUrutAkhir = \App\Montir::max('kd_mtr');
        $no = 1;
        $formatnya=sprintf("%02s", abs((int)$noUrutAkhir + 1)). '-' . $AWAL ;
        return view('admin.montir.montir',['montir'=>$montir, 'formatnya'=>$formatnya]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.montir.input');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tambah_montir=new \App\Montir;
        $tambah_montir->kd_mtr= $request->addkdmtr;
        $tambah_montir->nm_mtr = $request->addnmmtr;
        $tambah_montir->alamat_mtr = $request->addalamatmtr;
        $tambah_montir->telp_mtr = $request->addtelpmtr;
        $tambah_montir->save();
        Alert::success('Pesan ','Data berhasil disimpan');
        return redirect('/pelanggan');
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
        $montir_edit=\App\Montir::findOrFail($id);
        return view('admin.montir.editMontir',['montir'=>$montir_edit]);
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
        $montir=\App\montir::findOrFail($id);
        $montir->kd_mtr=$request->get('addkdmtr');
        $montir->nm_mtr=$request->get('addnmmtr');
        $montir->alamat_mtr=$request->get('addalamatmtr');
        $montir->telp_mtr=$request->get('addtelpmtr');
        $montir->save();
        return redirect()->route('montir.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $montir=\App\Montir::findOrFail($id);
        $montir->delete();
        Alert::success('Pesan ','Data berhasil dihapus');
        return redirect()->route('montir.index');

    }
}
