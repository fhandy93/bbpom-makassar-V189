<?php
$id = $_SESSION['id'];
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://bbpom-makassar.com/api/load/'.$id,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer '. $_SESSION['token']
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$data = Json_decode($response);
?>
<div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <h1>Dashboard</h1>
                <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                    <ol class="breadcrumb pt-0">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">Library</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Data
                    </ol>
                </nav>
                <div class="separator mb-5"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-info " role="alert">
                    Harap untuk menghubungi TIM IT BBPOM Makassar apabila ditemukan BUG atau Error pada Aplikasi ini, 
                    dengan cara mengirim Screenshot error pada No. WA <b><a target="_new" href="https://wa.me/message/22AAFDSPGIWFL1">0888-0405-1010</a></b>
                </div>
            </div
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card mb-4 progress-banner">
                    <div class="card-body justify-content-between d-flex flex-row align-items-center">
                        <div>
                            <i class="iconsminds-chemical mr-2 text-white align-text-bottom d-inline-block"></i>
                            <div>
                                <p class="lead text-white"><?php echo $data->jumlah_sample ?> Sampel</p>
                                <p class="text-small text-white">Jumlah Sampel</p>
                            </div>
                        </div>

                        <div>
                            <div role="progressbar"
                                class="progress-bar-circle progress-bar-banner position-relative" data-color="white"
                                data-trail-color="rgba(255,255,255,0.2)" aria-valuenow="<?php echo $data->jumlah_sample ?>" aria-valuemax="<?php echo $data->jumlah_sample ?>"
                                data-show-percent="false">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="card mb-4 progress-banner">
                    <a href="#" class="card-body justify-content-between d-flex flex-row align-items-center">
                        <div>
                            <i class="iconsminds-diploma-2 mr-2 text-white align-text-bottom d-inline-block"></i>
                            <div>
                                <p class="lead text-white"><?php echo $data->jumlah_selesai ?> Sample</p>
                                <p class="text-small text-white">Sampel Selesai Diuji</p>
                            </div>
                        </div>
                        <div>
                            <div role="progressbar"
                                class="progress-bar-circle progress-bar-banner position-relative" data-color="white"
                                data-trail-color="rgba(255,255,255,0.2)" aria-valuenow="<?php echo $data->jumlah_selesai ?> " aria-valuemax="<?php echo $data->jumlah_sample ?>"
                                data-show-percent="false">
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
</div>