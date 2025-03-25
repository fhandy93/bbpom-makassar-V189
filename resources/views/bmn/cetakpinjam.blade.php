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
    margin-top: 100px;
    margin-bottom: 20px;
    text-align: center;
    }
    #wrapper {
        width:660px;
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
    #table1{
        width: 70%;
        margin-left: 40px;
        margin-top: 20px;
    }
    #table1 td{
            font-size: 14px;
            border: 0px solid; 
            }
    #table1 tr{
        height: 20px;
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


#table3 {
    font-size: 14px;
    width: 100%;
    border-collapse: collapse;
}
    </style>
</head>

<body>
<div id="wrapper">
    
        <div id="header">
            <p><p><p>
            <h3><b>BERITA ACARA SERAH TERIMA</b></h3>
            <div style="margin-top: -15px;">Nomor : {{ $bmn->no_surat }}</div>
        </div>
        Pada hari ini {{ $bmn->created_at->isoFormat('dddd')}} tanggal {{ $bmn->created_at->isoFormat('D MMMM Y')}}, 
        kami serahkan barang milik negara kepada saudara/i :
        <table id="table1">
            <tr>
                <td>Nama</td>
                <td>: {{$user->name}}</td>
            </tr>
            <tr>
                <td>NIP</td>
                <td>: {{$prof->nip}}</td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>: {{$prof->jabatan}}</td>
            </tr>
            <tr>
                <td>Pangkat & Golongan</td>
                <td>: {{$prof->pangkat}}</td>
            </tr>
            <tr>
                <td>Unit Kerja</td>
                <td>: {{$prof->unit}}</td>
            </tr>
        </table>
        <p>
        Dengan rincian sebagai berikut : 
       <table id="table2">
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Tipe/Merek</th>
                <th>Kode Barang/NUP</th>
                <th>Tahun</th>
                <th>Lokasi Tujuan</th>
            </tr>
            @foreach($data as $index => $data)
            <tr style="text-align: center;">
                <td>{{$index+1 }}</td>
                <td>{{$data->barang->nm_barang}}</td>
                <td>{{$data->barang->merek}}</td>
                <td>{{$data->barang->kode}}{{$data->barang->nup}}</td>
                <td>{{$data->barang->tgl_perolehan}}</td>
                <td>{{$data->ruang->nm_ruangan}}</td>
            </tr>
            @endforeach
       </table><p><p>
       <p style="text-align: justify;">Apabila dikemudian hari barang tersebut hilang atau rusak karena kelalaian, Maka akan menjadi tanggung jawab dari pemegang/peminjam barang tersebut, 
       dan bersedia mengganti kerugian sesuai dengan spesifikasi atau yang diatas barang tersebut.</p>
       <p style="text-align: justify;">Demikian berita accara ini kami buat dengan sebenar-benarnya, untuk dapat dipergunakan sebagaimana mestinya.</p>
       <table id="table3" >
            <tr style="text-align: center;border: 0px;">
                <td style="border: 0px;"><br>
                    Yang Menyerahkan
                    <br><br><br><br>
                    <u>{{$bmn->userbmn->name}}</u>
                    <br>{{ $nipbmn->nip == '-' ? '': ($nipbmn->nip == null ? '' : 'NIP. '.$nipbmn->nip) }}  
                </td>
                <td style="border: 0px;">
                    Makassar, {{ $bmn->created_at->isoFormat('D MMMM Y')}} <br>
                    Yang Menerima
                    <br><br><br><br>
                    <u>{{$user->name}}</u>
                    <br>{{ $prof->nip == '-' ? '': ($prof->nip == null ? '' : 'NIP. '.$prof->nip) }}  
                </td>
            </tr>
       </table>
</div>
</body>

</html>



















