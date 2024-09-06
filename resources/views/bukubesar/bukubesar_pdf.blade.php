<!DOCTYPE html>
<html>
<head>
 <title>Laporan Buku Besar</title>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <style type="text/css">
 table tr td,
 table tr th{
 font-size: 10pt;
 } 
 </style>
</head>
<body>
 <table class="table table-bordered" width="100%" align="center">
 <tr align="center"><td><h2>Laporan Buku Besar<br>Bengkel Abeck Jaya Motor</h2><hr></td></tr>
 </table>
 <table class="table table-bordered" width="100%" align="center">
 <thead class="thead-dark"> 
 <tr align="center">
 <th width="10%"> Kode Transaksi</th>
 <th width="10%">Tanggal Transaksi</th>
 <th width="15%">Keterangan</th>
 <th width="10%">Debet</th>
 <th width="10%">Kredit</th>
 </tr>
 </thead>
 <tbody>
@php
 $jmldb = 0;
 $jmlcr = 0;
 @endphp
 @foreach ($bukubesar as $bb)
 <tr>
    
 <td>{{$bb->notrans}}</td>
 <td>{{$bb->tgl}}</td>
 <td>{{$bb->ket}}</td> 
 <td>Rp. {{number_format($bb->jmldb) }}</td> 
 <td>Rp. {{number_format($bb->jmlcr) }}</td 
 </tr>
 <!-- hitung total debet dan kredit -->
 {{$jmldb += $bb->jmldb}};
 {{$jmlcr += $bb->jmlcr}};

 @endforeach 
 

 <tr>
 <td></td>
 <td></td>
 <td>TOTAL</td>
 <td>Rp. {{ number_format($jmldb) }}</td>
 <td>Rp. {{ number_format($jmlcr) }}</td>
 </tr>

 </tbody>
 </table>
 <div align="right">
 <h6>Tanda Tangan</h6><br><br><h6>{{ Auth::user()->name }}</h6>
 </div>
</body>
</html>

