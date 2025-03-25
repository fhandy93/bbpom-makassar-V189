<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, th, td {
         border: 1px solid;
        }
        th{
            border: 1px solid;
        }
        td{
            border: 1px solid;
        }
        .styled-table {
            border-collapse: collapse;
            margin: 0px 0;
            font-size: 0.7em;
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
            padding: 7px 10px;
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
<h4>VERIFIKASI KEGIATAN LEMBUR</h4>
<h4 style="margin-top: -15px;">Balai Besar POM di Makassar</h4>
<p>
</center>
<table style="border: none;">
    <tr style="border: none;">
        <td style="border: none;">No. Surat </td>
        <td style="border: none;">:</td>
        <td style="border: none;">{{$smile->no_surat}}</td>
    </tr>
    <tr style="border: none;">
        <td style="border: none;">Tanggal Lembur </td>
        <td style="border: none;">:</td>
        <td style="border: none;">{{$smile->tgl_lembur}}</td>
    </tr>
    <tr style="border: none; ">
        <td style="border: none;">Keterangan </td>
        <td style="border: none;">:</td>
        <td style="border: none; width: 300px;">{{$smile->ket}}</td>
    </tr>
</table>
<table class="styled-table">
    <thead>
        <tr>
        <th>No</th>
        <th>Nama Pegawai</th>
        <th>NIP</th> 
        <th>Pangkat Golongan</th>
        <th>Jabatan</th>
        <th>Tanggal Lembur</th>
        <th>Jam Mulai</th>
        <th>Jam Selesai</th>
        <th>Total Jam Lembur</th>
        
        </tr>
    </thead>
    <tbody>
    @foreach ($trans as $key => $item)
 <tr>
    <th>{{ ++$key }}</th>
    <td>{{$item-> user-> name}}</td>
    <td>
        @foreach($profile as $key => $prof)
            @if($item-> user-> username == $prof->username )
                {{$prof->nip }}
            @endif
        @endforeach
    </td>
    <td>
        @foreach($profile as $key => $prof)
            @if($item-> user-> username == $prof->username )
                {{$prof->pangkat }}
            @endif
        @endforeach
    </td>
    <td>
        @foreach($profile as $key => $prof)
            @if($item-> user-> username == $prof->username )
                {{$prof->jabatan }}
            @endif
        @endforeach
    </td>
    <td>{{$item-> tgl_lembur}}</td>
    <td>{{$item-> jam_mulai}}</td>
    <td>{{$item-> jam_selesai}}</td>
    <td>{{timeLembur(substr($item->jam_selesai,0,2),
        substr($item->jam_selesai,3,2),
        substr($item->jam_mulai,0,2),
        substr($item->jam_mulai,3,2))}}</td>
    
 </tr>

@endforeach
    </tbody>
</table><p>
<table style="border: none;margin-left: auto; 
margin-right: 0;">
    <tr style="border: none;">
        <td style="border: none;"></td>
        <td style="border: none;">
            Makassar, {{date('d/m/Y', strtotime($smile->ttd_date));}}<br>
            Kepala Bagian Tata Usaha
            <br>
            <img src="{{ asset('vendor/images/media/ttd_amirah.jpeg') }}" alt="" style="width: 200px;">
            <br>
            
            <!-- {{ asset('vendor/js/themeColors.js')}} -->
            Andi Amirah Nilawati, S.Si, Apt, MHSM<br>
            NIP. 197405092000032001
        </td>
    </tr>
</table>
</body>
</html>
