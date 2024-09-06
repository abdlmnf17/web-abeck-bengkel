@extends('layouts.layout')
@section('content')
<form action="{{route('service.store')}}" method="POST">
@csrf
 <fieldset>
 <legend>Input Data Service</legend>
 <div class="form-group row">
 <div class="col-md-3">Nomor Service<input id="no_servis" type="text" name="no_servis" class="form-control" value="{{$formatnya}}" required>
 </div>
 <div class="col-md-3">Tanggal Transaksi<input id="tgl_servis" type="date" name="tgl_servis" value=""class="form-control" required>
 </div>
 </div>
 <div class="form-group-row">
 <label for="exampleForm-ControlInput1"> Montir </label>
 <select name="kd_mtr" id="kd_mtr select2" class="form-control"required width="100%">
    <option value="">--Pilih Montir--</option>
    @foreach ($montir as $mtr)
    <option value="{{ $mtr->kd_mtr}}">{{ $mtr->kd_mtr }} - {{ $mtr->nm_mtr}} </option>
    @endforeach
</select>
</div>
 <div class="form-group row">
 <div class="col-md-6">Keterangan<input id="ket_servis" type="text" name="ket_servis" class="form-control" required>
 </div>
 </div>
 <div class="form-group row">
 <div class="col-md-3">Harga Jasa<input id="hrg_jasa" type="number" name="hrg_jasa" class="form-control" required>
 </div>
 </div>
 <div class="form-group row">
 <div class="col-md-3">Harga Barang<input id="hrg_jual" type="number" name="hrg_jual" class="form-control" required>
 </div>
 </div>
 <div class="form-group row">
 <div class="col-md-3">Total Service<input id="total_servis" type="number" name="total_servis" class="form-control" readonly>
    </body>
    </html>
</div>
 </div>
 <div class="form-group row">
 <div class="col-md-10">
 <input type="submit" class="btn btn-success btn-send" value="Simpan" >
 <input type="Button" class="btn btn-primary btnsend" value="Kembali" onclick="history.go(-1)">
 </div>
 </div><hr>
 </fieldset>
</form>
<script>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#hrg_jasa, #hrg_jual').on('input', function() {
                // Ambil nilai dari input harga jasa dan harga jual
                var hargaJasa = parseFloat($('#hrg_jasa').val()) || 0;
                var hargaJual = parseFloat($('#hrg_jual').val()) || 0;

                // Hitung total harga servis
                var totalServis = hargaJasa + hargaJual;

                // Set nilai total servis ke dalam input dengan id total_servis
                $('#total_servis').val(totalServis);
            });
        });
    </script>
</body>
</html>
@endsection