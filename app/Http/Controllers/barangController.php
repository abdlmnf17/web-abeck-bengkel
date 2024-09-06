<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use alert;

class barangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = \App\Barang::All();
        $AWAL = 'KB';
        $noUrutAkhir = \App\Barang::max('kd_brg');
        $no = 1;
        $formatnya = sprintf("%02s", abs((int)$noUrutAkhir + 1)) . $AWAL;
        return view('admin.barang.barang', ['barang' => $barang, 'formatnya' => $formatnya]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.barang.input');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tambah_barang = new \App\Barang;
        $tambah_barang->kd_brg = $request->addkdbrg;
        $tambah_barang->nm_brg = $request->addnmbrg;
        $tambah_barang->hrg_brg = $request->addhrgbrg;
        $tambah_barang->stok = $request->addstok;
        $tambah_barang->save();
        //Alert::success('Pesan ','Data berhasil disimpan');
        return redirect('/barang');
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
        $barang_edit = \App\Barang::findOrFail($id);
        return view('admin.barang.editBarang', ['barang' => $barang_edit]);
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
        $barang = \App\Barang::findOrFail($id);
        $barang->kd_brg = $request->get('addkdbrg');
        $barang->nm_brg = $request->get('addnmbrg');
        $barang->hrg_brg = $request->get('addhrgbrg');
        $barang->stok = $request->get('addstok');;
        $barang->save();
        //Alert::success('Pesan ','Data berhasil di Ubah');
        return redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = \App\Barang::findOrFail($id);
        $barang->delete();
        //Alert::success('Pesan ','Data berhasil di Hapus');
        return redirect()->route('barang.index');
    }
}
