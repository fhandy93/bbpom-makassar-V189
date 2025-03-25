
<?php
// Menangkap IP yg masuk
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}

// Fix for removed Session functions
function fix_session_register()
{
    function session_register()
    {
        $args = func_get_args();
        foreach ($args as $key)
        {
            if (isset($GLOBALS[$key]))
            {
                $_SESSION[$key]=$GLOBALS[$key];
            }
            
        }
    }
    function session_is_registered($key)
    {
        return isset($_SESSION[$key]);
    }
    function session_unregister($key)
    {
        unset($_SESSION[$key]);
    }
}
if (!function_exists('session_register')) fix_session_register();

session_start();
// menangkap data yang dikirim dari form login
$email = $_POST['email'];
$password = $_POST['password'];

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://bbpom-makassar.com/api/login',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('email' => $email,'password' => $password),
));

$result = curl_exec($curl);
echo $result;
curl_close($curl);
$data = Json_decode($result, True);


// header("location:index.php");
if($data['status']=='Unauthorized'){
    header("location:login.php?status=wrong_pass");
}else if($data['status']=='ok'){
    // buat session login dan username
    session_register('name');
    $_SESSION['name'] = $data['name'];
    $_SESSION['email'] = $data['email'];
    $_SESSION['id'] = $data['id'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['token'] = $data['access_token'];
   header("location:index.php");
    
}else{
    header("location:error.php");
}
?>




