<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

     <style>
         
         body,
html {
    margin:0;
    padding:0;
    color:#000;

}
.header {
    margin-top: 60px;
    margin-bottom: 60px;
}
#wrapper {
    width:630px;
    margin:0 auto;
    margin-top: 40px;

}
#gambar{
    margin-top: 40px;
    margin-left: 70px;
    margin-bottom: 20px;

}

hr.new1 {
  border-top: 1px solid blue;
}
#table1 th, td {
         border: 1px solid;
         margin-top: 50px;
        }
        
#table2 th, td {
         border: 0px solid;
        }
#table2 td {
        width: 300px;
        }
.page_break { page-break-before: always; }
    </style>
</head>

<body>
<div id="wrapper">
    <div class="header">
    <center>
    SURAT KETERANGAN
    <br>Nomor:................................
    </center>
    </div>
    <p>Yang bertanda tangan dibawah ini:</p>
    <table >
    <tr>
        <td style="width:100px ;">Nama</td>
        <td>: 
            @if($data->bidang == 3 )
            Kamaruddin, SE
            @elseif ($data->bidang == 5 )
            Dra. Adilah Pababbari, Apt
            @elseif ($data->bidang == 7 )
            Dra. Sriyani Rasyid, Apt
            @elseif ($data->bidang == 8 )
            Drs. Hamka Hasan, Apt, M.Kes
            @elseif ($data->bidang == 9 )
            Dra. Ina Tanujaya, Apt
            @elseif ($data->bidang == 10 )
            Tri Astuty, ST
            @elseif ($data->bidang == 15 )
            Andi Amirah Nilawati, S.Si, Apt, M.HSM
            @endif
        </td>
    </tr>
    <tr>
        <td style="width:100px ;">Nip</td>
        <td>:
        @if($data->bidang == 3 )
            197412121998031003
            @elseif ($data->bidang == 5 )
            196209281989032001
            @elseif ($data->bidang == 7 )
            196710051998032001
            @elseif ($data->bidang == 8 )
            196705091993021001
            @elseif ($data->bidang == 9 )
            196810271998032001
            @elseif ($data->bidang == 10 )
            198008142005012002
            @elseif ($data->bidang == 15 )
            197405092000032001
            @endif
            
        </td>
    </tr>
    <tr>
        <td style="width:100px ;">Jabatan</td>
        <td>: 
            @if($data->bidang == 3 )
            Analis Kepegawaian Muda
            @elseif ($data->bidang == 5 )
            Pengawas Farmasi dan Makanan Ahli Madya
            @elseif ($data->bidang == 7 )
            Pengawas Farmasi Dan Makanan Ahli Madya
            @elseif ($data->bidang == 8 )
            Pengawas Farmasi Dan Makanan Ahli Madya
            @elseif ($data->bidang == 9 )
            Pengawas Farmasi dan Makanan Ahli Madya
            @elseif ($data->bidang == 10 )
            Analis Layanan Umum
            @elseif ($data->bidang == 15 )
            Kepala Bagian Tata Usaha pada Balai Besar POM di Makassar
            @endif
        </td>
    </tr>
    
    </table>
    <p>Dengan ini menerangkan bahwa:</p>
    <table >
    <tr>
        <td style="width:100px ;">Nama</td>
        <td>: {{$data->user->name}}</td>
    </tr>
    <tr>
        <td style="width:100px ;">Nip</td>
        <td>: {{$izin->nip}}</td>
    </tr>
    <tr>
        <td style="width:100px ;">Jabatan</td>
        <td>: {{$izin->jabatan}}</td>
    </tr>
    
    </table>
    <p>
    Pada Hari <b>{{Carbon\Carbon::parse($data->tgl_izin)->isoFormat('dddd') }}</b> tanggal <b>{{Carbon\Carbon::parse($data->tgl_izin)->isoFormat('D MMMM Y')}}</b> Antara jam <b>{{$data->jam}}</b> Diberikan izin keluar kantor 
    pada saat jam kerja karena keperluan penting dan mendesak, yaitu <b>{{$data->keperluan}}</b> 
    <p>Surat Keterangan ini dibuat dengan penuh tanggung jawab untuk dipergunakan sebagaimana mestinya.</p>
    <table id="table2" style="text-align: center; margin-top: 60px;margin-bottom: 60px;">
        <tr>
            <td></td>
            <td>Makassar, {{Carbon\Carbon::parse($data->tgl_izin)->isoFormat('D MMMM Y')}}</td>
        </tr>
       
    </table>
    <table id="table2" style="margin-top: 40px;text-align: center;">
      
        <tr>
            <td></td>
            <td>{{$data->pemberi}}</td>
        </tr>
    </table>
   
</div>
</body>

</html>



















