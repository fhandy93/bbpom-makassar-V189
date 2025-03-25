<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, th, td {
         border: 2px solid;
        }
        th{
            border: 2px solid;
        }
        td{
            border: 2px solid;
        }

</style>
</head>
<body>
    <center>
<h4>DATA KONSUMEN ULPK</h4><p>
<h4>BALAI BESAR POM DI MAKASSAR</h4><p>
<h5 style="margin-top: -15px;">Periode:
                                @if(substr($bulan,-2) == 01)
                                {{"Januari "}}{{substr($bulan,0, 4) }} 
                                @elseif(substr($bulan,-2) == 02)
                                {{"Februari "}}{{substr($bulan,0, 4) }}
                                @elseif(substr($bulan,-2) == 03)
                                {{"Maret "}}{{substr($bulan,0, 4) }}
                                @elseif(substr($bulan,-2) == 04)
                                {{"Apri "}}{{substr($bulan,0, 4) }}
                                @elseif(substr($bulan,-2) == 05)
                                {{"Mei "}}{{substr($bulan,0, 4) }}
                                @elseif(substr($bulan,-2) == 06)
                                {{"Juni "}}{{substr($bulan,0, 4) }}
                                @elseif(substr($bulan,-2) == 07)
                                {{"Juli "}}{{substr($bulan,0, 4) }}
                                @elseif(substr($bulan,-2) == '08')
                                {{"Agustus "}}{{substr($bulan,0, 4) }}
                                @elseif(substr($bulan,-2) == '09')
                                {{"September "}}{{substr($bulan,0, 4) }}
                                @elseif(substr($bulan,-2) == 10)
                                {{"Oktober "}}{{substr($bulan,0, 4) }}
                                @elseif(substr($bulan,-2) == 11)
                                {{"November "}}{{substr($bulan,0, 4) }}
                                @elseif(substr($bulan,-2) == 12)
                                {{"Desember "}}{{substr($bulan,0, 4) }}
                                @endif
                            </h5><p>
</center>

<table>
@foreach ($ulpk as $key => $item)
 <tr>
  <td rowspan="2">No</td>
  <td rowspan="2">Tanggal</td>
  <td rowspan="2">Identitas Konsumen</td>
  <td colspan="2" >Tanggapan</td>
  <td rowspan="2">Jenis Komoditi</td>
  <td rowspan="2">Nama Petugas</td>
  <td rowspan="2">Sarana Komunikasi</td>
  <td colspan="2">Rujuk/Tindak Lanjut</td>
  
 </tr>
 <tr>
  <td>LAYANAN</td>
  <td>JAWABAN</td>

  <td>YA</td>
  <td>TIDAK</td>
 </tr>


 <tr >
 <td rowspan="9">{{++$key}}</td>
 <td rowspan="9">{{$item->tgl_lapor}}</td>
 <td>Nama:{{ $item->nama}}</td>
 <td rowspan="9" style="width: 200px;"> {!! $item->layanan !!} </td>
 <td rowspan="9" style="width: 1200px;">{!! $item->jawaban !!} </td>

 <td rowspan="9"> {{$item->komoditi}} </td>
 <td rowspan="9"> {{$item->user->name}} @if($item->petugas!="-") /{{$item->petugas}} @endif </td>
 <td rowspan="9">{{$item->sarana}}</td>
 <td  rowspan="9">@if($item->rujuk==1) YA @else - @endif</td>
 <td  rowspan="9">@if($item->rujuk==0) TIDAK @else - @endif</td>
</tr>
<tr>
    <td rowspan="1">Umur: {{ $item->umur}}</td>
</tr>
<tr>
    <td rowspan="1">Jenis Kelamin: {{ $item->kelamin}}</td>
</tr>
<tr>
    <td>Alamat : {{ $item->alamat}}</td>
</tr>
<tr>
    <td>HP : {{ $item->hp}}</td>
</tr>
<tr>
    <td>Email : {{ $item->email}}</td>
</tr>
<tr>
    <td>Nama Perusahaan : {{ $item->perusahaan}}</td>
</tr>
<tr>
    <td>Pekerjaan : {{ $item->pekerjaan}}</td>
</tr>
<tr  style="page-break-after: always;">
    <td>Jenis Layanan : {{ $item->jenis}}</td>
</tr>
@endforeach

 
</table>    
</body>
</html>
