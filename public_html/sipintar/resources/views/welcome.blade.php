<x-MainDashboard>
     <!-- hero-area-start -->
     <div id="home" class="it-hero-2-area it-hero-2-bg fix p-relative" data-background="{{asset('vendor/img/hero/hero-bg-1.jpg')}}">
         <div class="it-hero-2-shape-4">
            <!-- <img src="{{asset('vendor/img/hero/shape-2-7.png')}}" alt=""> -->
         </div>
         <div class="it-hero-2-shape-5 d-xl-block">
            <img src="{{asset('vendor/img/hero/shape-2-3.png')}}" alt="">
         </div>
         <div class="it-hero-2-shape-6 d-none d-xl-block">
            <img src="{{asset('vendor/img/hero/shape-2-2.png')}}" alt="">
         </div>
         <div class="it-hero-2-shape-7 d-xl-block">
            <img src="{{asset('vendor/img/hero/shape-2-1.png')}}" alt="">
         </div>
         <div class="it-hero-2-funfact text-center d-none d-xl-block">
            <span class="theme"><i class="purecounter" data-purecounter-duration="1" data-purecounter-end="{{$counttotal}}">0</i></span>
            <span>Total Pengunjung</span>
            <span>Bulan ini</span>
         </div>
         <div class="container">
         @if (session() -> has('success'))
         <div class="alert alert-success alert-dismissible" style="margin-top: 150px;">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Success!</strong> {{ session() -> get('success')}}
         </div>
         @endif
            <div class="row align-items-end">
               <div class="col-xl-6 col-lg-6">
                  <div class="it-hero-2-content">
                     <h1 class="it-hero-2-title">Selamat 
                        <span class="p-relative">
                        Datang
                     </span>
                       <br>Di Aplikasi SIPINTAR<br>BBPOM Di Makassar</h1>
                     <div class="it-hero-2-text">
                        <p>Sistem Informasi Pengadministrasian Tamu Harian BBPOM Di Makassar .</p>
                        <div class="it-hero-2-btn-box d-flex align-items-center">
                           <a class="it-btn" href="https://www.youtube.com/watch?v=6l4TPu9kiWA&t=36s">
                              <span>
                                 Profil BBPOM Makassar
                                 <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11 1.24023L16 7.24023L11 13.2402" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M1 7.24023H16" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                 </svg>                                 
                              </span>
                           </a>   
                           <div class="it-hero-2-play">
                              <a class="popup-video" href="https://www.youtube.com/watch?v=6l4TPu9kiWA"><i class="fas fa-play"></i></a>
                              <span>Watch Now</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-4 col-lg-4">
                  <div class="it-hero-2-thumb-box p-relative">
                     <div class="it-hero-2-thumb p-relative">
                        <img src="{{asset('vendor/img/hero/hero-2.png')}}" alt="">
                        <div style="margin-top: 30px;" class="it-hero-2-shape-1 d-none d-xl-block">
                           <img src="{{asset('vendor/img/hero/shape-2-6.png')}}" alt="">
                        </div>
                        <!-- <div class="it-hero-2-shape-2 d-none d-xl-block">
                           <img src="{{asset('vendor/img/hero/shape-2-4.png')}}" alt="">
                        </div>
                        <div class="it-hero-2-shape-3 d-none d-xl-block">
                           <img src="{{asset('vendor/img/hero/shape-2-5.png')}}" alt="">
                        </div> -->
                     </div>
                  </div>
               </div>
            </div>
         </div> 
      </div>
      <!-- hero-area-end -->
      
      <!-- team-area-start -->
       <div id="survey" class="it-team-3-area it-team-3-style-2 p-relative grey-bg z-index pb-90">
         <div class="container">
            <div class="row">
               <div class="col-xl-12">
                  <div class="it-testimonial-5-title-box text-center mb-60" style="margin-top: 90px;">
                     <span class="it-section-subtitle">Grafik Pengunjung</span>
                     <h4 class="it-section-title-5">Grafik Pengunjung BBPOM Di Makassar</h4>
                  </div>
                  <br><br>
               </div>
            </div>
            <div class="row">
            <center>
            <div class="col-xl-12">
               <div class="chard">
                  <div class="chard-header">
                     <span class="it-section-subtitle">Data Pengunjung BBPOM Di Makassar Tahun {{date('Y')}}</span>
                  </div>
                  <div class="chard-body">
                     <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
                  </div>
               </div>
            
            </div>
            <!-- <div class="col-xl-6">
            <div class="chard">
                  <div class="chard-header">
                  <span class="it-section-subtitle">Data Pengunjung BBPOM Di Makassar</span>
                  </div>
                    <div class="chard-body">
                        <center>
                    <canvas id="donutChart" style="width:100%;max-width:300px"></canvas>
                        </center>
                  </div>
               </div>
               
               
            </div> -->
           
               
            </center>
            </div>
         </div>
      </div>
      <!-- team-area-end -->

      <!-- category-area-start -->
      <div id="item" class="it-category-area pt-120 pb-120" >
         <div class="container">
            <div class="it-category-title-wrap p-relative mb-70">  
               <div class="it-category-shape d-none d-xl-block">
                  <img src="assets/img/category/shape-1.png" alt="">
               </div>             
               <div class="row align-items-end">
                  <div class="col-xl-8 col-lg-8">
                     <div class="it-category-title-box">
                        <span class="it-section-subtitle">LAYANAN</span>
                        <h4 class="it-section-title">Silahkan Pilih Layanan
                        </h4>
                     </div>
                  </div>
                 
               </div>
            </div>
            <div class="row">
               
               <div class="col-xl-3 col-lg-3 col-md-6 mb-30">
               <a href="/layanan-informasi">
                  <div class="it-category-item text-center">
                     <div class="it-category-icon">
                        <span>
                           <i class="fa fa-info"></i>
                        </span>
                     </div>
                     <div class="it-category-text">
                        <h4 class="it-category-title"><br>Layanan <br>Informasi</h4>
                         <br>Pilih Layanan
                        <span>
                           <svg width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M10.334 1.01807L15.0007 6.61807L10.334 12.2181" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                              <path d="M1 6.61816H15" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                           </svg> 
                        </span>                             
                     </div>
                  </div>
                  </a>
               </div>
               <div class="col-xl-3 col-lg-3 col-md-6 mb-30">
               <a href="/layanan-pengujian">
                  <div class="it-category-item text-center">
                     <div class="it-category-icon">
                        <span>
                           <i class="fa fa-flask"></i>
                        </span>
                     </div>
                     <div class="it-category-text">
                        <h4 class="it-category-title"><br>Layanan <br>Pengujian</h4>
                        <br>Pilih Layanan
                        <span>
                           <svg width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M10.334 1.01807L15.0007 6.61807L10.334 12.2181" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                              <path d="M1 6.61816H15" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                           </svg> 
                        </span>                             
                     </div>
                  </div>
                  </a>
               </div>
               <div class="col-xl-3 col-lg-3 col-md-6 mb-30">
               <a href="/layanan-sertifikasi">
                  <div class="it-category-item text-center">
                     <div class="it-category-icon">
                        <span>
                           <i class="fa fa-certificate"></i>
                        </span>
                     </div>
                     <div class="it-category-text">
                        <h4 class="it-category-title"><br>Layanan <br>Sertifikasi</h4>
                        <br>Pilih Layanan
                           <span>
                              <svg width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M10.334 1.01807L15.0007 6.61807L10.334 12.2181" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                 <path d="M1 6.61816H15" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                              </svg> 
                           </span>                             
                     </div>
                  </div>
               </a>
               </div>
               <div class="col-xl-3 col-lg-3 col-md-6 mb-30">
               <a href="/layanan-lainnya">
                  <div class="it-category-item text-center">
                     <div class="it-category-icon">
                        <span>
                           <i class="fa fa-globe"></i>
                        </span>
                     </div>
                     <div class="it-category-text">
                        <h4 class="it-category-title"><br>Layanan <br>Lainnya</h4>
                        <br>Pilih Layanan
                        <span>
                           <svg width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M10.334 1.01807L15.0007 6.61807L10.334 12.2181" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                              <path d="M1 6.61816H15" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                           </svg> 
                        </span>                             
                     </div>
                  </div>
                  </a>
               </div>
               <!-- <div class="col-xl-3 col-lg-3 col-md-6 mb-30">
               <a href="/layanan-sertifikasi-ot">
                  <div class="it-category-item text-center">
                     <div class="it-category-icon">
                        <span>
                           <i class="fa fa-certificate"></i>
                        </span>
                     </div>
                     <div class="it-category-text">
                     <h4 class="it-category-title">Sertifikasi Obat Tradisional (CPOTB)</h4>
                        Pilih Layanan
                        <span>
                           <svg width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M10.334 1.01807L15.0007 6.61807L10.334 12.2181" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                              <path d="M1 6.61816H15" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                           </svg> 
                        </span>                             
                     </div>
                  </div>
               </a>
               </div>
               <div class="col-xl-3 col-lg-3 col-md-6 mb-30">
               <a href="/layanan-sertifikasi-kosmetik">
                  <div class="it-category-item text-center">
                     <div class="it-category-icon">
                        <span>
                           <i class="fa fa-certificate"></i>
                        </span>
                     </div>
                     <div class="it-category-text">
                        <h4 class="it-category-title">Sertifikasi Kosmetik (CPKB)</h4>
                        Pilih Layanan
                           <span>
                              <svg width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M10.334 1.01807L15.0007 6.61807L10.334 12.2181" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                 <path d="M1 6.61816H15" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                              </svg> 
                           </span>                             
                     </div>
                  </div>
               </a>
               </div>
               <div class="col-xl-3 col-lg-3 col-md-6 mb-30">
               <a href="/notifikasi-kosmetik">
                  <div class="it-category-item text-center">
                     <div class="it-category-icon">
                        <span>
                           <i class="fa fa-id-card"></i>
                        </span>
                     </div>
                     <div class="it-category-text">
                        <h4 class="it-category-title">Notifikasi <br>Kosmetik</h4>
                        Pilih Layanan
                        <span>
                           <svg width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M10.334 1.01807L15.0007 6.61807L10.334 12.2181" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                              <path d="M1 6.61816H15" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                           </svg> 
                        </span>                             
                     </div>
                  </div>
               </a>
               </div>
               <div class="col-xl-3 col-lg-3 col-md-6 mb-30">
               <a href="/izin-pangan-olahan">
                  <div class="it-category-item text-center">
                     <div class="it-category-icon">
                        <span>
                           <i class="fa fa-cutlery"></i>
                        </span>
                     </div>
                     <div class="it-category-text">
                        <h4 class="it-category-title">Izin Pangan Olahan(CPPOB)</h4>
                        Pilih Layanan
                           <span>
                              <svg width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M10.334 1.01807L15.0007 6.61807L10.334 12.2181" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                 <path d="M1 6.61816H15" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                              </svg> 
                           </span>                             
                     </div>
                  </div>
               </a>
               </div> -->
              <br>
           
           
            </div>
         </div>
      </div>
      <!-- category-area-end -->

  

       <!-- team-area-start -->
      <!-- <div id="survey" class="it-team-3-area it-team-3-style-2 p-relative grey-bg z-index pb-90">-->
      <!--   <div class="container">-->
      <!--      <div class="row">-->
      <!--         <div class="col-xl-12">-->
      <!--            <div class="it-testimonial-5-title-box text-center mb-60" style="margin-top: 90px;">-->
      <!--               <span class="it-section-subtitle">SURVEY</span>-->
      <!--               <h4 class="it-section-title-5">Silakan mengisi survey petugas pelayanan </h4>-->
      <!--            </div>-->
      <!--         </div>-->
      <!--      </div>-->
      <!--      <div class="row">-->
               
      <!--         <div class="col-xl-3 col-lg-4 col-md-6 mb-30">-->
      <!--            <a href="/kurang-puas">-->
      <!--            <div class="it-team-3-item text-center">-->
      <!--               <div class="it-team-3-thumb fix">-->
      <!--                  <img src="{{asset('vendor/img/team/1.png')}}" alt="">-->
      <!--               </div>-->
      <!--               <div class="it-team-3-content">-->
      <!--                  <div class="it-team-3-social-box p-relative">-->
      <!--                     <button>-->
      <!--                        <i class="fa-light fa-share-nodes"></i>-->
      <!--                     </button>-->
      <!--                  </div>-->
      <!--                  <div class="it-team-3-author-box">-->
      <!--                     <h4 class="it-team-3-title"><a href="#">Kurang Puas</a></h4>-->
      <!--                  </div>-->
      <!--               </div>-->
      <!--            </div>-->
      <!--            </a>-->
      <!--         </div>-->
               
               
      <!--         <div class="col-xl-3 col-lg-4 col-md-6 mb-30">-->
      <!--            <a href="/cukup-puas">-->
      <!--            <div class="it-team-3-item text-center">-->
      <!--               <div class="it-team-3-thumb fix">-->
      <!--                  <img src="{{asset('vendor/img/team/2.png')}}" alt="">-->
      <!--               </div>-->
      <!--               <div class="it-team-3-content">-->
      <!--                  <div class="it-team-3-social-box p-relative">-->
      <!--                     <button>-->
      <!--                        <i class="fa-light fa-share-nodes"></i>-->
      <!--                     </button>-->
                          
      <!--                  </div>-->
      <!--                  <div class="it-team-3-author-box">-->
      <!--                     <h4 class="it-team-3-title"><a href="#">Cukup Puas</a></h4>-->
      <!--                  </div>-->
      <!--               </div>-->
      <!--            </div>-->
      <!--            </a>-->
      <!--         </div>-->
               
               
      <!--         <div class="col-xl-3 col-lg-4 col-md-6 mb-30">-->
      <!--            <a href="/puas">-->
      <!--            <div class="it-team-3-item text-center">-->
      <!--               <div class="it-team-3-thumb fix">-->
      <!--                  <img src="{{asset('vendor/img/team/3.png')}}" alt="">-->
      <!--               </div>-->
      <!--               <div class="it-team-3-content">-->
      <!--                  <div class="it-team-3-social-box p-relative">-->
      <!--                     <button>-->
      <!--                        <i class="fa-light fa-share-nodes"></i>-->
      <!--                     </button>-->
                          
      <!--                  </div>-->
      <!--                  <div class="it-team-3-author-box">-->
      <!--                     <h4 class="it-team-3-title"><a href="#">Puas</a></h4>-->
                           
      <!--                  </div>-->
      <!--               </div>-->
      <!--            </div>-->
      <!--            </a>-->
      <!--         </div>-->
               
               
      <!--         <div class="col-xl-3 col-lg-4 col-md-6 mb-30">-->
      <!--            <a href="/sangat-puas">-->
      <!--            <div class="it-team-3-item text-center">-->
      <!--               <div class="it-team-3-thumb fix">-->
      <!--                  <img src="{{asset('vendor/img/team/4.png')}}" alt="">-->
      <!--               </div>-->
      <!--               <div class="it-team-3-content">-->
      <!--                  <div class="it-team-3-social-box p-relative">-->
      <!--                     <button>-->
      <!--                        <i class="fa-light fa-share-nodes"></i>-->
      <!--                     </button>-->
                          
      <!--                  </div>-->
      <!--                  <div class="it-team-3-author-box">-->
      <!--                     <h4 class="it-team-3-title"><a href="#">Sangat Memuaskan</a></h4>-->
                           
      <!--                  </div>-->
      <!--               </div>-->
      <!--            </div> -->
      <!--            </a>-->
      <!--         </div>-->
              
      <!--      </div>-->
      <!--   </div>-->
      <!--</div>-->
      <!-- team-area-end -->

     

    



 
</x-MainDashboard>
<script>
const xValues = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];

new Chart("myChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{ 
      data: [ {{$count1}}, 
                        {{$count2}}, 
                        {{$count3}}, 
                        {{$count4}}, 
                        {{$count5}}, 
                        {{$count6}}, 
                        {{$count7}}, 
                        {{$count8}}, 
                        {{$count9}}, 
                        {{$count10}}, 
                        {{$count11}}, 
                        {{$count12}}],
      borderColor: "#186a3b",
      fill: false
    }]
  },
  options: {
    legend: {display: false}
  }
});
</script>