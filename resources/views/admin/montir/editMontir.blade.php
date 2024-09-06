@extends('layouts.layout')
@section('content')
<form action="{{route('montir.update', [$montir->kd_mtr])}}" method="POST">
 @csrf
 <input type="hidden" name="_method" value="PUT">
 <fieldset>
 <legend>Ubah Data Montir</legend>
 <div class="form-group row">
 <div class="col-md-5">
 <label for="addkdmtr">Kode Montir</label>
 <input class="form-control" type="text" name="addkdmtr" value="{{$montir->kd_mtr}}" readonly>
 </div>
 <div class="col-md-5">
 <label for="addnmmtr">Nama Montior</label>
 <input id="addnmmtr" type="text" name="addnmmtr" class="form-control" value="{{$montir->nm_mtr}}">
 </div>
 </div>
 <div class="form-group row">
 <div class="col-md-5">
 <label for="addalamatmtr">Alamat Montir</label>
 <input id="addalamatmtr" type="text" name="addalamatmtr" class="form-control" value="{{$montir->alamat_mtr}}">
 </div>
 <div class="col-md-5">
 <label for="addtelpmtr">Telepon Montir</label>
 <input id="addtelpmtr" type="text" name="addtelpmtr" class="form-control" value="{{$montir->telp_mtr}}">
 </div>
 </div>
 </fieldset>
 <div class="col-md-10">
 <input type="submit" class="btn btn-success btn-send" value="Update">
 <a href="{{ route('montir.index') }}"><input type="Button" class="btn btn-primary btn-send" value="Kembali"></a>
 </div>
 <hr>
</form>
@endsection