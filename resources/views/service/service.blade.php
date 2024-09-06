@extends('layouts.layout')
@section('content') 
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Service</h1>
</div><hr>
<div class="card-header py-3" align="right"> 
    <a href="{{route('service.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data </a>
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4"> 
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark"> 
                    <tr align="center">
 <th width="15%">No Service</th>
 <th width="10%">Kode Montir</th>
 <th width="10%">Tanggal</th>
 <th width="20%">Keterangan</th>
 <th width="10%">Harga Jasa</th>
 <th width="10%">Harga Barang</th>
 <th width="10%">Total</th>
 <th width="15%">Aksi</th>
 </tr>
 </thead>
 <tbody>
 @foreach ($service as $servis)
 <tr>
 <td>{{$servis->no_servis}}</td> 
 <td>{{$servis->kd_mtr}}</td>
 <td>{{$servis->tgl_servis}}</td>
 <td>{{$servis->ket_servis}}</td>
 <td>Rp. {{number_format ($servis->hrg_jasa) }}</td>
 <td>Rp. {{number_format ($servis->hrg_jual) }}</td>
 <td>Rp. {{number_format ($servis->total_servis) }}</td>
 <td align="center">
 <a href="{{route('cetak.service_pdf',[Crypt::encryptString($servis->no_servis)])}}" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm">
 <i class="fas fa-print fa-sm text-white-50"></i> Cetak Invoice</a>

                <a href="/service/hapus/{{ $servis->no_servis }}" onclick="return confirm('Yakin Ingin menghapus data?')" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                                <i class="fas fa-trash-alt fa-sm text-white-50"></i> Hapus
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection