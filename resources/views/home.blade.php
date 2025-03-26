<x-HomeLayout>
     <!--app-content open-->
     <div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Dashboard</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->
                <div class="card-header">{{ __('Welcome '). Auth::user()->name }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{ __('You are logged in!') }}<p>
                        <h5>Balla POKJA BBPOM Di Makassar</h5>
                        <div class="breadcrumb">
                        
                        </div>
                        
                    </div>
            </div>
             <!-- ROW-1 -->
             <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xl-3">
                            <div class="card overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="mt-2">
                                            <h6 class="">Visitors This Month</h6>
                                            <h2 class="mb-0 number-font">{{ count($post['post2']) }}</h2>
                                        </div>
                                        <div class="ms-auto">
                                            <div class="chart-wrapper mt-1">
                                                <canvas id="leadschart"
                                                    class="h-8 w-9 chart-dropshadow"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                        @if(count($post['post3'])==0)
                                        <span class="text-muted fs-12"><span class="text-pink"><i
                                        class="fa fa-exclamation-circle text-pink"></i> {{ count($post['post3']) }}</span>
                                        This Day</span>
                                        @else
                                        <span class="text-muted fs-12"><span class="text-pink"><i
                                        class="fe fe-arrow-up-circle text-pink"></i> {{ count($post['post3']) }}</span>
                                        This Day</span>
                                        @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xl-3">
                            <div class="card overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="mt-2">
                                            <h6 class="">Total Users</h6>
                                            <h2 class="mb-0 number-font">{{ count($post['post']) }}</h2>
                                        </div>
                                        <div class="ms-auto">
                                            <div class="chart-wrapper mt-1">
                                                <canvas id="saleschart"
                                                    class="h-8 w-9 chart-dropshadow">
                                                </canvas>
                                            </div>
                                          
                                        </div>
                                    </div>
                                    <span class="text-muted fs-12"><span class="text-secondary">
                                        @if(count($post['post1'])==0)
                                        <i class="fa fa-exclamation-circle  text-secondary"></i> 
                                        {{ count($post['post1']) }}</span>
                                        This Month</span>
                                        @else
                                        <i class="fe fe-arrow-up-circle  text-secondary"></i> 
                                        {{ count($post['post1']) }}</span>
                                        This Month</span>
                                        @endif
                                </div>
                            </div>
                        </div>
                       
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xl-3">
                            <div class="card overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="mt-2">
                                            <h6 class="">Total SIYAPP</h6>
                                            <h2 class="mb-0 number-font">{{ count($post['post4']) }}</h2>
                                        </div>
                                        <div class="ms-auto">
                                            <div class="chart-wrapper mt-1">
                                                <canvas id="profitchart"
                                                    class="h-8 w-9 chart-dropshadow"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    @if(count($post['post5'])==0)
                                    <span class="text-muted fs-12"><span class="text-green"><i
                                                class="fa fa-exclamation-circle text-green"></i> {{ count($post['post5']) }}</span>
                                        This Month</span>
                                    @else
                                    <span class="text-muted fs-12"><span class="text-green"><i
                                            class="fe fe-arrow-up-circle text-green"></i> {{ count($post['post5']) }}</span>
                                        This Month</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xl-3">
                            <div class="card overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="mt-2">
                                            <h6 class="">Total ULPK</h6>
                                            <h2 class="mb-0 number-font">{{ count($post['post6']) }}</h2>
                                        </div>
                                        <div class="ms-auto">
                                            <div class="chart-wrapper mt-1">
                                                <canvas id="costchart"
                                                    class="h-8 w-9 chart-dropshadow"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    @if(count($post['post7'])==0)
                                    <span class="text-muted fs-12"><span class="text-warning"><i
                                                class="fa fa-exclamation-circle text-warning"></i> {{count($post['post7'])}}</span>
                                        This Month</span>
                                    @else
                                    <span class="text-muted fs-12"><span class="text-warning"><i
                                                class="fe fe-arrow-up-circle text-warning"></i> {{count($post['post7'])}}</span>
                                        This Month</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ROW-1 END -->
             
            <!-- ROW-3 -->
            <div class="row" >
                 <!-- COL END -->
                <div class="col-md-12 col-xl-6">
                    <div class="card ">
                        <div class="card-body ">
                            <h4 class="card-title">NOTA DINAS Petunjuk Recovery dan Reset Password Email Coorporate</h4>
                            <p class="card-text"><a  target="_new" href="https://drive.google.com/file/d/1gljRdMwR07Cl7J8JuAmxGF5YmlDiHbTS/view?usp=sharing">Download File PDF <i class="fa fa-download"></i></a></p>
                        </div>
                    </div>
                </div>
                <!-- COL END -->
                <!-- COL END -->
                <div class="col-md-12 col-xl-6">
                    <div class="card ">
                        <div class="card-body ">
                            <h4 class="card-title">Video Tutorial Recovery dan Reset Password Email Coorporate</h4>
                            <p class="card-text"><a target="_new" href="https://drive.google.com/file/d/1nkjOT95-UFYS_XqAHRZQts3ORVBLZl3G/view?usp=share_link">Download/Streaming <i class="fa fa-download"></i></a></p>
                        </div>
                    </div>
                </div>
                
                <!-- COL END -->
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" >
                    <div class="card " >
                        <div class="card-body pb-0 bg-recentorder">
                            <h5 class="card-title " style="text-align: center;"><i class="breadcrumb-item" aria-current="page">Version: <b>{{ getVersion() }}</b></i></h5>
                            <div class="chartjs-wrapper-demo">
                                <canvas id="recentorders" class="chart-dropshadow" style="display: none;"></canvas>
                            </div>
                        </div>
                        <div id="flotback-chart" class="flot-background"></div>
                        
                    </div>
                </div>
                <!-- COL END -->
            </div>
            <!-- ROW-3 END -->
            <!-- CONTAINER CLOSED -->
        </div>
    </div>
    <!--app-content closed-->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">                
            </div>
        </div>
    </div>
<!-- JQUERY JS -->
<script src="{{ asset('vendor/js/jquery.min.js') }}"></script>

<!-- BOOTSTRAP JS -->
<script src="{{ asset('vendor/plugins/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- SPARKLINE JS-->
<script src="{{ asset('vendor/js/jquery.sparkline.min.js') }}"></script>

<!-- Sticky js -->
<script src="{{ asset('vendor/js/sticky.js') }}"></script>

<!-- CHART-CIRCLE JS-->
<script src="{{ asset('vendor/js/circle-progress.min.js') }}"></script>

<!-- PIETY CHART JS-->
<script src="{{ asset('vendor/plugins/peitychart/jquery.peity.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/peitychart/peitychart.init.js') }}"></script>

<!-- SIDEBAR JS -->
<script src="{{ asset('vendor/plugins/sidebar/sidebar.js') }}"></script>

<!-- Perfect SCROLLBAR JS-->
<script src="{{ asset('vendor/plugins/p-scroll/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('vendor/plugins/p-scroll/pscroll.js') }}"></script>
<script src="{{ asset('vendor/plugins/p-scroll/pscroll-1.js') }}"></script>

<!-- INTERNAL CHARTJS CHART JS-->
<script src="{{ asset('vendor/plugins/chart/chart.bundle.js') }}"></script>
<script src="{{ asset('vendor/plugins/chart/rounded-barchart.js') }}"></script>
<script src="{{ asset('vendor/plugins/chart/utils.js') }}"></script>

<!-- INTERNAL SELECT2 JS -->
<script src="{{ asset('vendor/plugins/select2/select2.full.min.js') }}"></script>

<!-- INTERNAL Data tables js-->
<script src="{{ asset('vendor/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
<script src="{{ asset('vendor/plugins/datatable/dataTables.responsive.min.js') }}"></script>

<!-- INTERNAL APEXCHART JS -->
<script src="{{ asset('vendor/js/apexcharts.js') }}"></script>
<script src="{{ asset('vendor/plugins/apexchart/irregular-data-series.js') }}"></script>

<!-- C3 CHART JS -->
<script src="{{ asset('vendor/plugins/charts-c3/d3.v5.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/charts-c3/c3-chart.js') }}"></script>

<!-- CHART-DONUT JS -->
<script src="{{ asset('vendor/js/charts.js') }}"></script>

<!-- CHARTJS JS -->
<script src="{{ asset('vendor/plugins/chart/Chart.bundle.js') }}"></script>
<script src="{{ asset('vendor/js/chart.js') }}"></script>

<!-- INTERNAL Flot JS -->
<script src="{{ asset('vendor/plugins/flot/jquery.flot.js') }}"></script>
<script src="{{ asset('vendor/plugins/flot/jquery.flot.fillbetween.js') }}"></script>
<script src="{{ asset('vendor/plugins/flot/chart.flot.sampledata.js') }}"></script>
<script src="{{ asset('vendor/plugins/flot/dashboard.sampledata.js') }}"></script> 

<!-- INTERNAL Vector js -->
<script src="{{ asset('vendor/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>

<!-- SIDE-MENU JS-->
<script src="{{ asset('vendor/plugins/sidemenu/sidemenu.js') }}"></script>

<!-- INTERNAL INDEX JS -->
<script src="{{ asset('vendor/js/index1.js') }}"></script>

<!-- Color Theme js -->
<script src="{{ asset('vendor/js/themeColors.js') }}"></script>

<!-- CUSTOM JS -->
<script src="{{ asset('vendor/js/custom.js') }}"></script>
</x-HomeLayout>
