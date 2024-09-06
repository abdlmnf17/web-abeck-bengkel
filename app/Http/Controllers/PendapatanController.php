<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use App\DetailPedapatan;
use App\Pendapatan;
use DB;
use Alert;
use PDF;
class PendapatanController extends Controller
{
//
public function index(){
$jual=\App\Penjualan::All();

//perintah SQL untuk menghilangkan data penjualan ketika sudah dijual
$jual = DB::select('SELECT * FROM penjualan where not exists (select * from pendapatan where penjualan.no_jual=pendapatan.no_jual)');
return view('pendapatan.pendapatan',['penjualan'=>$jual]);
}

public function edit($id){
$AWAL = 'FP';
$bulanRomawi = array("", "I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
$noUrutAkhir = \App\Pendapatan::max('no_pen');
$no = 1;
$format=sprintf("%03s", abs((int)$noUrutAkhir + 1)). '/' . $AWAL .'/' . $bulanRomawi[date('n')] .'/' . date('Y');
$AWALJurnal = 'JRU';
$bulanRomawij = array("", "I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
$noUrutAkhirj = \App\Jurnal::max('no_jurnal');
$noj = 1;
$formatj=sprintf("%03s", abs((int)$noUrutAkhirj + 1)). '/' . $AWALJurnal.'/' . $bulanRomawij[date('n')] .'/' . date('Y');
$decrypted = Crypt::decryptString($id);
$detail = DB::table('tampil_penjualan')->where('no_jual',$decrypted)->get();
$penjualan = DB::table('penjualan')->where('no_jual',$decrypted)->get();
$akunkas = DB::table('setting')->where('nama_transaksi','Kas')->get();
$akunpendapatan = DB::table('setting')->where('nama_transaksi','Pendapatan')->get();
return view('pendapatan.hasil',['detail'=>$detail,'format'=>$format,'no_jual'=>$decrypted,'penjualan'=>$penjualan,'formatj'=>$formatj,'kas'=>$akunkas,'pendapatan'=>$akunpendapatan]);
}
public function pdf($id){
$decrypted = Crypt::decryptString($id);
$detail = DB::table('tampil_penjualan')->where('no_jual',$decrypted)->get();
$pelanggan = DB::table('pelanggan')->get();
$penjualan = DB::table('penjualan')->where('no_jual',$decrypted)->get();
$pdf = PDF::loadView('laporan.faktur',['detail'=>$detail,'order'=>$penjualan,'pel'=>$pelanggan,'noorder'=>$decrypted]);
return $pdf->stream();
}
public function simpan(Request $request)
{
    \Log::info('Request Data:', $request->all());

    // Validasi data
    $validated = $request->validate([
        'no_jual' => 'required|string',
        'tgl' => 'required|date',
        'no_faktur' => 'required|string',
        'total_jual' => 'required|integer',
        'kd_brg' => 'required|array',
        'qty_pen' => 'required|array',
        'hrg_jasa' => 'required|array',
        'sub_pen' => 'required|array',
        'no_jurnal' => 'required|string',
        'pembelian' => 'required|string',
        'akun' => 'required|string',
        'total' => 'required|integer',
    ]);

    \Log::info('Validated Data:', $validated);

    if (Pendapatan::where('no_jual', $request->no_jual)->exists()) {
        \Log::info('Penjualan sudah ada');
        Alert::warning('Pesan', 'Penjualan Telah dilakukan');
        return redirect('pendapatan');
    } else {
        try {
            DB::transaction(function () use ($request) {
                // Simpan ke tabel pendapatan
                $tambah_pendapatan = new Pendapatan;
                $tambah_pendapatan->no_pen = $request->no_jual;
                $tambah_pendapatan->tgl = $request->tgl;
                $tambah_pendapatan->no_faktur = $request->no_faktur;
                $tambah_pendapatan->total_pen = $request->total_jual;
                $tambah_pendapatan->no_jual = $request->no_jual;
                $tambah_pendapatan->save();

    //SIMPAN DATA KE TABEL detail_pendapatan
    foreach ($request->kd_brg as $key => $no) {
        DetailPendapatan::create([
            'no_pen' => $request->no_faktur,
            'kd_brg' => $no,
            'qty_pen' => $request->qty_pen[$key],
            'hrg_jasa' => $request->hrg_jasa[$key],
            'sub_pen' => $request->sub_pen[$key],
        ]);
    }

    //SIMPAN ke table jurnal bagian debet
    Jurnal::create([
        'no_jurnal' => $request->no_jurnal,
        'keterangan' => 'Utang Dagang',
        'tgl_jurnal' => $request->tgl,
        'no_akun' => $request->pembelian,
        'debet' => $request->total,
        'kredit' => 0,
    ]);

    //SIMPAN ke table jurnal bagian kredit
    Jurnal::create([
        'no_jurnal' => $request->no_jurnal,
        'keterangan' => 'Kas',
        'tgl_jurnal' => $request->tgl,
        'no_akun' => $request->akun,
        'debet' => 0,
        'kredit' => $request->total,
    ]);
    \Log::info('Data berhasil disimpan');
    Alert::success('Pesan', 'Data berhasil disimpan');
});
} catch (\Exception $e) {
\Log::error('Error saat menyimpan data: ' . $e->getMessage());
Alert::error('Pesan', 'Terjadi kesalahan saat menyimpan data');
}

return redirect('/pendapatan');
}
}
}
