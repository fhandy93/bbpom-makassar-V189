<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
     .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
        }
    </style>
</head>
<body>
    <center><img class="center" style="text-align: center;"src="{{ asset('vendor/images/brand/logo-3.png') }}"><br>
    <img src="{{ asset('vendor/images/media/frame.png') }}"></center>
    <div style="text-align: center;">
    https://sappai.bbpom-makassar.com/<br>
    <h4>Email : {{ $email }}</h4>
    <h4>Password : {{ $password }}</h4>
    </div>
   
</body>
</html>