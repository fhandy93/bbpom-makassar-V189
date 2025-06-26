<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Konsumen ULPK</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
        }

        h4, h5 {
            margin: 4px 0;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            border: 1px solid #000;
            padding: 6px;
            vertical-align: top;
        }

        th {
            background-color: #f2f2f2;
        }

        .text-wrap {
            word-wrap: break-word;
            white-space: pre-wrap;
            font-size: 11px;
        }

        @media print {
            body {
                margin: 10mm;
            }

            table {
                page-break-inside: avoid;
            }

            tr {
                page-break-inside: avoid;
                page-break-after: auto;
            }
        }
    </style>
</head>
<body>

    <h4>DATA KONSUMEN ULPK</h4>
    <h4>BALAI BESAR POM DI MAKASSAR</h4>
    <h5>
        Periode: 
        @php
            $bulanMap = [
                '01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April',
                '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus',
                '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
            ];
            echo $bulanMap[substr($bulan, -2)] . ' ' . substr($bulan, 0, 4);
        @endphp
    </h5>

    <table>
        <thead>
            <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Tanggal</th>
                <th rowspan="2">Identitas Konsumen</th>
                <th colspan="2">Tanggapan</th>
                <th rowspan="2">Jenis Komoditi</th>
                <th rowspan="2">Nama Petugas</th>
                <th rowspan="2">Sarana Komunikasi</th>
                <th colspan="2">Rujuk/Tindak Lanjut</th>
            </tr>
            <tr>
                <th>Layanan</th>
                <th>Jawaban</th>
                <th>YA</th>
                <th>TIDAK</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ulpk as $key => $item)
            <tr>
                <td rowspan="9">{{ ++$key }}</td>
                <td rowspan="9">{{ $item->tgl_lapor }}</td>
                <td>Nama: {{ $item->nama }}</td>
                <td  rowspan="9">{!! $item->layanan !!}</td>
                <td  rowspan="9" style="max-width: 1200px; word-wrap: break-word; white-space: pre-wrap;">{!! $item->jawaban !!}</td>
                <td rowspan="9">{{ $item->komoditi }}</td>
                <td rowspan="9">{{ $item->user->name }} @if($item->petugas2_id != null ) / {{ $item->petugas->name }}@endif</td>
                <td rowspan="9">{{ $item->sarana }}</td>
                <td rowspan="9">@if($item->rujuk == 1) YA @else - @endif</td>
                <td rowspan="9">@if($item->rujuk == 0) TIDAK @else - @endif</td>
            </tr>
            <tr><td>Umur: {{ $item->umur }}</td></tr>
            <tr><td>Jenis Kelamin: {{ $item->kelamin }}</td></tr>
            <tr><td>Alamat: {{ $item->alamat }}</td></tr>
            <tr><td>HP: {{ $item->hp }}</td></tr>
            <tr><td>Email: {{ $item->email }}</td></tr>
            <tr><td>Nama Perusahaan: {{ $item->perusahaan }}</td></tr>
            <tr><td>Pekerjaan: {{ $item->pekerjaan }}</td></tr>
            <tr style="page-break-after: always;"><td>Jenis Layanan: {{ $item->jenis }}</td></tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
