<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="BPOM RI – Website Balai Besar POM di Makassar">
        <meta name="author" content="Tim IT BBPOM di Makassar">
        <meta name="keywords"
        content="bpom,bbpom makassar,makassar,badan pengawas makanan dan obat,adaja,siyapp,sinonim,sikama,seppulo,bbpom di makassar">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('vendor/images/brand/favicon.ico') }}" />

    <!-- TITLE -->
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('vendor/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="{{ asset('vendor/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/css/dark-style.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/css/transparent-style.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/css/skin-modes.css') }}" rel="stylesheet" />

    <!-- CSS VALIDATE   -->
    <link href="{{ asset('vendor/css/validate.css') }}" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="{{ asset('vendor/css/icons.css') }}" rel="stylesheet" />
    
    <style type="text/css">
    .ck-editor__editable {
         min-height: 250px;
         color: black;
    }
    </style>

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{ asset('vendor/colors/color1.css') }}" />
    <style>
        .form-switch .form-check-input{
            width: 50px;
            height: 20px;
            margin-left: 0.0009rem;
        }
        input.error {
            border-color: #f00 !important;
        }
        small.required {
            color:#f00;
        }
         @media (min-width: 576px) {
            .card-group.card-group-scroll {
                overflow-x: auto;
                flex-wrap: nowrap;
            }
        }
        
        .card-group.card-group-scroll > .card {
            flex-basis: 35%;
        }
    </style>

    <!-- livewire -->
    @livewireStyles
</head>

<body class="app sidebar-mini ltr light-mode">
    <!-- livewire -->
    @stack('scripts')
    @livewireScripts
    <!-- GLOBAL-LOADER -->
    <div id="global-loader">
        <img src="{{ asset('vendor/images/loader.svg') }}" class="loader-img" alt="Loader">
    </div>
    <!-- /GLOBAL-LOADER -->
    <div class="page">
        <div class="page-main">
            <x-HeaderHome></x-HeaderHome>
            <x-SidebarNav></x-SidebarNav>
            <!-- PAGE-CONTENT OPEN -->
             {{$slot}}
        <!-- PAGE-CONTENT OPEN CLOSED -->
        </div>
        <x-FootherHome></x-FootherHome>
    </div>
    <!-- BACK-TO-TOP -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>
    
    <script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "Choose Some Tags"
        });
    });
</script>
</body>

</html>


























