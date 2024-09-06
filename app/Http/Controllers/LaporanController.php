<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use DB;
class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('laporan.laporan');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $periode=$request->get('periode');
        $jenis=$request->get('jenis');
        if($jenis=='bukubesar')
        {
            if($periode == 'All')
            {
        $bb = \App\bukubesar::All();
        $pdf = PDF::loadview('bukubesar.bukubesar_pdf',['bukubesar'=>$bb])->setPaper('A4','landscape');
        return $pdf->stream();
        }elseif($periode == 'periode'){
        $tglawal=$request->get('tglawal');
        $tglakhir=$request->get('tglakhir');
        $bb=DB::table('bukubesar')
                ->whereBetween('tgl', [$tglawal,$tglakhir])
                ->orderby('tgl','ASC')
                ->get();
                $pdf = PDF::loadview('bukubesar.bukubesar_pdf',['bukubesar'=>$bb])->setPaper('A4','landscape');
                return $pdf->stream(); 
            }
 
        }
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
        //
    }
}
