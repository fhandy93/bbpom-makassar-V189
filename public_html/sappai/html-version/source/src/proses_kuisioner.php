<?php
session_start();
if(isset($_SESSION['token'])){
    if(isset($_POST['nama'] )){
        $id = $_SESSION['id'];
        $nama = $_POST['nama'];
        $usia = $_POST['usia'];
        $jk = $_POST['jk'];
        $hp = $_POST['telpon'];
        $p1 = $_POST['p1'];
        $p2 = $_POST['p2'];
        $instansi = $_POST['instansi'];
        $p3 = $_POST['p3'];
        $p4 = $_POST['p4'];
        $p5 = $_POST['p5'];
        $p6 = $_POST['p6'];
        $p7 = $_POST['p7'];
        $p8 = $_POST['p8'];
        $p9 = $_POST['p9'];
        $p10 = $_POST['p10'];
        $p11 = $_POST['p11'];
        $p12 = $_POST['p12'];
        $p13 = $_POST['p13'];
        $p14 = $_POST['p14'];
        $p15 = $_POST['p15'];
        $p16 = $_POST['p16'];
        $p17 = $_POST['p17'];
        $p18 = $_POST['p18'];
        $p19 = $_POST['p19'];
    }
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://bbpom-makassar.com/api/kuisioner',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array('user_id' => $id ,
                                'nama' => $nama,
                                'usia' => $usia,
                                'jk' => $jk,
                                'hp' => $hp,
                                'p1' => $p1,
                                'p2' => $p2,
                                'instansi' => $instansi,
                                'p3' => $p3,
                                'p4' => $p4,
                                'p5' => $p5,
                                'p6' => $p6,
                                'p7' => $p7,
                                'p8' => $p8,
                                'p9' => $p9,
                                'p10' => $p10,
                                'p11' => $p11,
                                'p12' => $p12,
                                'p13' => $p13,
                                'p14' => $p14,
                                'p15' => $p15,
                                'p16' => $p16,
                                'p17' => $p17,
                                'p18' => $p18,
                                'p19' => $p19),
    CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer '. $_SESSION['token']
    ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    $data = Json_decode($response);
    foreach ($data as $key=>$item ){

        $item;
    
    }   
    header("location:?module=kuisioner&status=".$item);
}
?>