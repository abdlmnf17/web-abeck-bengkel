<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
class pelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggan=\App\Pelanggan::All();
        $AWAL = 'PE';
        $bulanRomawi = array("", "I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
        $noUrutAkhir = \App\Pelanggan::max('kd_pel');
        $no = 1;
        $formatnya=sprintf("%02s", abs((int)$noUrutAkhir + 1)). '-' . $AWAL ;
        return view('admin.pelanggan.pelanggan',['pelanggan'=>$pelanggan, 'formatnya'=>$formatnya]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pelanggan.input');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tambah_pelanggan=new \App\Pelanggan;
        $tambah_pelanggan->kd_pel= $request->addkdpel;
        $tambah_pelanggan->nm_pel = $request->addnmpel;
        $tambah_pelanggan->alamat_pel = $request->addalamatpel;
        $tambah_pelanggan->telp_pel = $request->addtelppel;
        $tambah_pelanggan->save();
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
        $pelanggan_edit=\App\Pelanggan::findOrFail($id);
        return view('admin.pelanggan.editPelanggan',['pelanggan'=>$pelanggan_edit]);
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
        $pelanggan=\App\Pelanggan::findOrFail($id);
        $pelanggan->kd_pel=$request->get('addkdpel');
        $pelanggan->nm_pel=$request->get('addnmpel');
        $pelanggan->alamat_pel=$request->get('addalamatpel');
        $pelanggan->telp_pel=$request->get('addtelppel');
        $pelanggan->save();
        Alert::success('Pesan ','Data berhasil diupdate');
        return redirect()->route('pelanggan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelanggan=\App\Pelanggan::findOrFail($id);
        $pelanggan->delete();
        Alert::success('Pesan ','Data berhasil dihapus');
        return redirect()->route('pelanggan.index');

    }
}
