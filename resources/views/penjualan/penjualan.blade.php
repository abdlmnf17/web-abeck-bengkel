@extends('layouts.layout')
@section('content')
    @include('sweetalert::alert')

    <!-- Display validation errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Transaksi Penjualan</h1>
    </div>
    <hr>
    <form action="/detail/simpan" method="POST">
        @csrf
        <div class="form-group col-sm-4">
            <label for="no_jual">No Faktur</label>
            <input type="text" name="no_jual" value="{{ $formatnya }}" class="form-control" id="no_jual" readonly>
        </div>
        <div class="form-group col-sm-4">
            <label for="tgl">Tanggal Transaksi</label>
            <input type="date" min="1" name="tgl" id="tgl" class="form-control" required>
        </div>
        <div class="form-group col-sm-4">
            <label for="kd_pel">Pelanggan</label>
            <select name="kd_pel" id="kd_pel" class="form-control" required>
                <option value="">Pilih</option>
                @foreach ($pelanggan as $pel)
                    <option value="{{ $pel->kd_pel }}">{{ $pel->nm_pel }} - {{ $pel->alamat_pel }}</option>
                @endforeach
            </select>
        </div>

        <div class="card-header py-3" align="right">
            <button type="button" class="btn btn-sm btn-danger shadow-sm" data-toggle="modal" data-target="#exampleModalScrollable">
                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Barang
            </button>
        </div>

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered tablestriped" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Quantity</th>
                                <th>Harga Jasa</th>
                                <th>Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($total = 0)
                            @foreach ($temp_penjualan as $temp)
                                <tr>
                                    <td>
                                        <input name="kd_brg[]" class="form-control" type="hidden" value="{{ $temp->kd_brg }}" readonly>
                                        {{ $temp->kd_brg }}
                                    </td>
                                    <td>
                                        <input name="nm_brg[]" class="form-control" type="hidden" value="{{ $temp->nm_brg }}" readonly>
                                        {{ $temp->nm_brg }}
                                    </td>
                                    <td>
                                        <input name="qty_jual[]" class="form-control" type="hidden" value="{{ $temp->qty_jual }}" readonly>
                                        {{ $temp->qty_jual }}
                                    </td>
                                    <td>
                                        <input name="hrg_jasa[]" class="form-control" type="hidden" value="{{ $temp->hrg_jasa }}" readonly>
                                        {{ $temp->hrg_jasa }}
                                    </td>
                                    <td>
                                        <input name="total_jual[]" class="form-control" type="hidden" value="{{ $temp->total_jual }}" readonly>
                                        {{ $temp->total_jual }}
                                    </td>
                                    <td align="center">
                                        <a href="/transaksi/hapus/{{ $temp->kd_brg }}" onclick="return confirm('Yakin ingin menghapus data?')" class="btn btn-sm btn-danger shadow-sm">
                                            <i class="fas fa-trash-alt fa-sm text-white-50"></i> Hapus
                                        </a>
                                    </td>
                                </tr>
                                @php($total += $temp->total_jual)
                            @endforeach
                            <tr>
                                <td colspan="4"></td>
                                <td>Total Rp. {{ number_format($total) }}</td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <input type="submit" class="btn btn-primary" value="Simpan Penjualan">
            </div>
        </div>
    </form>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Tambah Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/sem/store" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="brg">Barang</label>
                            <select name="brg" id="brg" class="form-control" required>
                                <option value="">Pilih</option>
                                @foreach ($barang as $brg)
                                    <option value="{{ $brg->kd_brg }}">{{ $brg->kd_brg }} - {{ $brg->nm_brg }} [{{ number_format($brg->hrg_brg) }}]</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="qty">Quantity</label>
                            <input type="number" min="1" name="qty" id="qty" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="hrg_jasa">Harga Jasa</label>
                            <input type="number" min="0" name="hrg_jasa" id="hrg_jasa" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <input type="submit" class="btn btn-primary" value="Tambah Barang">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
