@extends('layouts.layout')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> Data Buku Besar </h1>
    </div>
    <hr>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table tablebordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr align="center">
                            <th width="10%">No Transaksi</th>
                            <th width="10%">Tanggal Transaksi</th>
                            <th width="15%">Keterangan</th>
                            <th width="10%">Debet</th>
                            <th width="10%">Kredit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bukubesar as $bb)
                            <tr align="center">
                                <td>{{ $bb->notrans }}</td>
                                <td>{{ $bb->tgl }}</td>
                                <td>{{ $bb->ket }}</td>
                                <td>Rp. {{ number_format($bb->jmldb) }}</td>
                                <td>Rp. {{ number_format($bb->jmlcr) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
