<?php
function checkPermission($permissions){
    $userAccess = getMyPermission(auth()->user()->is_permission);
    foreach ($permissions as $key => $value) {
      if($value == $userAccess){
        return true;
      }
    }
    return false;
  }

 function sendMessage($pesan,$no){
    // $curl = curl_init();
    // curl_setopt_array($curl, array(
    // CURLOPT_URL => 'https://pati.wablas.com/api/send-message',
    // CURLOPT_RETURNTRANSFER => true,
    // CURLOPT_ENCODING => '',
    // CURLOPT_MAXREDIRS => 10,
    // CURLOPT_TIMEOUT => 0,
    // CURLOPT_FOLLOWLOCATION => true,
    // CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    // CURLOPT_CUSTOMREQUEST => 'POST',
    // CURLOPT_POSTFIELDS => (['phone' => $no,'message' => $pesan]),
    // CURLOPT_HTTPHEADER => array(
    //     'Authorization: JR1AFEmZQtmyebnW52EH1LZaZh1lvoBH4v0BbPVpsYq2rFpK3eNs08hpi8Rzpo6m'
    // ),
    // ));
    // $response = curl_exec($curl);
    // curl_close($curl);
    
    
    $curl = curl_init();
    $token = "v4e1bMSSR4vjTGlfFUR5EBaoxHx3AXu59DvtX6cDH6N13AHksFVNdXhGKmX0mHXV";
    $secret_key = "FvKiNKdk";
    $data = [
   'phone' => $no,'message' => $pesan
    ];
    curl_setopt($curl, CURLOPT_HTTPHEADER,
        array(
            "Authorization: $token.$secret_key",
        )
    );
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($curl, CURLOPT_URL,  "https://pati.wablas.com/api/send-message");
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    $result = curl_exec($curl);
    curl_close($curl);

  }

  function timeLembur($a,$b,$c,$d){
      $time1 =  $c;
      $minute1 = $d;

      $time2 = $a;
      $minute2 = $b;

      if($a==01){
        $time2 = 25;
      }else if($a==02){
        $time2 = 26;
      }else if($a==03){
        $time2 = 27;
      }else if($a==04){
        $time2 = 28;
      }else if($a==05){
        $time2 = 29;
      }else if($a==06){
        $time2 = 30;
      }else if($a==07){
        $time2 = 31;
      }

      $a = ((($time2 * 60)+$minute2)*60)-((($time1 * 60)+$minute1)*60);
      // echo secondsToTime($a);
      $h = floor($a / 3600);
      $a -= $h * 3600;
      $m = floor($a / 60);
      $a -= $m * 60;
      return  $h.' Jam '.  $m .' Menit ';
    
  }

  function getMyPermission($id)
  {
    switch ($id) {
      case 1:
        return 'superadmin';
        break;
      case 2:
        return 'perlengkapan';
        break;
      case 3:
        return 'kepegawaian';
        break; 
      case 4:
        return 'keuangan';
        break;
      case 5:
        return 'infokom';
        break; 
      case 6:
        return 'laboratorium';
        break; 
      case 7:
        return 'penindakan';
        break; 
      case 8:
        return 'pemeriksaan';
        break; 
      case 9:
        return 'pengujian';
        break; 
      case 10:
        return 'evaluasi';
        break; 
      case 11:
        return 'admin';
        break;
      case 12:
        return 'ktu';
        break;
      case 13:
        return 'user';
        break;
      case 14:
        return 'sertifikasi';
        break; 
      case 15:
        return 'it';
        break; 
      case 16:
        return 'kabalai';
        break;
      case 17:
        return 'picinfokom';
        break;
      case 18:
        return 'picinspeksi';
        break;
      case 19:
        return 'picsertifikasi';
        break;
      case 20:
        return 'picpengujian';
        break;
      case 21:
        return 'picpenindakan';
        break;
      case 22:
        return 'pickepegawaian';
        break;
      default:
        return 'cadangan';
        break;
    }
  }
  
  function getMenuBerakhlak($id)
  {
    switch ($id) {
      case 1:
        return 'Berorientasi Pelayanan';
        break;
      case 2:
        return 'Akuntabel';
        break;
      case 3:
        return 'Kompeten';
        break; 
      case 4:
        return 'Harmonis';
        break;
      case 5:
        return 'Loyal';
        break; 
      case 6:
        return 'Adaptif';
        break; 
      case 7:
        return 'Kolaboratif';
        break; 
      
    }
  }
  function getVersion(){
      return "1.7.9";
  }
  
  function sendImage($phone,$image,$capt){

    $curl = curl_init();
    $token = "v4e1bMSSR4vjTGlfFUR5EBaoxHx3AXu59DvtX6cDH6N13AHksFVNdXhGKmX0mHXV";
    $secret_key = "FvKiNKdk";
    $data = [
    'phone' => $phone,
    'image' => $image,
    'caption' => $capt,
    ];
    curl_setopt($curl, CURLOPT_HTTPHEADER,
        array(
            "Authorization: $token.$secret_key",
        )
    );
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($curl, CURLOPT_URL,  "https://pati.wablas.com/api/send-image");
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    
    $result = curl_exec($curl);
    curl_close($curl);
    echo "<pre>";
    print_r($result);
    
    }
    
    function rangeDay($date1, $date2){
    $fdate = $date1;
    $tdate = $date2;
    $datetime1 = new DateTime($fdate);
    $datetime2 = new DateTime($tdate);
    $interval = $datetime1->diff($datetime2);
    $days = $interval->format('%a');
    return $days + 1;
  }

  function convertNumberToWordsIndo($number) {
    $hyphen      = '-';
    $conjunction = ' dan ';
    $separator   = ', ';
    $negative    = 'minus ';
    $decimal     = ' koma ';
    $dictionary  = array(
        0                   => 'Nol',
        1                   => 'Satu',
        2                   => 'Dua',
        3                   => 'Tiga',
        4                   => 'Empat',
        5                   => 'Lima',
        6                   => 'Enam',
        7                   => 'Tujuh',
        8                   => 'Delapan',
        9                   => 'Sembilan',
        10                  => 'Sepuluh',
        11                  => 'Sebelas',
        12                  => 'Dua belas',
        13                  => 'Tiga belas',
        14                  => 'Empat belas',
        15                  => 'Lima belas',
        16                  => 'Enam belas',
        17                  => 'Tujuh belas',
        18                  => 'Delapan belas',
        19                  => 'Sembilan belas',
        20                  => 'Dua puluh',
        30                  => 'Tiga puluh',
        40                  => 'Empat puluh',
        50                  => 'Lima puluh',
        60                  => 'Enam puluh',
        70                  => 'Tujuh puluh',
        80                  => 'Delapan puluh',
        90                  => 'Sembilan puluh',
        100                 => 'Seratus',
        1000                => 'Seribu',
        1000000             => 'Satu juta',
        1000000000          => 'Satu miliar',
        1000000000000       => 'Satu triliun',
        1000000000000000    => 'Satu kuadriliun',
        1000000000000000000 => 'Satu kuintiliun'
    );

    if (!is_numeric($number)) {
        return false;
    }

    if ($number < 0) {
        return $negative . convertNumberToWordsIndo(abs($number));
    }

    $string = $fraction = null;

    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }

    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . convertNumberToWordsIndo($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convertNumberToWordsIndo($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convertNumberToWordsIndo($remainder);
            }
            break;
    }

    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }

    return $string;
    }


?>
