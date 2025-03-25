<!doctype html>
<html class="no-js" lang="zxx">

<head>
   
   <title>SIPINTAR</title>

    <!-- META DATA -->
    <meta charset="UTF-8">
   <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="description" content="BPOM RI – Website Balai Besar POM di Makassar">
   <meta name="author" content="Tim IT BBPOM di Makassar">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"> 
   <meta name="keywords"
   content="bpom,bbpom makassar,makassar,badan pengawas makanan dan obat,adaja,siyapp,sinonim,sikama,seppulo,bbpom di makassar">

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

   <!-- Place favicon.ico in the root directory -->
   <link rel="shortcut icon" type="image/x-icon" href="{{asset('vendor/img/logo/favicon.ico')}}">

   <!-- CSS here -->
   <link rel="stylesheet" href="{{asset('vendor/css/bootstrap.min.css')}}">
   <link rel="stylesheet" href="{{asset('vendor/css/animate.css')}}">
   <link rel="stylesheet" href="{{asset('vendor/css/custom-animation.css')}}">
   <link rel="stylesheet" href="{{asset('vendor/css/slick.css')}}">
   <link rel="stylesheet" href="{{asset('vendor/css/nice-select.css')}}">
   <link rel="stylesheet" href="{{asset('vendor/css/flaticon_xoft.css')}}">
   <link rel="stylesheet" href="{{asset('vendor/css/swiper-bundle.css')}}">
   <link rel="stylesheet" href="{{asset('vendor/css/meanmenu.css')}}">
   <link rel="stylesheet" href="{{asset('vendor/css/font-awesome-pro.css')}}">
   <link rel="stylesheet" href="{{asset('vendor/css/magnific-popup.css')}}">
   <link rel="stylesheet" href="{{asset('vendor/css/spacing.css')}}">
   <link rel="stylesheet" href="{{asset('vendor/css/main.css')}}">
   
   <script async src="https://www.google.com/recaptcha/api.js"></script>
   </head>

<body>

   <!-- preloader -->
   <div id="preloader">
      <div class="preloader">
         <span></span>
         <span></span>
      </div>
   </div>
   <!-- preloader end  -->

   <!-- back-to-top-start  -->
   <button class="scroll-top scroll-to-target" data-target="html">
      <i class="far fa-angle-double-up"></i>
   </button>
   <!-- back-to-top-end  -->


   <!-- it-offcanvus-area-start -->
   <!-- <div class="it-offcanvas-area">
      <div class="itoffcanvas">
         <div class="it-offcanva-bottom-shape d-none d-xxl-block">
         </div>
         <div class="itoffcanvas__close-btn">
            <button class="close-btn"><i class="fal fa-times"></i></button>
         </div>
         <div class="itoffcanvas__logo">
            <a href="index.html">
               <img src="assets/img/logo/logo-white.png" alt="">
            </a>
         </div>
         <div class="itoffcanvas__text">
            <p>Suspendisse interdum consectetur libero id. Fermentum leo vel orci porta non. Euismod viverra nibh
               cras pulvinar suspen.</p>
         </div>
         <div class="it-menu-mobile"></div>
         <div class="itoffcanvas__info">
            <h3 class="offcanva-title">Get In Touch</h3>
            <div class="it-info-wrapper mb-20 d-flex align-items-center">
               <div class="itoffcanvas__info-icon">
                  <a href="#"><i class="fal fa-envelope"></i></a>
               </div>
               <div class="itoffcanvas__info-address">
                  <span>Email</span>
                  <a href="maito:hello@yourmail.com">hello@yourmail.com</a>
               </div>
            </div>
            <div class="it-info-wrapper mb-20 d-flex align-items-center">
               <div class="itoffcanvas__info-icon">
                  <a href="#"><i class="fal fa-phone-alt"></i></a>
               </div>
               <div class="itoffcanvas__info-address">
                  <span>Phone</span>
                  <a href="tel:(00)45611227890">(00) 456 1122 7890</a>
               </div>
            </div>
            <div class="it-info-wrapper mb-20 d-flex align-items-center">
               <div class="itoffcanvas__info-icon">
                  <a href="#"><i class="fas fa-map-marker-alt"></i></a>
               </div>
               <div class="itoffcanvas__info-address">
                  <span>Location</span>
                  <a href="htits://www.google.com/maps/@37.4801311,22.8928877,3z" target="_blank">Riverside 255,
                     San Francisco, USA </a>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="body-overlay"></div> -->
   <!-- it-offcanvus-area-end -->

    <x-HeaderComponent></x-HeaderComponent>

   <main>
      {{$slot}} 
   </main>
   
  
    <x-FooterComponent></x-FooterComponent>


   <!-- JS here -->
   <script src="{{ asset('vendor/js/jquery.js')}}"></script>
   <script src="{{ asset('vendor/js/waypoints.js')}}"></script>
   <script src="{{ asset('vendor/js/bootstrap.bundle.min.js')}}"></script>
   <script src="{{ asset('vendor/js/slick.min.js')}}"></script>
   <script src="{{ asset('vendor/js/magnific-popup.js')}}"></script>
   <script src="{{ asset('vendor/js/purecounter.js')}}"></script>
   <script src="{{ asset('vendor/js/wow.js')}}"></script>
   <script src="{{ asset('vendor/js/nice-select.js')}}"></script>
   <script src="{{ asset('vendor/js/swiper-bundle.js')}}"></script>
   <script src="{{ asset('vendor/js/isotope-pkgd.js')}}"></script>
   <script src="{{ asset('vendor/js/imagesloaded-pkgd.js')}}"></script>
   <script src="{{ asset('vendor/js/ajax-form.js')}}"></script>
   <script src="{{ asset('vendor/js/main.js')}}"></script>



</body>

</html>