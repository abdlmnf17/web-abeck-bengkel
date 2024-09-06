<?php

namespace App\Http\Controllers;
use Alert; 
use Illuminate\Http\Request;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $akun=\App\Akun::All();         
        return view('admin.akun.akun',['akun'=>$akun]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.akun.input');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //untuk menyimpan data          
        $tambah_akun=new \App\Akun;         
        $tambah_akun->no_akun = $request->addnoakun;         
        $tambah_akun->nm_akun = $request->addnmakun;         
        $tambah_akun->save(); 
        // method         
        return redirect('/akun'); // prosedur  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tambah_akun=new \App\Akun;         
        $tambah_akun->no_akun = $request->addnoakun;         
        $tambah_akun->nm_akun = $request->addnmakun;                
        $tambah_barang->save();         
        Alert::success('Pesan ','Data berhasil disimpan');         
        return redirect('/akun');  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $akun_edit=\App\Akun::findOrFail($id);         
        return view('admin.akun.edit',['akun'=>$akun_edit]); 
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
        $update_akun = \App\akun::findOrFail($id);         
        $update_akun->no_akun=$request->addnoakun;         
        $update_akun->nm_akun=$request->addnmakun;         
        $update_akun->save();         
        Alert::success('Update', 'Data Berhasil di update');        
        return redirect()->route( 'akun.index'); 
        $tambah_akun->no_akun = $request->addnoakun; 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $akun=\App\Akun::findOrFail($no_akun);         
        $akun->delete();         
        Alert::success('Pesan ','Data berhasil dihapus');         
        return redirect()->route('akun.index');   
    }
}
