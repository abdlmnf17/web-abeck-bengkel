@extends('layouts.layout')
@section('content')
    @include('sweetalert::alert')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Transaksi Penjualan </h1>
    </div>
    <hr>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered tablestriped" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th width="15%">No Penjualan</th>
                            <th>Tanggal Jual</th>
                            <th width="30%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penjualan as $jual)
                            <tr>
                                <td width="15%">{{ $jual->no_jual }}</td>
                                <td>{{ $jual->tgl }}</td>
                                <td width="30%">
                                    <a href="{{ url('/pendapatan-hasil/' . Crypt::encryptString($jual->no_jual)) }}"
                                        class="d-none d-sm-inline-block btn btn-sm btn-success shadowsm"><i
                                            class="fas fa-edit fa-sm text-white-50"></i> Jual </a>
                                    {{-- <a href="{{ route('cetak.order_pdf', [Crypt::encryptString($jual->no_jual)]) }}"
                                        target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm">
                                        <i class="fas fa-print fa-sm text-white-50"></i> Cetak Invoice </a> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </form>
@endsection
