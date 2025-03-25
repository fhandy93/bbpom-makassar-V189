<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sash – Bootstrap 5  Admin & Dashboard Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
        content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('vendor/images/brand/favicon.ico') }}" />

    <!-- TITLE -->
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('vendor/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="{{ asset('vendor/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/css/dark-style.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/css/transparent-style.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/css/skin-modes.css') }}" rel="stylesheet" />

    <!-- CSS VALIDATE   -->
    <link href="{{ asset('vendor/css/validate.css') }}" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="{{ asset('vendor/css/icons.css') }}" rel="stylesheet" />

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{ asset('vendor/colors/color1.css') }}" />
    <style>
        .laporan{
            background-color: pink;
            margin-top: 10px;
        }
        .header{
            border-color: red;
            margin: 10px;
            background-color: yellow;
        }
        .table{
            margin-left: 10px;
        }
        .table2{
            margin-left: 10px;
        }
        .ket{
            width: 150px;
            border-bottom: 0;
            margin-bottom: 2px;
        }
        .kolom{
            width: 90%;
            height: 80px;
            background-color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="laporan">
            <div class="row">
                <div class="col-md-12">
                    <div class="header text-center">
                        <h4><b>Laporan Alat Rusak /Perbaikan Alat</b></h4>
                    </div>
                </div>     
            </div>
            <div class="row">
                <div class="col-md-8">
                    <table class="table">
                        <tr>
                            <td class="ket">Nama User</td>
                            <td style="background-color: white;">:fasf</td>
                        </tr>
                        <tr>
                            <td class="ket">Tanggal Pelaporan</td>
                            <td style="background-color: white;">:fasf</td>
                        </tr>
                        <tr>
                            <td class="ket">Nama Barang</td>
                            <td style="background-color: white;">:fasf</td>
                        </tr>
                        <tr>
                            <td class="ket">Merek</td>
                            <td style="background-color: white;">:fasf</td>
                        </tr>
                        <tr>
                            <td class="ket">Type</td>
                            <td style="background-color: white;">:fasf</td>
                        </tr>
                        <tr>
                            <td class="ket">Nomor NUP</td>
                            <td style="background-color: white;">:fasf</td>
                        </tr>
                        <tr>
                            <td class="ket">Tahun</td>
                            <td style="background-color: white;">:fasf</td>
                        </tr>
                        <tr>
                            <td class="ket">Bidang/Sekse</td>
                            <td style="background-color: white;">:fasf</td>
                        </tr>
                       
                    </table>
                    <table class="table"> <tr>
                            <td class="ket">Tindakan Awal</td>
                            <td style="background-color: white;">:fasf</td>
                        </tr>
                    </table>
                    <table class="table2" style="height: 20px; margin-left: 20px;"> 
                        <tr style="line-height: 25px; min-height: 25px; height: 25px;">
                            <td class="ket">Hasil</td>
                            <td style="background-color: white; width: 20px;"></td>
                            <td style="border-bottom: 0;">&nbsp;Dapat Diperbaiki&nbsp;</td>
                            <td style="background-color: white; width: 20px;"></td>
                            <td style="border-bottom: 0;">&nbsp;Perlu Perbaikan&nbsp;</td>
                            <td style="background-color: white; width: 20px;"></td>
                            <td style="border-bottom: 0;">&nbsp;Rusak Berat&nbsp;</td>
                        </tr>
                    </table><br>
                    <table class="table"> <tr>
                            <td class="ket">Tindak Lanjut</td>
                            <td style="background-color: white;">:fasf</td>
                        </tr>
                    </table>
                    <table class="table2" style="height: 20px; margin-left: 20px;"> 
                        <tr style="line-height: 25px; min-height: 25px; height: 25px;">
                            <td class="ket">Hasil</td>
                            <td style="background-color: white; width: 20px;"></td>
                            <td style="border-bottom: 0;">&nbsp;Dapat Diperbaiki&nbsp;</td>
                            <td style="background-color: white; width: 20px;"></td>
                            <td style="border-bottom: 0;">&nbsp;Perlu Perbaikan&nbsp;</td>
                            <td style="background-color: white; width: 20px;"></td>
                            <td style="border-bottom: 0;">&nbsp;Rusak Berat&nbsp;</td>
                        </tr>
                    </table><br>
                    <table class="table"> <tr>
                            <td class="ket">Uji Fungsi</td>
                            <td style="background-color: white;">:fasf</td>
                        </tr>
                    </table>
                    <table class="table2" style="height: 20px; margin-left: 20px;"> 
                        <tr style="line-height: 25px; min-height: 25px; height: 25px;">
                            <td class="ket"></td>
                            <td style="background-color: white; width: 20px;"></td>
                            <td style="border-bottom: 0;">&nbsp;Dapat Diperbaiki&nbsp;</td>
                            <td style="background-color: white; width: 20px;"></td>
                            <td style="border-bottom: 0;">&nbsp;Perlu Perbaikan&nbsp;</td>
                            <td style="background-color: white; width: 20px;"></td>
                            <td style="border-bottom: 0;">&nbsp;Rusak Berat&nbsp;</td>
                        </tr>
                    </table><br>
                </div>
                <div class="col-md-4">
                   <div >
                    <table class="kolom">
                        <tr style="margin-top: 20px;">
                            <td>&nbsp;&nbsp;Sifat Laporan:</td>
                        </tr>
                        <tr>
                            <td style="background-color: wheat;"> &nbsp;&nbsp;Segera</td>
                        </tr>
                    </table>
                   </div>
                   <div style="margin-top: 10px;">
                    <table class="kolom">
                        <tr style="margin-top: 20px;">
                            <td>&nbsp;&nbsp;Jenis Kerusakan:</td>
                        </tr>
                        <tr>
                            <td style="background-color: wheat;"> &nbsp;&nbsp;mau di install ulang karna bios muncul terus karna bios muncul teruskarna bios muncul teruskarna bios muncul terus</td>
                        </tr>
                    </table>
                   </div>
                   <div style="margin-top: 10px;">
                    <div class="kolom">Penanggung Jawab Alat:</div>
                   </div>
                   <div style="margin-top: 10px;">
                    <div class="kolom">Atasan:</div>
                   </div>
                   <div style="margin-top: 10px;">
                    <div class="kolom">PPK:</div>
                   </div>
                   <div style="margin-top: 10px;">
                    <div class="kolom">Sub. Kordinator KS. Umum:</div>
                   </div>
                   <div style="margin-top: 10px;">
                    <div class="kolom">Bagian Perlengkapan:</div>
                   </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-9">
                <div style="margin: 10px;">
                    <div class="kolom">Catatan:</div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>


























