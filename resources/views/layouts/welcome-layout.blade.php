<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!--=============== basic  ===============-->
        <!-- META DATA -->
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="BPOM RI – Website Balai Besar POM di Makassar">
        <meta name="author" content="Tim IT BBPOM di Makassar">
        <meta name="keywords"
        content="bpom,bbpom makassar,makassar,badan pengawas makanan dan obat,adaja,siyapp,sinonim,sikama,seppulo,bbpom di makassar">
        <!--=============== css  ===============-->
        <link type="text/css" rel="stylesheet" href="{{ asset('vendor/frontcss/plugins.css')}}">
        <link type="text/css" rel="stylesheet" href="{{ asset('vendor/frontcss/style.css')}}">
        <link type="text/css" rel="stylesheet" href="{{ asset('vendor/frontcss/color.css')}}">
        <!--=============== favicons ===============-->
        <!-- FAVICON -->
       <link rel="shortcut icon" type="image/x-icon" href="{{ asset('vendor/images/brand/favicon.ico') }}" />
    </head>
    <body>
        <!-- main start  -->
        <div id="main">
            <!-- progress-bar  -->
            <div class="progress-bar-wrap">
                <div class="progress-bar color-bg"></div>
            </div>
            <!-- progress-bar end -->
            <!-- header -->
            <x-HeaderNav></x-HeaderNav>
            <!-- header end  -->
              {{$slot}} 
        </div>
        <!-- Main end -->
        <!--=============== scripts  ===============-->
        <script src="{{ asset('vendor/frontjs/jquery.min.js')}}"></script>
        <script src="{{ asset('vendor/frontjs/plugins.js')}}"></script>
        <script src="{{ asset('vendor/frontjs/scripts.js')}}"></script>
    </body>
</html>