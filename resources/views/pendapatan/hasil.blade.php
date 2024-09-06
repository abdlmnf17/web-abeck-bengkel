@extends('layouts.layout')
@section('content')
@include('sweetalert::alert')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-0 text-gray-800"> Transaksi Penjualan </h1>
</div>
<hr>
<form action="/pendapatan/simpan" method="POST">
@csrf
<div class="form-group col-sm-4">
<label for="exampleFormControlInput1"> No Penjualan </label>
@foreach($kas as $ks)
<input type="hidden" name="akun" value="{{ $ks->no_akun }}" class="form-control" id="exampleFormControlInput1" >
@endforeach
@foreach($pendapatan as $hasil)
<input type="hidden" name="no_pen" value="{{ $hasil->no_akun }}" class="form-control" id="exampleFormControlInput1" >
@endforeach
<input type="hidden" name="no_jurnal" value="{{ $formatj }}" class="form-control" id="exampleFormControlInput1" >
<input type="text" name="no_faktur" value="{{ $format }}" class="form-control" id="exampleFormControlInput1" >
</div>
@foreach($penjualan as $jual)
<div class="form-group col-sm-4">
<label for="exampleFormControlInput1">No Penjualan</label>
<input type="text" name="no_jual" value="{{ $jual->no_jual }}" class="form-control" id="exampleFormControlInput1" >
</div>
<div class="form-group col-sm-4">
<label for="exampleFormControlInput1">Tanggal Penjualan</label>
<input type="date" min="1" name="tgl" value="{{ $jual->tgl }}" id="addtgl" class="form-control" id="exampleFormControlInput1" require >
</div>
@endforeach
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
<th>Sub Total</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
@php($total = 0)
@foreach($detail as $temp)
<tr>
<td><input name="no_pen[]" class="form-control"type="hidden" value="{{$temp->no_jual}}" readonly>
<input name="kd_brg[]" class="form-control" type="hidden" value="{{$temp->kd_brg}}" readonly>{{$temp->kd_brg}}</td> <td>{{$temp->nm_brg}}</td>
<td><input name="qty_pen[]" class="form-control" type="hidden" value="{{$temp->qty_jual}}" readonly>{{$temp->qty_jual}}</td>
<td><input name="hrg_jasa[]" class="form-control" type="hidden" value="{{$temp->hrg_jasa}}" readonly>{{$temp->hrg_jasa}}</td>
<td><input name="total_pen[]" class="form-control" type="hidden" value="{{$temp->total_jual}}" readonly>{{$temp->total_jual}}</td>
<td align="center">
<a href="/transaksi/hapus/{{$temp->kd_brg}}" onclick="return confirm('Yakin Ingin menghapus data?')" class="dnone d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-trash-alt fa-sm text-white-50"></i> Hapus</a>
</td>
</tr>
@php($total += $temp->total_jual)
@endforeach
<tr>
<td colspan="3"></td>
<td><input name="total" class="form-control"
type="hidden" value="{{$total}}">Total Rp. {{number_format($total)}}</a>
<td ></td>
</td>
</tr>
</tbody>
</table>
</div>
<input type="submit" class="btn btn-primary btn-send" value="Simpan Transaksi">
</div>
</div>
</form>
@endsection