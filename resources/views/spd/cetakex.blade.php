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
   margin-top: -20px;
   text-align: center;
}
#wrapper {
    width:690px;
    margin:0 auto;
    margin-top: 40px;
    margin-left: 55px;

}
#gambar{
    margin-top: 40px;
    margin-left: 70px;
    margin-bottom: 20px;

}

hr.new1 {
  border-top: 1px solid blue;
}
#table1 td{
         font-size: 13px;
         font-weight: bold;
         border: 0px solid;
        }
        
/* #table2 th, td {
    border-collapse: collapse;
         border: 1px solid;
        } */
#table2, td, th {
  border: 1px solid;
}

#table2 {
    font-size: 14px;
  width: 100%;
  border-collapse: collapse;
}

#table3 td{
         border: 0px solid;
        }
#table4, td, th {
  border: 1px solid;
}

#table4 {
    font-size: 14px;
  width: 100%;
  border-collapse: collapse;
}
.page_break { page-break-before: always; }
    </style>
</head>

<body>
<div id="wrapper">
    
        <center>
        
        <table id="table1" style="width: 700px; " >
            <tr>
               
                <td>BADAN PENGAWAS OBAT DAN MAKANAN</td>
                <td>Lembaran Ke</td>
                <td>:</td>
            </tr>
            <tr>
                <td>BALAI BESAR PENGAWAS OBAT DAN MAKANAN DI MAKASSAR</td>
                <td>Kode No.</td>
                <td>:</td>
            </tr>
            <tr>
                <td>Jln. Baji Minasa No.2 Makassar</td>
                <td>Nomor SPPD</td>
                <td>: {{$data->no_sppd}}</td>
            </tr>
            
        </table><br>
        </center>
        <div id="header">
            <h2><b>SURAT PERINTAH PERJALANAN DINAS (SPPD) </b></h2>
        </div>
        <table id="table2" style="width: 700px; " >
            <tr>
                <td style="width: 20px; text-align: center;">1</td>
                <td style="width: 310px;"><div style="margin-left: 25px; padding: 5px;">Pejabat Pembuat Komitmen</div></td>
                <td colspan="2"><div style="margin-left: 5px; padding: 4px; line-height: 2;">: Balai Besar POM di Makassar</td>
            </tr>
            <tr>
                <td style="width: 20px; text-align: center;">2</td>
                <td style="width: 290px;"><div style="margin-left: 25px; padding: 5px; line-height: 2;">Nama/NIP Pegawai yang Melaksanakan<br> Perjalanan Dinas</div></td>
                <td colspan="2"><div style="margin-left: 5px; padding: 4px; line-height: 2;">: {{$data->user_data}}<br>: {{$data->nip}}</div></td>
            </tr>
            <tr>
                <td style="width: 20px; text-align: center;">3</td>
                <td style="width: 290px;"><div style="margin-left: 10px; padding: 5px; line-height: 2;">a. Pangkat dan Golongan<br>b. Jabatan/Instansi<br>c. Tingkat Biaya Perjalanan Dinas</div></td>
                <td colspan="2"><div style="margin-left: 5px; padding: 4px; line-height: 2;">a. {{$data->pangkat}}<br>b. {{$data->jabatan}}<br>c. @if($data->level_biaya == 1) A @elseif($data->level_biaya == 2) B @elseif($data->level_biaya == 3) C @endif
            </tr>
            <tr>
                <td style="width: 20px; text-align: center;">4</td>
                <td style="width: 290px;"><div style="margin-left: 25px; padding: 5px; line-height: 2;">Maksud Perjalanan Dinas</div></td>
                <td colspan="2"><div style="margin-left: 5px; padding: 4px; line-height: 1.5;">{{$data->maksud}}</div></td>
            </tr>
            <tr>
                <td style="width: 20px; text-align: center;">5</td>
                <td style="width: 290px;"><div style="margin-left: 25px; padding: 5px; line-height: 2;">Alat Angkutan yang Dipergunakan</div></td>
                <td colspan="2"><div style="margin-left: 5px; padding: 4px; line-height: 1.5;">: {{$data->transport}}</div></td>
            </tr>
            <tr>
                <td style="width: 20px; text-align: center;">6</td>
                <td style="width: 290px;"><div style="margin-left: 10px; padding: 5px; line-height: 2;">a. Tempat Berangkat<br>b. Tempat Tujuan</div></td>
                <td colspan="2"><div style="margin-left: 5px; padding: 4px; line-height: 2;">a. {{$data->asal}}<br>b. {{$data->tujuan}}</div></td>
            </tr>
             <tr>
                <td style="width: 20px; text-align: center;">7</td>
                <td style="width: 290px;"><div style="margin-left: 10px; padding: 5px; line-height: 2;">a. Lamanya Perjalanan Dinas<br>b. Tanggal Berangkat<br>c. Tanggal Harus Kembali/Tiba di Tempat Baru *)</div></td>
                <td colspan="2"><div style="margin-left: 5px; padding: 4px; line-height: 2;">a. {{$data->hari}} ({{convertNumberToWordsIndo($data->hari)}}) Hari <br>b. {{ $data->tgl_berangkat->isoFormat('D MMMM Y')}} <br>c. 
                @if(isset($data->tgl_berangkat4))
                    {{ $data->tgl_kembali4->isoFormat('D MMMM Y')}}
                @elseif(isset($data->tgl_kembali3))
                    {{ $data->tgl_kembali3->isoFormat('D MMMM Y')}}
                @elseif(isset($data->tgl_kembali2))
                    {{ $data->tgl_kembali2->isoFormat('D MMMM Y')}}
                @else
                    {{ $data->tgl_kembali->isoFormat('D MMMM Y')}}
                @endif
                </div></td>
            </tr>
            <tr>
                <td style="width: 20px; text-align: center;">8</td>
                <td style="width: 290px;"><div style="margin-left: 10px;  ">Pengikut  :&nbsp;&nbsp;&nbsp; Nama</div></td>
                <td><div style="text-align: center;">Tanggal Lahir</div></td>
                <td><div style="text-align: center;">Keterangan</div></td>
            </tr>
            <tr>
                <td style="width: 20px; text-align: center;"></td>
                <td style="width: 290px;"><div style="margin-left: 10px; padding: 5px; line-height: 1;">
                    1.@if(isset($ikut->nama1)){{$ikut->nama1}} @endif<br>
                    2. @if(isset($ikut->nama2)){{$ikut->nama2}}@endif<br>
                    3. @if(isset($ikut->nama3)){{$ikut->nama3}}@endif<br>
                    4. @if(isset($ikut->nama4)){{$ikut->nama4}}@endif<br>
                    5. @if(isset($ikut->nama5)){{$ikut->nama5}}@endif</div>
                </td>
                <td style="vertical-align: text-top;"><div style="margin-left: 10px; padding: 5px; line-height: 1;">
                    @if(isset($ikut->tgl1)){{$ikut->tgl1}}@endif<br>
                    @if(isset($ikut->tgl2)){{$ikut->tgl2}}@endif<br>
                    @if(isset($ikut->tgl3)){{$ikut->tgl3}}@endif<br>
                    @if(isset($ikut->tgl4)){{$ikut->tgl4}}@endif<br>
                    @if(isset($ikut->tgl5)){{$ikut->tgl5}}@endif</div>
                </td>
                <td style="vertical-align: text-top;"><div style="margin-left: 10px; padding: 5px; line-height: 1;">
                    @if(isset($ikut->ket1)){{$ikut->ket1}}@endif<br>
                    @if(isset($ikut->ket2)){{$ikut->ket2}}@endif<br>
                    @if(isset($ikut->ket3)){{$ikut->ket3}}@endif<br>
                    @if(isset($ikut->ket4)){{$ikut->ket4}}@endif<br>
                    @if(isset($ikut->ket5)){{$ikut->ket5}}@endif</div>
                </td>
            </tr>
            <tr>
                <td style="border-bottom-style: none;"></td>
                <td style="border-bottom-style: none;line-height: 1.5;"> &nbsp;&nbsp;&nbsp;Pembebanan Anggaran</td>
                <td style="border-bottom-style: none;" colspan="2"></td>
            </tr>
            <tr>
                <td style="width: 20px; text-align: center; border-top-style: none;">9</td>
                <td style="width: 290px;border-top-style: none;"><div style="margin-left: 10px; padding: 5px; line-height: 1.5;">a. Instansi<br>b. Akun</div></td>
                <td style="border-top-style: none;" colspan="2"><div style="margin-left: 5px; padding: 4px; line-height: 1.5;">: {{$data->instansi}}<br>: {{$data->akun}}</div></td>
            </tr>
            <tr>
                <td style="width: 20px; text-align: center;">10</td>
                <td style="width: 290px;"><div style="margin-left: 10px;line-height: 2;  ">Keterangan Lain-lain</div></td>
                <td style="border-right-style: none;"><div style="text-align: left;margin-left:10px;">: {{$data->keterangan}}</div></td>
                <td style="border-left-style: none;"><div style="text-align: left;">Tanggal @if(isset($data->tgl_st)){{ $data->tgl_st->isoFormat('D MMMM Y')}}@endif</div></td>
            </tr>
        </table>
        <p>
        <table id="table3" style="width: 700px; ">
            <tr >
                <td style="width: 300px;"></td>
                <td >
                    Dikeluarkan di   
                    <br>
                    Tanggal           
                </td>
                <td>: Makassar<br>
                    : {{ $data->tgl->isoFormat('D MMMM Y')}}
                </td>
            </tr>
            <tr>
                <td style="width: 300px;"></td>
                <td colspan="2" style="border-top-style: dotted; border-top: 2px solid;">
                        <div style="font-weight: bold;margin-top: 20px;text-align: center;">
                        Pejabat Pembuat Komitmen, 
                        <br>
                        <br>
                        <br>
                        <br><u>
                         @if($data->ppk == 1)
                        Tri Astuty, ST
                        @elseif($data->ppk == 2)
                        Hamdana, S.Si
                        @elseif($data->ppk == 3)
                        Yayu Sulistia, S.Si., Apt.
                        @elseif($data->ppk == 4)
                        Siti Nurazika Arifin, SE
                        @endif
                        </u>
                        <br>
                        @if($data->ppk == 1)
                        NIP.19800814200501 2 002
                        @elseif($data->ppk == 2)
                        NIP.19800725200003 2 001
                        @elseif($data->ppk == 3)
                        NIP.19781217 200312 2 001
                        @elseif($data->ppk == 4)
                        NIP.19970908 202012 2 002
                        @endif
                        </div>
                </td>
            </tr>
        </table>
        <div class="page_break"></div>
        <table id="table4" style="margin-top: 50px; width: 700px;" >
            <tr >
                <td rowspan="2" style="width: 10px;border-right-style:none"></td>
                <td rowspan="2" style="width: 140px;border-left-style: none;border-right-style: none;"></td>
                <td rowspan="2" style="width: 140px;border-left-style: none;"></td>
                <td style="width: 10px;text-align: center;border-right-style: none;vertical-align: text-top; border-bottom-style: none;">
                    I. 
                </td>
                <td style="width: 155px;border-left-style: none; border-right-style: none;border-bottom-style: none;" >
                    &nbsp;&nbsp;&nbsp;Berangkat dari<br>
                    &nbsp;&nbsp;&nbsp;(Tempat Kedudukan)<br>                    
                    &nbsp;&nbsp;&nbsp;Ke<br>
                    &nbsp;&nbsp;&nbsp;Pada Tanggal
                </td>
                <td style="width: 235px;border-left-style: none;border-bottom-style: none;" >
                    : {{$data->asal}} <br><br>
                    : {{$data->tujuan}}<br>
                    : {{ $data->tgl_berangkat->isoFormat('D MMMM Y')}}<br>
                </td>
            </tr>
            <tr>
                
                
                <td colspan="3" style="border-top-style: none;">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    @if($data->mengetahui==1)
                        Kepala Bagian Tata Usaha    
                    @elseif($data->mengetahui==2)
                        Ketua TIM SAKIP, IKPA
                    @elseif($data->mengetahui==3)
                        Ketua TIM IT
                    @elseif($data->mengetahui==4)
                        Ketua TIM Inspeksi Kedeputian II
                    @elseif($data->mengetahui==5)
                        Ketua TIM Inspeksi Kedeputian I
                    @elseif($data->mengetahui==6)
                        Ketua TIM Inspeksi Kedeputian III
                    @elseif($data->mengetahui==7)
                        Ketua TIM Sertifikasi
                    @elseif($data->mengetahui==8)
                        Ketua TIM Kegiatan Non Pro PN
                    @elseif($data->mengetahui==9)
                        Ketua TIM Kegiatan Pro PN
                    @elseif($data->mengetahui==10)
                        Ketua TIM Penindakan
                    @elseif($data->mengetahui==11)
                        Ketua TIM Pengujian (Obat–OT–SK)
                    @elseif($data->mengetahui==12)
                        Ketua TIM Pengujian (Kosmetik)
                    @elseif($data->mengetahui==13)
                        Ketua TIM Pengujian (Pangan)
                    @elseif($data->mengetahui==14)
                        Ketua TIM Sistem Manajemen Mutu
                    @endif
                    <br><br><br><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    @if($data->mengetahui==1)
                    Andi Amirah Nilawati, S.Si, Apt., M.HSM.
                    @elseif($data->mengetahui==2)
                    Sitti Hikma Suciati, S.Si, M.Si
                    @elseif($data->mengetahui==3)
                    Mansur Laekkeng, S.Kom. 
                    @elseif($data->mengetahui==4)
                    Drs. Hamka Hasan, Apt, M.Kes. 
                    @elseif($data->mengetahui==5)
                    Norma, S.Si, Apt.
                    @elseif($data->mengetahui==6)
                    Djamir, S.Si.
                    @elseif($data->mengetahui==7)
                    Abdul Rahman, S.Si, Apt.
                    @elseif($data->mengetahui==8)
                    Ahmad Lalo, S.Si, Apt, M.Si.
                    @elseif($data->mengetahui==9)
                    Dra. Andi Aisyah Andi Hapid, Apt.
                    @elseif($data->mengetahui==10)
                    Sriyani Rasyid, S.Si, Apt.
                    @elseif($data->mengetahui==11)
                    Dra. Ina Tanujaya, Apt, M.Sc.
                    @elseif($data->mengetahui==12)
                    St. Nurhamidah, S.Si, Apt.,M.Si.
                    @elseif($data->mengetahui==13)
                    Siti Aminah, S.Si, Apt.
                    @elseif($data->mengetahui==14)
                    Endhah Yulyarti, S.Si, Apt.,M.Si. 
                    @endif
                    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    @if($data->mengetahui==1)
                        19740509200003 2 001
                    @elseif($data->mengetahui==2)
                        19790531200501 2 002
                    @elseif($data->mengetahui==3)
                        19810505200501 1 003
                    @elseif($data->mengetahui==4)
                        19670509199302 1 001
                    @elseif($data->mengetahui==5)
                        19740320199403 2 001 
                    @elseif($data->mengetahui==6)
                        19790123200501 1 001
                    @elseif($data->mengetahui==7)
                        19721022199403 1 001 
                    @elseif($data->mengetahui==8)
                        19780209200501 1 002
                    @elseif($data->mengetahui==9)
                        19670919199303 2 001
                    @elseif($data->mengetahui==10)
                        19671005199803 2 001 
                    @elseif($data->mengetahui==11)
                        19681027199803 2 001
                    @elseif($data->mengetahui==12)
                        19790124200501 2 001
                    @elseif($data->mengetahui==13)
                        19801027200501 2 001
                    @elseif($data->mengetahui==14)
                        19780725200312 2 001
                    @endif
                </td>

              
            </tr>
            <tr>
                <td rowspan="" style="width: 10px;border-right-style:none;vertical-align: text-top;">II.</td>
                <td rowspan="" style="width: 145px;border-left-style: none;border-right-style: none;vertical-align: text-top;">
                &nbsp;&nbsp;&nbsp;Tiba di<br>
                &nbsp;&nbsp;&nbsp;Pada Tanggal
                </td>
                <td rowspan="" style="width: 145px;border-left-style: none;vertical-align: text-top;">
                    : {{$data->tujuan}}<br>
                    : {{ $data->tgl_berangkat->isoFormat('D MMMM Y')}}
                </td>
                <td style="width: 10px;text-align: center;border-right-style: none;vertical-align: text-top; border-bottom-style: none;">
                    
                </td>
                <td style="width: 155px;border-left-style: none; border-right-style: none;vertical-align: text-top;border-bottom-style: none;" >
                &nbsp;&nbsp;&nbsp;Berangkat dari<br>
                &nbsp;&nbsp;&nbsp;(Tempat Kedudukan)<br>
                &nbsp;&nbsp;&nbsp;Ke<br>
                &nbsp;&nbsp;&nbsp;Pada Tanggal
                </td>
                <td style="width: 235px;border-left-style: none;border-bottom-style: none;" >
                    : {{$data->tujuan}} <br><br>

                    :@if($data->tgl_berangkat == $data->tgl_kembali) 
                        {{$data->asal}}
                     @else
                        @if(isset($data->tujuan2)){{$data->tujuan2}}@else{{$data->asal}}@endif
                     @endif
                     <br>

                    :@if($data->tgl_berangkat == $data->tgl_kembali) 
                        {{ $data->tgl_kembali->isoFormat('D MMMM Y')}}
                     @else 
                        @if(isset($data->tgl_berangkat2)){{ $data->tgl_berangkat2->isoFormat('D MMMM Y')}}@else{{ $data->tgl_kembali->isoFormat('D MMMM Y')}}@endif
                     @endif
                     <br><br><br><br><br><br><br><br>
                </td>
                
            </tr>
            <tr>
                <td rowspan="" style="width: 10px;border-right-style:none;vertical-align: text-top;">III.</td>
                <td rowspan="" style="width: 145px;border-left-style: none;border-right-style: none;vertical-align: text-top;">
                &nbsp;&nbsp;&nbsp;Tiba di<br>
                &nbsp;&nbsp;&nbsp;Pada Tanggal
                </td>
                <td rowspan="" style="width: 145px;border-left-style: none;vertical-align: text-top;">
                    : @if(isset($data->tujuan2)){{$data->tujuan2}}@endif<br>
                    : @if(isset($data->tgl_berangkat2)){{ $data->tgl_berangkat2->isoFormat('D MMMM Y')}}@endif
                </td>
                <td style="width: 10px;text-align: center;border-right-style: none;vertical-align: text-top; border-bottom-style: none;">
                    
                </td>
                <td style="width: 155px;border-left-style: none; border-right-style: none;vertical-align: text-top;border-bottom-style: none;" >
                &nbsp;&nbsp;&nbsp;Berangkat dari<br>
                &nbsp;&nbsp;&nbsp;(Tempat Kedudukan)<br>
                &nbsp;&nbsp;&nbsp;Ke<br>
                &nbsp;&nbsp;&nbsp;Pada Tanggal
                </td>
                <td style="width: 235px;border-left-style: none;border-bottom-style: none;" >
                    : @if(isset($data->tujuan2)){{$data->tujuan2}}@endif   <br><br>
                    : 
                     @if($data->jns_dns2 == 1) 
                        @if(isset($data->tujuan3)){{$data->tujuan3}} @else @if(isset($data->tujuan2)) {{$data->asal}} @endif @endif
                     @else
                        {{$data->asal}}
                     @endif
                     
                    <br>
                    : 
                    @if($data->jns_dns2 == 1) 
                        @if(isset($data->tgl_berangkat3)){{ $data->tgl_berangkat3->isoFormat('D MMMM Y')}}@else @if(isset($data->tgl_kembali2)) {{ $data->tgl_kembali2->isoFormat('D MMMM Y')}}@endif @endif
                     @else
                        @if(isset($data->tujuan2)) {{ $data->tgl_kembali2->isoFormat('D MMMM Y')}} @endif
                     @endif
                    
                    <br><br><br><br><br>
                </td>
                
            </tr>
            <tr>
                <td rowspan="" style="width: 10px;border-right-style:none;vertical-align: text-top;">IV.</td>
                <td rowspan="" style="width: 145px;border-left-style: none;border-right-style: none;vertical-align: text-top;">
                &nbsp;&nbsp;&nbsp;Tiba di<br>
                &nbsp;&nbsp;&nbsp;Pada Tanggal
                </td>
                <td rowspan="" style="width: 145px;border-left-style: none;vertical-align: text-top;">
                    : @if(isset($data->tujuan3)){{$data->tujuan3}}@endif<br>
                    : @if(isset($data->tgl_berangkat3)){{ $data->tgl_berangkat3->isoFormat('D MMMM Y')}}@endif
                </td>
                <td style="width: 10px;text-align: center;border-right-style: none;vertical-align: text-top; border-bottom-style: none;">
                    
                </td>
                <td style="width: 155px;border-left-style: none; border-right-style: none;vertical-align: text-top;border-bottom-style: none;" >
                &nbsp;&nbsp;&nbsp;Berangkat dari<br>
                &nbsp;&nbsp;&nbsp;(Tempat Kedudukan)<br>
                &nbsp;&nbsp;&nbsp;Ke<br>
                &nbsp;&nbsp;&nbsp;Pada Tanggal
                </td>
                <td style="width: 235px;border-left-style: none;border-bottom-style: none;" >
                    : @if(isset($data->tujuan3)){{$data->tujuan3}}@endif  <br><br>
                    : 
                     @if($data->jns_dns3 == 1) 
                        @if(isset($data->tujuan4)){{$data->tujuan4}} @else @if(isset($data->tujuan3)) {{$data->asal}} @endif @endif
                     @else
                        {{$data->asal}}
                     @endif
                     <br>
                    : @if($data->jns_dns3 == 1) 
                        @if(isset($data->tgl_berangkat4)){{ $data->tgl_berangkat4->isoFormat('D MMMM Y')}}@else @if(isset($data->tgl_kembali3)){{ $data->tgl_kembali3->isoFormat('D MMMM Y')}} @endif @endif
                     @else
                        @if(isset($data->tujuan3)) {{ $data->tgl_kembali3->isoFormat('D MMMM Y')}} @endif
                     @endif 
                     <br><br><br><br><br>
                </td>
                
            </tr>
            <tr>
                <td rowspan="" style="width: 10px;border-right-style:none;vertical-align: text-top;">V.</td>
                <td rowspan="" style="width: 145px;border-left-style: none;border-right-style: none;vertical-align: text-top;">
                &nbsp;&nbsp;&nbsp;Tiba di<br>
                &nbsp;&nbsp;&nbsp;Pada Tanggal
                </td>
                <td rowspan="" style="width: 145px;border-left-style: none;vertical-align: text-top;">
                    : @if(isset($data->tujuan4)){{$data->tujuan4}}@endif<br>
                    : @if(isset($data->tgl_berangkat4)){{ $data->tgl_berangkat4->isoFormat('D MMMM Y')}}@endif
                </td>
                <td style="width: 10px;text-align: center;border-right-style: none;vertical-align: text-top; border-bottom-style: none;">
                    
                </td>
                <td style="width: 155px;border-left-style: none; border-right-style: none;vertical-align: text-top;border-bottom-style: none;" >
                &nbsp;&nbsp;&nbsp;Berangkat dari<br>
                &nbsp;&nbsp;&nbsp;(Tempat Kedudukan)<br>
                &nbsp;&nbsp;&nbsp;Ke<br>
                &nbsp;&nbsp;&nbsp;Pada Tanggal
                </td>
                <td style="width: 235px;border-left-style: none;border-bottom-style: none;" >
                    : @if(isset($data->tujuan4)){{$data->tujuan4}}@endif <br><br>
                    : @if(isset($data->tujuan4)){{$data->asal}}@endif<br>
                    : @if(isset($data->tgl_kembali4)){{ $data->tgl_kembali4->isoFormat('D MMMM Y')}}@endif<br><br><br><br><br>
                </td>
                
            </tr>
            <tr>
                <td rowspan="" style="width: 10px;border-right-style:none;vertical-align: text-top;border-bottom-style: none;border-bottom-style: none;">VI.</td>
                <td rowspan="" style="width: 145px;border-left-style: none;border-right-style: none;vertical-align: text-top;border-bottom-style: none;">
                &nbsp;&nbsp;&nbsp;Tiba di<br>
                &nbsp;&nbsp;&nbsp;(Tempat Kedudukan)<br>
                &nbsp;&nbsp;&nbsp;Pada Tanggal
                </td>
                <td rowspan="" style="width: 145px;border-left-style: none;vertical-align: text-top;border-bottom-style: none;">
                    : {{$data->asal}}<br>
                      <br>
                    : @if(isset($data->tgl_kembali4)) {{ $data->tgl_kembali4->isoFormat('D MMMM Y')}} 
                      @elseif (isset($data->tgl_kembali3)) {{ $data->tgl_kembali3->isoFormat('D MMMM Y')}} 
                      @elseif (isset($data->tgl_kembali2)) {{ $data->tgl_kembali2->isoFormat('D MMMM Y')}} 
                      @else {{ $data->tgl_kembali->isoFormat('D MMMM Y')}} 
                      @endif
                </td>
                <td rowspan="" style="width: 10px;border-right-style:none;vertical-align: text-top; border-bottom-style: none;"></td>
                <td colspan="2" style="width: 155px;border-left-style: none; border-right-style: none;vertical-align: text-top;border-bottom-style: none;" >
                Telah diperiksa dengan keterangan bahwa perjalanan tersebut atas perintahnya
                dan semata-mata untuk kepentingan jabatan dalam waktu sesingkat-singkatnya.
                </td>
            </tr>
            <tr>
                <td  style="width: 10px;border-right-style:none;vertical-align: text-top;border-top-style: none;"></td>
                <td colspan="2" style="width: 145px;border-left-style: none;border-right-style: none;vertical-align: text-top;border-top-style: none;">
                &nbsp;&nbsp;&nbsp;<b>Pejabat Pembuat Komitmen
                <br><br><br><br><br>
                &nbsp;&nbsp;<u>
                @if($data->ppk == 1)
                Tri Astuty, ST
                @elseif($data->ppk == 2)
                Hamdana, S.Si
                @elseif($data->ppk == 3)
                Yayu Sulistia, S.Si., Apt.
                @elseif($data->ppk == 4)
                Siti Nurazika Arifin, SE
                @endif
                </u></b><br>
                &nbsp;&nbsp;
                @if($data->ppk == 1)
                NIP.19800814200501 2 002
                @elseif($data->ppk == 2)
                NIP.19800725200003 2 001
                @elseif($data->ppk == 3)
                NIP.19781217 200312 2 001
                @elseif($data->ppk == 4)
                NIP.19970908 202012 2 002
                @endif
                </td>
                

                <td style="width: 10px;border-right-style:none;vertical-align: text-top; border-top-style: none;"></td>
                <td colspan="2" style="width: 155px;border-left-style: none; border-right-style: none;vertical-align: text-top;border-top-style: none;" >
                <b>Pejabat Pembuat Komitmen
                <br><br><br><br><br>
                <u>
                @if($data->ppk == 1)
                Tri Astuty, ST
                @elseif($data->ppk == 2)
                Hamdana, S.Si
                @elseif($data->ppk == 3)
                Yayu Sulistia, S.Si., Apt.
                @elseif($data->ppk == 4)
                Siti Nurazika Arifin, SE
                @endif
                </u></b><br>
                @if($data->ppk == 1)
                NIP.19800814200501 2 002
                @elseif($data->ppk == 2)
                NIP.19800725200003 2 001
                @elseif($data->ppk == 3)
                NIP.19781217 200312 2 001
                @elseif($data->ppk == 4)
                NIP.19970908 202012 2 002
                @endif
                </td>
            </tr>
            <tr>
                <td colspan="6">VII. CATATAN LAIN-LAIN</td>
            </tr>
            <tr>
                <td style="border-bottom-style: none;"  colspan="6">VIII. PERHATIAN :</td>
            </tr>
            <tr>
                <td style="border-top-style: none; border-right-style: none;"></td>
                <td style="border-top-style: none;border-left-style: none;" colspan="5">
                    PPK yang menerbitkan SPPD pegawai yang melakukan perjalanan dinas, para pejabat yang mengesahkan tanggal berangkat/tiba serta, 
                    bendaharawan pengeluaran bertanggung jawab berdasarkan peraturan-peraturan Keuangan Negara apabila negara menderita kerugian akibat kesalahan,
                    kelalaian dan kealpaannya
                </td>
            </tr>
        </table>
</div>
</body>

</html>



















