<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetailJual;
use App\Penjualan;
use App\Pelanggan;
use Illuminate\Support\Facades\DB;
use Alert;

class DetailJualController extends Controller
{
    public function simpan(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'no_jual' => 'required|string|max:255',
            'tgl' => 'required|date',
            'kd_pel' => 'required|string|exists:pelanggan,kd_pel',
            'kd_brg.*' => 'required|string',
            'qty_jual.*' => 'required|integer|min:1',
            'hrg_jasa.*' => 'required|integer|min:0',
            'total_jual.*' => 'required|integer|min:0',
        ]);

        // Simpan ke table penjualan
        $tambah_penjualan = new Penjualan;
        $tambah_penjualan->no_jual = $validatedData['no_jual'];
        $tambah_penjualan->tgl = $validatedData['tgl'];
        $tambah_penjualan->total_jual = array_sum($validatedData['total_jual']); // Hitung total_jual
        $tambah_penjualan->kd_pel = $validatedData['kd_pel'];

        try {
            // Simpan data ke table penjualan
            $tambah_penjualan->save();

            // Simpan data ke table detail jual dalam transaksi
            DB::transaction(function () use ($validatedData) {
                $detailJualData = [];

                foreach ($validatedData['kd_brg'] as $key => $kd_brg) {
                    $detailJualData[] = [
                        'no_jual' => $validatedData['no_jual'],
                        'kd_brg' => $kd_brg,
                        'qty_jual' => (int) $validatedData['qty_jual'][$key],
                        'hrg_jasa' => (int) $validatedData['hrg_jasa'][$key],
                        'total_jual' => (int) $validatedData['total_jual'][$key],
                    ];
                }

                // Insert all detail jual data at once
                DB::table('DetailJual')->insert($detailJualData);
            });

            Alert::success('Pesan', 'Data berhasil disimpan');
            return redirect('/pendapatan');

        } catch (\Exception $e) {
            // Handle exception and rollback transaction if needed
            Alert::error('Kesalahan', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }
}
