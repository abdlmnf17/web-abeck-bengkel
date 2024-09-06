@extends('layouts.layout')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Montir</h1>
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
 <th>Kode Montir</th>
 <th>Nama Montir</th>
 <th>Alamat Montir</th>
 <th>Telepon Montir</th>
 <th>Aksi</th>
 </tr>
 </thead>
 <tbody>
 @foreach($montir as $mtr)
 <tr>
 <td>{{ $mtr->kd_mtr}}</td>
 <td>{{ $mtr->nm_mtr}}</td>
 <td>{{ $mtr->alamat_mtr}}</td>
 <td>{{ $mtr->telp_mtr}}</td>
 <td align="center"><a href="{{route('montir.edit',[$mtr->kd_mtr])}}"class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
 <i class="fas fa-edit fa-sm text-white-50"></i> Edit</a>
 <a href="/montir/hapus/{{$mtr->kd_mtr}}" onclick="return confirm('Yakin Ingin menghapus data?')" class="dnone d-sm-inline-block btn btn-sm btn-danger shadow-sm">
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
                <h5 class="modal-title" id="example-Modal-Scrollable-Title">Tambah Data Montir</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
            </button>
        </div>
<form action="{{ action('montirController@store') }}" method="POST">
@csrf
<div class="modal-body">
<div class="form-group">
<label for="exampleFormControlInput1">Kode Montir</label>
<input type="text" id="addkdmtr" name="addkdmtr" class="form-control" value="{{$formatnya}}" readonly> 
</div>
<div class="form-group">
<label for="exampleFormControlInput1">Nama Montir</label>
<input type="text" name="addnmmtr" id="addnmmtr" class="form-control" id="exampleFormControlInput1" >
</div>
<div class="form-group">
<label for="exampleFormControlInput1">Alamat Montir</label>
<input type="text" name="addalamatmtr" id="addalamatmtr" class="form-control" id="exampleFormControlInput1" >
</div>
<div class="form-group">
<label for="exampleFormControlInput1">Telepon Montir</label>
<input type="text" name="addtelpmtr" id="addtelpmtr" class="form-control" id="exampleFormControlInput1" >
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