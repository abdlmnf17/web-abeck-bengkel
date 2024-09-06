@extends('layouts.layout')
@section('content')
<form action="{{route('pelanggan.update', [$pelanggan->kd_pel])}}" method="POST">
 @csrf
 <input type="hidden" name="_method" value="PUT">
 <fieldset>
 <legend>Ubah Data Pelanggan</legend>
 <div class="form-group row">
 <div class="col-md-5">
 <label for="addkdpel">Kode Pelanggan</label>
 <input class="form-control" type="text" name="addkdpel" value="{{$pelanggan->kd_pel}}" readonly>
 </div>
 <div class="col-md-5">
 <label for="addnmpel">Nama Pelanggan</label>
 <input id="addnmpel" type="text" name="addnmpel" class="form-control" value="{{$pelanggan->nm_pel}}">
 </div>
 </div>
 <div class="form-group row">
 <div class="col-md-5">
 <label for="addalamatpel">Alamat Pelanggan</label>
 <input id="addalamatpel type="text" name="addalamatpel" class="form-control" value="{{$pelanggan->alamat_pel}}">
 </div>
 <div class="col-md-5">
 <label for="addtelppel">Telepon Pelanggan</label>
 <input id="addtelppel" type="text" name="addtelppel" class="form-control" value="{{$pelanggan->telp_pel}}">
 </div>
 </div>
 </fieldset>
 <div class="col-md-10">
 <input type="submit" class="btn btn-success btn-send" value="Update">
 <a href="{{ route('pelanggan.index') }}"><input type="Button" class="btn btn-primary btn-send" value="Kembali"></a>
 </div>
 <hr>
</form>
@endsection