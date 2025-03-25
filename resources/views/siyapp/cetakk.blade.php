<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

     <style>
         
         body,
html {
    margin:0;
    padding:0;
    color:#000;

}

#header {
    padding:5px 10px;
 
}
#judul{
    width: 100%;
    height: 70px;
    margin-bottom: 10px;
    border-radius: 5px;
    background-color: #B0E0E6;
}
#wrapper {
    width:760px;
    margin:0 auto;
    background:	#FFE4C4;
}

#main {
    float:left;
    width:490px;
    background:	#FFE4C4;
    padding:10px;
    height: 740px;
}

#sidebar {
    float:right;
    width:230px;
    background:#FFE4C4;
    padding:10px;
    height: 740px;
}

#footer {
    clear:both;
    background:	#FFE4C4;
    padding:5px 10px;
}

#navigation {
    padding:5px 10px;
}

#navigation ul {
    margin:0;
    padding:0;
    list-style:none;
}

#navigation li {
    display:inline;
    margin:0;
    padding:0;
}
.tablelap{
    width: 470px;
    margin-bottom: 20px;
}
.tablelap .ket{
width: 150px;
height: 30px;
}
.tableper{
    width: 470px;
    
}
.tableper .ket{
width: 150px;
height: 30px;
}
.tablehasil{
    width: 500px;
    height: 20px;
    font-size: smaller;
}
.tablehasil .ket{
width: 120px;
}
.kolom{
            width: 90%;
            height: 80px;
            background-color: white;
            border-radius: 5px;
        }
.tablelap .tr{
    height: 500px;
}
    </style>
</head>

<body>
    
<div id="wrapper">
    <div id="header">
        <div id="judul">
                <h4><b><br><u><center>LAPORAN ALAT RUSAK /PERBAIKAN ALAT</br></u></center><center><i>Balai Besar Pengawas Obat Dan Makanan Di Makassar</i></center></h4>
                
        </div>
    </div>
    <div id="navigation">
    POM-12.SOP.01.IK.04(082)/F.01
    </div>
    <div id="main">
                <table class="tablelap">
                        <tr >
                            <td class="ket">Nama User</td>
                            <td style="background-color: white; border-radius: 5px;">:{{$cetak->user->name}}</td>
                        </tr>
                        <tr>
                            <td class="ket">Tanggal Pelaporan</td>
                            <td style="background-color: white;border-radius: 5px;">:{{$cetak->tanggal_lapor}}</td>
                        </tr>
                        <tr>
                            <td class="ket">Nama Barang</td>
                            <td style="background-color: white;border-radius: 5px;">:{{$cetak->nama_barang}}</td>
                        </tr>
                        <tr>
                            <td class="ket">Merek</td>
                            <td style="background-color: white;border-radius: 5px;">:{{$cetak->merek}}</td>
                        </tr>
                        <tr>
                            <td class="ket">Type</td>
                            <td style="background-color: white;border-radius: 5px;">:{{$cetak->type}}</td>
                        </tr>
                        <tr>
                            <td class="ket">Nomor NUP</td>
                            <td style="background-color: white;border-radius: 5px;">:{{$cetak->nup}}</td>
                        </tr>
                        <tr>
                            <td class="ket">Tahun</td>
                            <td style="background-color: white;border-radius: 5px;">:{{$cetak->tahun}}</td>
                        </tr>
                        <tr>
                            <td class="ket">Bidang/Seksi</td>
                            <td style="background-color: white; border-radius: 5px;">:{{$cetak->bidang}}</td>
                        </tr>
                    </table>
                    <table class="tableper"> <tr>
                            <td class="ket">Tindakan Awal</td>
                            <td style="background-color: white;border-radius: 5px;">:{{$cetak->tindak_awal}}</td>
                        </tr>
                    </table>
                    <table class="tablehasil" style="margin-top: 20px;"> 
                        <tr>
                            <td class="ket">Hasil</td>
                            <td style="background-color: white; width: 20px; border-radius: 5px;"></td>
                            <td style="border-bottom: 0;">&nbsp;Dapat Diperbaiki&nbsp;</td>
                            <td style="background-color: white; width: 20px;border-radius: 5px;"></td>
                            <td style="border-bottom: 0;">&nbsp;Perlu Perbaikan&nbsp;</td>
                            <td style="background-color: white; width: 20px;border-radius: 5px;"></td>
                            <td style="border-bottom: 0;">&nbsp;Rusak Berat&nbsp;</td>
                        </tr>
                    </table><br>
                    <table class="tableper"> <tr>
                            <td class="ket">Tindak Lanjut</td>
                            <td style="background-color: white;border-radius: 5px;">:{{$cetak->tindak_lanjut}}</td>
                        </tr>
                    </table>
                    <table class="tablehasil" style="height: 20px; margin-top: 20px; "> 
                        <tr >
                            <td class="ket">Hasil</td>
                            <td style="background-color: white; width: 20px;border-radius: 5px;"></td>
                            <td style="border-bottom: 0;">&nbsp;Dapat Diperbaiki&nbsp;</td>
                            <td style="background-color: white; width: 20px;border-radius: 5px;"></td>
                            <td style="border-bottom: 0;">&nbsp;Perlu Perbaikan&nbsp;</td>
                            <td style="background-color: white; width: 20px;border-radius: 5px;"></td>
                            <td style="border-bottom: 0;">&nbsp;Rusak Berat&nbsp;</td>
                        </tr>
                    </table><br>
                    <table class="tableper"> 
                        <tr>
                            <td class="ket">Uji Fungsi</td>
                            <td style="background-color: white;border-radius: 5px;">:{{$cetak->uji}}</td>
                        </tr>
                    </table>
                    <table class="tablehasil" style="height: 20px;border-radius: 5px; margin-top: 20px;"> 
                        <tr >
                            <td class="ket">Hasil</td>
                            <td style="background-color: white; width: 20px;border-radius: 5px;"></td>
                            <td style="border-bottom: 0;">&nbsp;Dapat Diperbaiki&nbsp;</td>
                            <td style="background-color: white; width: 20px;border-radius: 5px;"></td>
                            <td style="border-bottom: 0;">&nbsp;Perlu Perbaikan&nbsp;</td>
                            <td style="background-color: white; width: 20px;border-radius: 5px;"></td>
                            <td style="border-bottom: 0;">&nbsp;Rusak Berat&nbsp;</td>
                        </tr>
                    </table><br>
                    <div>
                    <div class="kolom">&nbsp;&nbsp;Catatan:{{$cetak->ket}}</div>
                   </div>
                    </div>
                        <div id="sidebar">
                        <div >
                    <table class="kolom">
                        <tr style="margin-top: 20px;">
                            <td>&nbsp;&nbsp;Sifat Laporan:</td>
                        </tr>
                        <tr>
                            <td style="background-color: wheat;"> &nbsp;&nbsp;{{$cetak->sifat}}</td>
                        </tr>
                    </table>
                   </div>
                   <div style="margin-top: 10px;">
                    <table class="kolom">
                        <tr style="margin-top: 20px;">
                            <td>&nbsp;&nbsp;Jenis Kerusakan:</td>
                        </tr>
                        <tr>
                            <td style="background-color: wheat;"> &nbsp;{{$cetak->jenis}}</td>
                        </tr>
                    </table>
                   </div>
                   <div style="margin-top: 10px;">
                    <div class="kolom">&nbsp;&nbsp;User/Penanggung Jawab Alat:</div>
                   </div>
                  
                   <div style="margin-top: 10px;">
                    <div class="kolom">&nbsp;&nbsp;PPK:</div>
                   </div>
                   
                   <div style="margin-top: 10px; margin-bottom: 3px;">
                    <div class="kolom">&nbsp;&nbsp;Bagian Perlengkapan:</div>
                   </div>
                </div>
    </div>
    
</body>

</html>


























