<x-MainDashboard>
    <!-- breadcrumb-area-start -->
    <div class="it-breadcrumb-area it-breadcrumb-bg" data-background="{{asset('vendor/img/breadcrumb/breadcrumb.png')}}">
         <div class="container">
            <div class="row ">
               <div class="col-md-12">
                  <div class="it-breadcrumb-content z-index-3 text-center">
                     <div class="it-breadcrumb-title-box"><br>
                        <h3 class="it-breadcrumb-title">Error</h3>
                     </div>
                     <div class="it-breadcrumb-list-wrap">
                        <div class="it-breadcrumb-list">
                           <span><a href="index.html">Home</a></span>
                           <span class="dvdr">//</span>
                           <span>Error</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- breadcrumb-area-end -->

      <!-- error-area-start -->
      <div class="it-error-area pt-120 pb-120">
         <div class="container">
            <div class="row align-items-center">
               <div class="col-xl-6 col-lg-6 order-1 order-lg-0">
                  <div class="it-error-content wow itfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
                     <h5 class="it-error-title">Sorry !</h5>
                     <p class="mb-35">
                        @if(isset($message))
                        {{$message}}
                        @else
                        Error Handling Database !
                        @endif
                        Please contack you'r Super Admin.<br>
                        <a href="https://wa.me/088804051010" target="_blank"><i class="fab fa-whatsapp"></i> 0888-0405-1010</a>
                     </p>
                     <a class="it-btn" href="/">
                        <span>
                           Back To Home
                           <svg width="17" height="14" viewBox="0 0 17 14" fill="none"
                              xmlns="">
                              <path d="M11 1.24023L16 7.24023L11 13.2402" stroke="currentcolor" stroke-width="1.5"
                                 stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                              <path d="M1 7.24023H16" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10"
                                 stroke-linecap="round" stroke-linejoin="round" />
                           </svg>
                        </span>
                     </a>
                  </div>
               </div>
               <div class="col-xl-6 col-lg-6 order-0 order-lg-1">
                  <div class="it-error-thumb">
                     <img src="{{asset('vendor/img/error/4.png')}}" alt="">
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- error-area-end -->
</x-MainDashboard>