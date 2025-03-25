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
        .styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}
.styled-table thead tr {
    background-color: #009879;

    text-align: left;
}
.styled-table th,
.styled-table td {
    padding: 12px 15px;
}
.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}
.styled-table tbody tr.active-row {
    font-weight: bold;

}
</style>
</head>
<body>
    <center>
<h4>DATA ABSENSI ADAJA</h4><p>
<h4 style="margin-top: -20px;">Balai Besar POM di Makassar</h4><p>
<h5 style="margin-top: -20px;">Periode:
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
<table class="styled-table">
    <thead>
        <tr>
        <th>No</th>
        <th>Nama Pegawai</th>
        <th>Unit Kerja</th>
        <th>Posisi Absen</th>
        <th>Jenis Absen</th>
        <th>Status</th>
        <th>Tanggal Absen</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($adaja as $key => $item)
 <tr>
    <th>{{ ++$key }}</th>
    <td>{{$item-> user-> name}}</td>
    <td>
        @foreach($profile as $key => $prof)
            @if($item-> user-> username == $prof->username )
                {{$prof->unit }}
            @endif
        @endforeach
    </td>
    <td>{{$item->lat}}, {{$item->lon}}</td>
    <td> @if($item->jenis==1)  
        Check In   
        @else
        Check Out
        @endif    
    </td>
    <td>
        @if($item->status==0)
        Dalam Absensi
        @else
        Selesai 
        @endif  
    </td>
    <td>{{$item-> created_at}}</td>
 </tr>

@endforeach
    </tbody>
</table>
</body>
</html>
