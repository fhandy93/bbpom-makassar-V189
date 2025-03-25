<?php
$kode = $_GET['id']; 
$id = $_SESSION['id'];
$curl = curl_init();
$token = 'Authorization: Bearer '. $_SESSION['token'];
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://bbpom-makassar.com/api/detail/'.$id.'/'.$kode,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    $token
  ),
));

$response = curl_exec($curl);

$data = Json_decode($response);
foreach ($data as $key=>$item ) {
    if(isset($item->kode)){
    $kode = $item->kode;
    $nama = $item->nama_sample;
    $tgl = $item->tanggal;
    $asal = $item->asal;
    $billing = $item->billing;
    $tahap = $item->tahap;
    $berkas = $item->berkas;
    }
}
if(isset($item->kode)){

?>
<style>
    html {
  width: 100%;
}

body {
  overflow-x: hidden !important;
}

body.show-spinner>main {
  overflow: hidden !important;
}

/* Hide everything under body tag */
body.show-spinner>* {
  opacity: 0;
}

/* Spinner */
body.show-spinner::after {
  content: " ";
  display: inline-block;
  width: 30px;
  height: 30px;
  border: 2px solid rgba(0, 0, 0, 0.2);
  border-radius: 50%;
  border-top-color: rgba(0, 0, 0, 0.3);
  animation: spin 1s ease-in-out infinite;
  -webkit-animation: spin 1s ease-in-out infinite;
  left: calc(50% - 15px);
  top: calc(50% - 15px);
  position: fixed;
  z-index: 1;
}

@keyframes spin {
  to {
    transform: rotate(360deg);
  }
}

@-webkit-keyframes spin {
  to {
    -webkit-transform: rotate(360deg);
  }
}
.timeline {
  border-left: 3px solid #727cf5;
  border-bottom-right-radius: 4px;
  border-top-right-radius: 4px;

  margin: 0 auto;
  letter-spacing: 0.2px;
  position: relative;
  line-height: 1.4em;
  font-size: 1.03em;
  padding: 50px;
  list-style: none;
  text-align: left;
  max-width: 40%;
}

@media (max-width: 767px) {
  .timeline {
      max-width: 98%;
      padding: 25px;
  }
}

.timeline h1 {
  font-weight: 300;
  font-size: 1.4em;
}

.timeline h2,
.timeline h3 {
  font-weight: 600;
  font-size: 1rem;
  margin-bottom: 10px;
}

.timeline .event {
  border-bottom: 1px dashed #e8ebf1;
  padding-bottom: 25px;
  margin-bottom: 25px;
  position: relative;
}

@media (max-width: 767px) {
  .timeline .event {
      padding-top: 30px;
  }
}

.timeline .event:last-of-type {
  padding-bottom: 0;
  margin-bottom: 0;
  border: none;
}

.timeline .event:before,
.timeline .event:after {
  position: absolute;
  display: block;
  top: 0;
}

.timeline .event:before {
  left: -207px;
  content: attr(data-date);
  text-align: right;
  font-weight: 100;
  font-size: 0.9em;
  min-width: 120px;
}

@media (max-width: 767px) {
  .timeline .event:before {
      left: 0px;
      text-align: left;
  }
}

.timeline .event:after {
  -webkit-box-shadow: 0 0 0 3px #727cf5;
  box-shadow: 0 0 0 3px #727cf5;
  left: -55.8px;
  background:white;
  border-radius: 50%;
  height: 9px;
  width: 9px;
  content: "";
  top: 5px;
}

@media (max-width: 767px) {
  .timeline .event:after {
      left: -31.8px;
  }
}

.rtl .timeline {
  border-left: 0;
  text-align: right;
  border-bottom-right-radius: 0;
  border-top-right-radius: 0;
  border-bottom-left-radius: 4px;
  border-top-left-radius: 4px;
  border-right: 3px solid #727cf5;
}

.rtl .timeline .event::before {
  left: 0;
  right: -170px;
}

.rtl .timeline .event::after {
  left: 0;
  right: -55.8px;
}
.timeline .aktif{
  background: rgba(44, 84, 230, 0.438);
  -webkit-box-shadow: 0 0 0 3px #727cf5;
  -webkit-box-shadow: 0 0 0 3px #727cf5;
  border-radius: 1%;
  border: 50px;
  content: attr(data-date);
  color: rgb(3, 3, 1);
  
}
.timeline .lewat{
  background: rgba(94, 94, 115, 0.568);
  -webkit-box-shadow: 0 0 0 3px #535565;
  -webkit-box-shadow: 0 0 0 3px #535565;
  border-radius: 1%;
  border: 50px;
  content: attr(data-date);
  color: rgb(3, 3, 1);
  
}

</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Sample Uji</h1>
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                <ol class="breadcrumb pt-0">
                    <li class="breadcrumb-item">
                        <a href="?module=dashboard">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="?module=sampel">Data Sample Uji</a>
                    </li>
                    <li class="breadcrumb-item">Detail</li>
                    
                </ol>
            </nav>
            <div class="separator mb-5"></div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5>Detail Sample</h5>
                    <table class="table table-striped">
                              
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Kode Sample</td>
                                        <td><?php echo $kode?></td>
                                      
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Nama Sample</td>
                                        <td><?php echo $nama?></td>
                                      
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Tanggal Input</td>
                                        <td><?php echo $tgl?></td>
                                     
                                    </tr>
                                    <tr>
                                        <th scope="row">4</th>
                                        <td>Asal</td>
                                        <td><?php echo $asal?></td>
                                     
                                    </tr>
                                    <tr>
                                        <th scope="row">5</th>
                                        <td>Kode Billing</td>
                                        <td><?php echo $billing?></td>
                                     
                                    </tr>
                                </tbody>
                            </table>
                </div>
            </div>
        </div><br>
        <div class="col-lg-8 col-md-12">
            <div class="card">
                <div class="card-body">
                    
                <h5 class="mb-4">Detail Tahap Pengujian</h5>
                <div id="content">
                        <ul class="timeline">
                            <li class="event <?php if($tahap==1){echo 'aktif';}?> " data-date="Tahap 1">
                                <h3>Tahap Administrasi</h3>
                                <p>Dalam Tahap ini sample telah memenuhi syarat administrasi untuk dilakukan proses pengujian sample</p>
                            </li>
                            <li class="event <?php if($tahap==2){echo 'aktif';}?>" data-date="Tahap 2">
                                <h3>Tahap Pengujian</h3>
                                <p>Dalam tahap ini dilakukan proses pengujian sample sesuai parameter yang diajukan</p>
                            </li>
                            <li class="event <?php if($tahap==3){echo 'aktif';}?>" data-date="Tahap 3"> 
                                <h3>Sample Selesai Uji</h3>
                                <p>Sample yang selesai diuji akan dibuatkan Laporan Hasil Uji Sample</p>
                            </li>
                            <li class="event <?php if($tahap==4){echo 'aktif';}?>" data-date="Tahap 4">
                                <h3>Pengambilan Sertifikat</h3>
                                <p>Tahapan akhir sertifikat bisa didownload setelah selesai pengisian kuisioner</p>
                            </li>
                            <?php if($tahap==4) {?>
                            <li >
                            <a href="https://bbpom-makassar.com<?php echo $berkas?>" target="_new" class="btn btn-primary">Download Sertifikat</a>
                            </li>
                            <?php };?>
                        </ul>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php
}else{
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Sample Uji</h1>
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                <ol class="breadcrumb pt-0">
                    <li class="breadcrumb-item">
                        <a href="?module=dashboard">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="?module=sampel">Data Sample Uji</a>
                    </li>
                    <li class="breadcrumb-item">Detail</li>
                    
                </ol>
            </nav>
            <div class="separator mb-5"></div>
        </div>
    </div>

    <div class="row mb-4">
        
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                <h5 class="mb-4">Detail Tahap Pengujian</h5>
                    <div id="content">
                        <div class="text-center">Anda belum mengisi data kuisioner, Silakan mengisi data <a style="color: blue;" href="?module=kuisioner">Kuisioner</a> untuk mengakses halaman ini melalui menu <a style="color: blue;" href="?module=kuisioner">Kuisioner</a> atau dengan Link berikut <a style="color: blue;" href="?module=kuisioner">Kuisioner</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
}
?>