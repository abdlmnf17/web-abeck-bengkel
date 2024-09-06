@extends('layouts.layout')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Pelanggan</h1>
</div>
<hr>
<div class="card-header py-3" align="right">
    <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#example-Modal-Scrollable">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah
    </button>
</div>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
 <thead class="thead-dark">
 <tr align="center">
 <th>Kode Pelanggan</th>
 <th>Nama Pelanggan</th>
 <th>Alamat Pelanggan</th>
 <th>Telepon Pelanggan</th>
 <th>Aksi</th>
 </tr>
 </thead>
 <tbody>
 @foreach($pelanggan as $pel)
 <tr>
 <td>{{ $pel->kd_pel}}</td>
 <td>{{ $pel->nm_pel}}</td>
 <td>{{ $pel->alamat_pel}}</td>
 <td>{{ $pel->telp_pel}}</td>
 <td align="center"><a href="{{route('pelanggan.edit',[$pel->kd_pel])}}"class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
 <i class="fas fa-edit fa-sm text-white-50"></i> Edit</a>
 <a href="/pelanggan/hapus/{{$pel->kd_pel}}" onclick="return confirm('Yakin Ingin menghapus data?')" class="dnone d-sm-inline-block btn btn-sm btn-danger shadow-sm">
 <i class="fas fa-trash-alt fa-sm text-white-50"></i> Hapus</a>
 </td>
 </tr>
 @endforeach
 </tbody>
 </table>
</div>
</div>
</div>
<div class="modal fade" id="example-Modal-Scrollable" tabindex="-1" role="dialog"aria-labelledby="example-Modal-Scrollable-Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal-Scrollable-Title">Tambah Data Pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
            </button>
        </div>
<form action="{{ action('pelangganController@store') }}" method="POST">
@csrf
<div class="modal-body">
<div class="form-group">
<label for="exampleFormControlInput1">Kode Pelanggan</label>
<input type="text" id="addkdpel" name="addkdpel" class="form-control" value="{{$formatnya}}" readonly> 
</div>
<div class="form-group">
<label for="exampleFormControlInput1">Nama Pelanggan</label>
<input type="text" name="addnmpel" id="addnmpel" class="form-control" id="exampleFormControlInput1" >
</div>
<div class="form-group">
<label for="exampleFormControlInput1">Alamat Pelanggan</label>
<input type="text" name="addalamatpel" id="addalamatpel" class="form-control" id="exampleFormControlInput1" >
</div>
<div class="form-group">
<label for="exampleFormControlInput1">Telepon Pelanggan</label>
<input type="number" name="addtelppel" id="addtelppel" class="form-control" id="exampleFormControlInput1" >
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
<input type="submit" class="btn btn-primary btn-send" value="Simpan">
</div>
</div>
</form>
</div>
</div>
@endsection