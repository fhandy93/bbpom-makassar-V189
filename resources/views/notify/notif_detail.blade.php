<x-HomeLayout>
    <!--app-content open-->
    <div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
               <!-- PAGE-HEADER -->
               <div class="page-header">
                            <h1 class="page-title">Notifications Details</h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Notify</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Notifications Details</li>
                                </ol>
                            </div>
                        </div>
                        <!-- PAGE-HEADER END -->
                        <!-- Row -->
                        <!-- Container -->
                        <div class="col-xl-12">
                                <div class="card">
                                   
                                    <div class="card-body">
                                        <div class="d-md-flex">
                                            
                                            <div class="me-3 notifyimg  
                                            @if($notify->type=='System')
                                                bg-success 
                                            @elseif($notify->type=='Laporan')
                                                bg-secondary 
                                            @elseif($notify->type=='User_new')
                                                bg-pink
                                            @endif    
                                            brround box-shadow-primary">
                                              
                                            <i class="fe fe-calendar"></i>
                                              
                                            </div>
                                            <div class="mt-0 mt-3 ms-1 text-muted font-weight-semibold" style="margin-right: 10px;">{{ Carbon\Carbon::parse($notify->created_at)->diffForHumans()}}</div>
                                            
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h3><a href="javascript:void(0)"> {{$notify->title}}</a></h3>
                                        <p >{!! $notify->desc !!}</p>
                                    </div>
                                </div>
                           
                               
                            </div>
                        <!-- End Container -->
                        <!-- /Row -->
            </div>
        </div>
    </div>
    <!-- CONTAINER CLOSED -->

    <!-- JQUERY JS -->
    <script src="{{ asset('vendor/js/jquery.min.js')}}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('vendor/plugins/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{ asset('vendor/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- SPARKLINE JS-->
    <script src="{{ asset('vendor/js/jquery.sparkline.min.js')}}"></script>

    <!-- CHART-CIRCLE JS-->
    <script src="{{ asset('vendor/js/circle-progress.min.js')}}"></script>

    <!-- C3 CHART JS -->
    <script src="{{ asset('vendor/plugins/charts-c3/d3.v5.min.js')}}"></script>
    <script src="{{ asset('vendor/plugins/charts-c3/c3-chart.js')}}"></script>

    <!-- INPUT MASK JS-->
    <script src="{{ asset('vendor/plugins/input-mask/jquery.mask.min.js')}}"></script>

    <!-- SIDE-MENU JS -->
    <script src="{{ asset('vendor/plugins/sidemenu/sidemenu.js')}}"></script>

    <!-- SIDEBAR JS -->
    <script src="{{ asset('vendor/plugins/sidebar/sidebar.js')}}"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{ asset('vendor/plugins/p-scroll/perfect-scrollbar.js')}}"></script>
    <script src="{{ asset('vendor/plugins/p-scroll/pscroll.js')}}"></script>
    <script src="{{ asset('vendor/plugins/p-scroll/pscroll-1.js')}}"></script>

    <!-- Color Theme js -->
    <script src="{{ asset('vendor/js/themeColors.js')}}"></script>

    <!-- Sticky js -->
    <script src="{{ asset('vendor/js/sticky.js')}}"></script>

    <!-- CUSTOM JS -->
    <script src="{{ asset('vendor/js/custom.js')}}"></script>

    <script src="{{ asset ('vendor/plugins/sweet-alert/sweetalert.min.js')}}"></script>


   
</x-HomeLayout>