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
#header {
    padding:5px 10px;
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
    <div id="header">
        <center>
        
        <table id="table1" style="width: 600px; border: 1px solid;" >
            <tr>
                <td rowspan="6"><img src="{{ asset('vendor/images/brand/logo-2.png')}}" width="100px;"></td>
                <td>Nomor Dokumen</td>
                <td>POM.06.SOP.04.IK.02(105)/F-O8</td>
            </tr>
            <tr>
                <td>Nama Dokumen</td>
                <td>Formulir Rujukan</td>
            </tr>
            <tr>
                <td>Unit Kerja</td>
                <td>Balai Besar POM di Makassar</td>
            </tr>
            <tr>
                <td>Nomor/Tgl Revisi</td>
                <td>-/-</td>
            </tr>
            <tr>
                <td>Tanggal Efektif</td>
                <td>10-10-2011</td>
            </tr>
            <tr>
                <td>Halaman</td>
                <td>__dari__hal</td>
            </tr>
        </table><br>
        </center>

    <b>FORMULIR RUJUKAN</b>
    <hr class="new1">
    <table id="table2">
        <tr>
            <td>Tanggal Terima</td>
            <td>: {{ $rujuk->created_at->isoFormat('D MMMM Y')}}</td>
        </tr>
        <tr>
            <td>Nomor Form</td>
            <td>: {{$rujuk->id}}</td>
        </tr>
    </table>
    <hr class="new1">
    <b><u>IDENTITAS PELAPOR</u></b><p>
    <table id="table2">
        <tr>
            <td>Nama</td>
            <td>: {{$rujuk->nama}}</td>
        </tr>
        <tr>
            <td>Tempat/Tanggal Lahir</td>
            <td>: {{$rujuk->ttl}}</td>
        </tr>
        <tr>
            <td>Umur</td>
            <td>: {{$rujuk->umur}}</td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>: {{$rujuk->kelamin}}</td>
        </tr>
        <tr>
            <td>Agama</td>
            <td>: {{$rujuk->agama}}</td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td>: {{$rujuk->pekerjaan}}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>: {{$rujuk->alamat}}</td>
        </tr>
        <tr>
            <td>No. Telp.</td>
            <td>: {{$rujuk->hp}}</td>
        </tr>
        <tr>
            <td>No. Fax</td>
            <td>: {{$rujuk->fax}}</td>
        </tr>
        <tr>
            <td>Alamat Email</td>
            <td>: {{$rujuk->email}}</td>
        </tr>
    </table>
    <hr class="new1">
    <b><u>IDENTITAS KASUS/MASALAH</u></b><p>
    <table id="table2">
        <tr>
            <td>Jenis Pengaduan</td>
            <td>: {{$rujuk->pengaduan}}</td>
        </tr>
        <tr>
            <td>Nama Produk</td>
            <td>: {{$rujuk->produk}}</td>
        </tr>
        <tr>
            <td>Nomor Registrasi</td>
            <td>: {{$rujuk->regis}}</td>
        </tr>
        <tr>
            <td>No. Batch</td>
            <td>: {{$rujuk->batch}}</td>
        </tr>
        <tr>
            <td>Kadaluarsa</td>
            <td>: {{$rujuk->kadaluarsa}}</td>
        </tr>
        <tr>
            <td>Nama Pabrik</td>
            <td>: {{$rujuk->pabrik}}</td>
        </tr>
        <tr>
            <td>Nama Korban</td>
            <td>: {{$rujuk->nama_kor}}</td>
        </tr>
        <tr>
            <td>Alamat Korban</td>
            <td>: {{$rujuk->alm_kor}}</td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>: {{$rujuk->kelamin_kor}}</td>
        </tr>
    </table>
    <hr class="new1">
    <b><u>URAIAN MASALAH</u></b>(Waktu kejadian, Tempat kejadian, Apa yang terjadi, Modus, Operandi, Saksi)<p>
    {!! $rujuk->desc !!}<p >
   <div style="margin-bottom: 70px;"></div>
  
    <b ><u>TINDAK LANJUT :</u></b> : 
                                    @if($rujuk->tindak=="4")
                                    Dirujuk ke Kelompok substansi penindakan 
                                    @elseif($rujuk->tindak=="5")
                                    Dirujuk ke Kelompok Substansi Pemeriksaan
                                    @elseif($rujuk->tindak=="6")
                                    Dirujuk ke Kelompok Substansi Pengujian
                                    @elseif($rujuk->tindak=="3")
                                    Diselesaikan di Kelompok Substansi Infokom
                                    @endif

    <hr class="new1">
    <table id="table2" style="text-align: center;">
        <tr>
            <td>Yang Menerima</td>
            <td>Yang Menyerahkan</td>
        </tr>
       
    </table>
    <table id="table2" style="margin-top: 40px;text-align: center;">
      
        <tr>
            <td>@if(isset($trans->user->name)){{$trans->user->name}}@else-@endif</td>
            <td>{{$rujuk->user->name}}</td>
        </tr>
    </table>
    <div class="page_break"></div>
    <table id="table1" style="width: 600px; border: 1px solid;margin-top: 50px;" >
            <tr>
                <td rowspan="6"><img src="{{ asset('vendor/images/brand/logo-2.png')}}" width="100px;"></td>
                <td>Nomor Dokumen</td>
                <td>POM.06.SOP.04.IK.02(105)/F-O8</td>
            </tr>
            <tr>
                <td>Nama Dokumen</td>
                <td>Formulir Rujukan</td>
            </tr>
            <tr>
                <td>Unit Kerja</td>
                <td>Balai Besar POM di Makassar</td>
            </tr>
            <tr>
                <td>Nomor/Tgl Revisi</td>
                <td>-/-</td>
            </tr>
            <tr>
                <td>Tanggal Efektif</td>
                <td>10-10-2011</td>
            </tr>
            <tr>
                <td>Halaman</td>
                <td>__dari__hal</td>
            </tr>
        </table><br>
        <table id="table2">
        <tr>
            <td style="width: 200px;">Tanggal Pengiriman</td>
            <td style="width: 3px;">:</td>
            <td  style="width: 350px;"> @if(isset($trans->created_at)) {{ $trans->created_at->isoFormat('D MMMM Y')}} @else - @endif</td>
        </tr>
        <tr>
            <td style="width: 200px;">Jam</td>
            <td style="width: 3px;">:</td>
            <td  style="width: 350px;">@if(isset($trans->created_at)){{substr($trans->created_at, -8, 5)}}  WITA @endif</td>
        </tr>
        <tr>
            <td style="width: 200px;">Tujuan</td>
            <td style="width: 3px;">:</td>
            <td  style="width: 350px;"> {{$rujuk->tujuan}}</td>
        </tr>
        <tr>
            <td style="width: 200px;">Hal</td>
            <td style="width: 3px;">:</td>
            <td style="width: 350px;"> {{$rujuk->hal}}</td>
        </tr>
        <tr>
            <td style="width: 200px;">Keterangan</td>
            <td style="width: 3px;">:</td>
            <td style="width: 350px;"> {{$rujuk->ket}}</td>
        </tr>
       
    </table>
    <table id="table2" style="margin-top: 50px;">
        <tr>
            <td style="width: 200px;">Nama Konsumen</td>
            <td style="width: 3px;">:</td>
            <td  style="width: 350px;">{{$rujuk->nama}}</td>
        </tr>
        <tr>
            <td style="width: 200px;">Tanggal Pengaduan</td>
            <td style="width: 3px;">:</td>
            <td  style="width: 350px;">{{ $rujuk->tgl_terima }}</td>
        </tr>
        <tr>
            <td style="width: 200px;">Tanggal Kembali</td>
            <td style="width: 3px;">:</td>
            <td  style="width: 350px;">@if(isset($trans->tgl_kembali)) 
                                            @if($trans->tgl_kembali != "1111-11-11")
                                            {{ date('d/m/Y',strtotime($trans->tgl_kembali))}}
                                            @else
                                            -
                                            @endif
                                        @endif
            </td>
        </tr>
       
    </table>
    <center><h4>MOHON UNTUK DITINDAK LANJUTI</h4></center> 
    <table id="table2" style="text-align: center;">
        <tr>
            <td>Mengetahui<p>Ketua Tim Pelayanan Publik</td>
            <td>Petugas Infokom</td>
        </tr>
       
    </table>
    <table id="table2" style="margin-top: 40px;text-align: center;">
      
        <tr>
            <td>Ahmad Lalo, S.Si, Apt, M.Si</td>
            <td>{{$rujuk->user->name}}</td>
        </tr>
    </table>
    </div>
    <hr class="new1">
    <center><b>FORMULIR HASIL RUJUKAN</b></center><p>
    Jawaban: <p>
    @if(isset($trans->desc)) {!! $trans-> desc!!} @endif
   
    <table id="table2" style="text-align: center;">
        <tr>
            <td></td>
            <td></td>
        </tr>
       
    </table>
    <table id="table2" style="margin-top: 80px;text-align: left;">
      
        <tr>
            <td></td>
            <td>Makassar
                        @if(isset($trans->tgl_kembali))
                            @if($trans->tgl_kembali != "1111-11-11")
                                {{ date('d/m/Y',strtotime($trans->tgl_kembali))}}
                            @endif    
                        @else
                        -
                        @endif
            <p>@if($rujuk->tindak == 4)
                Kepala Bidang Penindakan
                @elseif($rujuk->tindak == 5)
                Kepala Bidang Pemeriksaan
                @elseif($rujuk->tindak == 6)
                Kepala Bidang Pengujian
                 @elseif($rujuk->tindak == 3)
                Ketua Tim Pelayanan Publik
                @endif
            </td>
        </tr>
    </table>
    <table id="table2" style="margin-top: 80px;text-align: left;">
      
      <tr>
          <td></td>
          <td>@if($rujuk->tindak == 4)
              SRIYANI RASYID, S.Si Apt
              @elseif($rujuk->tindak == 5)
              Drs. Hamka Hasan Apt MKes
              @elseif($rujuk->tindak == 6)
              Dra. Ina Tanujaya M.Sc, APT
              @elseif($rujuk->tindak == 3)
              Ahmad Lalo, S.Si, Apt, M.Si
              @endif
          </td>
      </tr>
  </table>
</body>

</html>



















