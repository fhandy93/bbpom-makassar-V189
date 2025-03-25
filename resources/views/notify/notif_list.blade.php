<x-HomeLayout>
    <!--app-content open-->
    <div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
               <!-- PAGE-HEADER -->
               <div class="page-header">
                            <h1 class="page-title">Notifications List</h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Notify</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Notifications List</li>
                                </ol>
                            </div>
                        </div>
                        <!-- PAGE-HEADER END -->
               <!-- Row -->
                        <!-- Container -->
                        <div class="container">
                            <ul class="notification">
                                @foreach($notify as $item)
                                <li>
                                    <div class="notification-time">
                                        <span class="date">{{date('d M Y',strtotime($item->created_at))}}</span>
                                        <span class="time">{{date('H:m',strtotime($item->created_at))}}</span>
                                    </div>
                                    <div class="notification-icon">
                                        <a href="notif_detail/{{$item->id}}"></a>
                                    </div>
                                    <div class="notification-time-date mb-2 d-block d-md-none">
                                        <span class="date">{{date('d M Y',strtotime($item->created_at))}}</span>
                                        <span class="time">{{date('H:m',strtotime($item->created_at))}}</span>
                                    </div>
                                    <div class="notification-body">
                                        <div class="media mt-0">
                                        <div class="me-3 notifyimg  
                                            @if($item->type=='System')
                                                bg-success 
                                            @elseif($item->type=='Laporan')
                                                bg-secondary 
                                            @elseif($item->type=='User_new')
                                                bg-pink
                                            @endif    
                                            brround box-shadow-primary">
                                                @if($item->type=="System")
                                                <i class="fa fa-gears"></i>
                                                @elseif($item->type=="Laporan")
                                                <i class="fe fe-file"></i>
                                                @elseif($item->type=="User_new")
                                                <i class="fe fe-user-plus"></i>
                                                @endif
                                            </div>
                                            <div class="media-body ms-3 d-flex">
                                                <div class="">
                                                <a href="notif_detail/{{$item->id}}"><p class="fs-15 text-dark fw-bold mb-0">{{$item->title}}</p>
                                                    <p class="mb-0 fs-13 text-dark">{!! Str::limit( $item->desc, 30, $end='.......') !!}</p>
                                                </div>
                                                <div class="notify-time">
                                                    <p class="mb-0 text-muted fs-11">{{ Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</p>
                                                </div></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                            <div class="text-center mb-4">
                                <button class="btn ripple btn-primary w-md" hidden>Load more</button>
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