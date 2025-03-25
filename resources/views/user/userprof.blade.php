<x-HomeLayout>
    <!--app-content open-->
    <div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Users</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Users</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Users Profile</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->
                <div class="row" id="user-profile">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="wideget-user mb-2">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="row">
                                                        <div class="panel profile-cover">
                                                            <div class="profile-cover__action bg-img"></div>
                                                            <div class="profile-cover__img">
                                                                <div class="profile-img-1">
                                                                    <img src="{{$data['user']->image}}" alt="img">
                                                                </div>
                                                                <div class="profile-img-content text-dark text-start">
                                                                    <div class="text-dark">
                                                                        <h3 class="h3 mb-2">{{$data['user']->name}}</h3>
                                                                        <h5 class="text-muted">{{$data['user']->username}}</h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="btn-profile">
                                                                @if (Auth::user()->username != $data['user']->username)
                                                                <button class="btn btn-primary mt-1 mb-1"> <i class="fa fa-commenting-o"></i> <span>Chat {{$data['user']->name}}</span></button>
                                                                @elseif (Auth::user()->username == $data['user']->username)
                                                                <a href="/user/{{$data['user']->username}}/editprof"><button class="btn btn-primary mt-1 mb-1"> <i class="fa fa-cog"></i> <span>Edit Profile {{$data['user']->name}}</span></button>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="">
                                                            <div class="social social-profile-buttons mt-5 float-end">
                                                                <div class="mt-3">
                                                                    @if(isset($data['profile']->facebook))
                                                                    <a class="social-icon text-primary" href="{{$data['profile']->facebook}}" target="_new"><i class="fa fa-facebook"></i></a>
                                                                    @else
                                                                    <a class="social-icon text-primary" href="https://facebook.com" target="_new"><i class="fa fa-facebook"></i></a>
                                                                    @endif

                                                                    @if(isset($data['profile']->twitter))
                                                                    <a class="social-icon text-primary" href="{{$data['profile']->twitter}}" target="_new"><i class="fa fa-twitter"></i></a>
                                                                    @else
                                                                    <a class="social-icon text-primary" href="https://twitter.com" target="_new"><i class="fa fa-twitter"></i></a>
                                                                    @endif

                                                                    @if(isset($data['profile']->youtube))
                                                                    <a class="social-icon text-primary" href="{{$data['profile']->youtube}}" target="_new"><i class="fa fa-youtube"></i></a>
                                                                    @else
                                                                    <a class="social-icon text-primary" href="https://youtube.com" target="_new"><i class="fa fa-youtube"></i></a>
                                                                    @endif

                                                                    @if(isset($data['profile']->instagram))
                                                                    <a class="social-icon text-primary" href="{{$data['profile']->instagram}}"  target="_new"><i class="fa fa-instagram"></i></a>
                                                                    @else
                                                                    <a class="social-icon text-primary" href="https://instagram.com"  target="_new"><i class="fa fa-instagram"></i></a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                            <div class="card">
                                            <div class="card-header bg-primary-gradient ">
                                                <div class="card-title">Data Pegawai</div>
                                            </div>
                                            <div class="card-body">
                                                
                                                <div class="d-flex align-items-center mb-3 mt-3">
                                                    <div class="me-4 text-center text-primary">
                                                        <span><i class="fa fa-address-card fs-20"></i></span>
                                                    </div>
                                                    <div>
                                                        <strong>
                                                        @if(isset($data['profile']->nip))
                                                        NIP. : {{$data['profile']->nip}}
                                                        @else
                                                        NIP. : - 
                                                        @endif
                                                        </strong>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center mb-3 mt-3">
                                                    <div class="me-4 text-center text-primary">
                                                        <span><i class="fa fa-sitemap fs-20"></i></span>
                                                    </div>
                                                    <div>
                                                        <strong>
                                                        @if(isset($data['profile']->jabatan))
                                                        Jabatan. : {{$data['profile']->jabatan}}
                                                        @else
                                                        Jabatan. : - 
                                                        @endif
                                                        </strong>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center mb-3 mt-3">
                                                    <div class="me-4 text-center text-primary">
                                                        <span><i class="fa fa-paperclip fs-20"></i></span>
                                                    </div>
                                                    <div>
                                                        <strong>
                                                        @if(isset($data['profile']->type))
                                                        Type Pegawai : {{$data['profile']->type}}
                                                        @else
                                                        Type Pegawai : - 
                                                        @endif
                                                        </strong>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center mb-3 mt-3">
                                                    <div class="me-4 text-center text-primary">
                                                        <span><i class="fa fa-star fs-20"></i></span>
                                                    </div>
                                                    <div>
                                                        <strong>
                                                        @if(isset($data['profile']->pangkat))
                                                        Pangkat : {{$data['profile']->pangkat}}
                                                        @else
                                                        Pangkat : - 
                                                        @endif
                                                        </strong>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center mb-3 mt-3">
                                                    <div class="me-4 text-center text-primary">
                                                        <span><i class="fa fa-reorder fs-20"></i></span>
                                                    </div>
                                                    <div>
                                                        <strong>
                                                        @if(isset($data['profile']->unit))
                                                        Unit Kerja Terkecil : {{$data['profile']->unit}}
                                                        @else
                                                        Unit Kerja Terkecil : - 
                                                        @endif
                                                        </strong>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                            <!-- COL-END -->
                            </div>
                              
                            <div class="col-lg-6">
                            <div class="card">
                                            <div class="card-header  bg-primary-gradient">
                                                <div class="card-title">Tentang {{$data['user']->name}}</div>
                                            </div>
                                            <div class="card-body">
                                                
                                                <div class="d-flex align-items-center mb-3 mt-3">
                                                    <div class="me-4 text-center text-primary">
                                                        <span><i class="fe fe-briefcase fs-20"></i></span>
                                                    </div>
                                                    <div>
                                                        <strong>
                                                        @if(isset($data['profile']->alamat))
                                                        Alamat: {{$data['profile']->alamat}}
                                                        @else 
                                                        Belum ada data Alamat
                                                        @endif
                                                        </strong>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center mb-3 mt-3">
                                                    <div class="me-4 text-center text-primary">
                                                        <span><i class="fe fe-map-pin fs-20"></i></span>
                                                    </div>
                                                    <div>
                                                        <strong>
                                                        @if(isset($data['profile']->domisili))
                                                        Domisili: {{$data['profile']->domisili}}
                                                        @else 
                                                        Belum ada data domisili 
                                                        @endif
                                                        </strong>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center mb-3 mt-3">
                                                    <div class="me-4 text-center text-primary">
                                                        <span><i class="fe fe-phone fs-20"></i></span>
                                                    </div>
                                                    <div>
                                                        <strong>
                                                        @if(isset($data['profile']->telpon))
                                                        Telepon: {{$data['profile']->telpon}}
                                                        @else 
                                                        Belum ada data kontak
                                                        @endif
                                                        </strong>
                                                    </div>
                                                </div>
                                                
                                                <div class="d-flex align-items-center mb-3 mt-3">
                                                    <div class="me-4 text-center text-primary">
                                                        <span><i class="fe fe-mail fs-20"></i></span>
                                                    </div>
                                                    <div>
                                                        <strong>{{ $data['user']->email}}</strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            <!-- COL-END -->
                            </div>
                            <div class="col-lg-6">
                            <div class="card">
                                            <div class="card-header  bg-primary-gradient">
                                                <div class="card-title">Sosial Media</div>
                                            </div>
                                            <div class="card-body">
                                                
                                                <div class="d-flex align-items-center mb-3 mt-3">
                                                    <div class="me-4 text-center text-primary">
                                                        <span><i class="fa fa-facebook"></i></span>
                                                    </div>
                                                    <div>
                                                        <strong>
                                                        @if(isset($data['profile']->facebook))
                                                        <a href="{{$data['profile']->facebook}}" target="_new">{{$data['profile']->facebook}}</a>
                                                        @else 
                                                        <a href="https://facebook.com" target="_new">https://facebook.com</a>
                                                        @endif
                                                        </strong>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center mb-3 mt-3">
                                                    <div class="me-4 text-center text-primary">
                                                        <span><i class="fa fa-twitter"></i></span>
                                                    </div>
                                                    <div>
                                                        <strong>
                                                        @if(isset($data['profile']->twitter))
                                                        <a href="{{$data['profile']->twitter}}" target="_new">{{$data['profile']->twitter}}</a>
                                                        @else 
                                                        <a href="https://twitter.com" target="_new">https://twitter.com </a>
                                                        @endif
                                                        </strong>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center mb-3 mt-3">
                                                    <div class="me-4 text-center text-primary">
                                                        <span><i class="fa fa-youtube"></i></span>
                                                    </div>
                                                    <div>
                                                        <strong>
                                                        @if(isset($data['profile']->youtube))
                                                        <a href="{{$data['profile']->youtube}}" target="_new">{{$data['profile']->youtube}}</a>
                                                        @else 
                                                        <a href="https://youtube.com" target="_new">https://youtube.com</a>
                                                        @endif
                                                        </strong>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center mb-3 mt-3">
                                                    <div class="me-4 text-center text-primary">
                                                        <span><i class="fa fa-instagram"></i></span>
                                                    </div>
                                                    <div>
                                                        <strong>
                                                        @if(isset($data['profile']->instagram))
                                                        <a href="{{$data['profile']->instagram}}" target="_new">{{$data['profile']->instagram}}</a>
                                                        @else 
                                                        <a href="https://instagram.com" target="_new" >https://instagram.com</a>
                                                        @endif
                                                        </strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            <!-- COL-END -->
                            </div>
                        </div>
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

    <!-- INTERNAL SELECT2 JS -->
    <script src="{{ asset('vendor/plugins/select2/select2.full.min.js')}}"></script>

    <!-- DATA TABLE JS-->
    <script src="{{ asset('vendor/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('vendor/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
    <script src="{{ asset('vendor/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('vendor/plugins/datatable/js/buttons.bootstrap5.min.js')}}"></script>
    <script src="{{ asset('vendor/plugins/datatable/js/jszip.min.js')}}"></script>
    <script src="{{ asset('vendor/plugins/datatable/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{ asset('vendor/plugins/datatable/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{ asset('vendor/plugins/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('vendor/plugins/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{ asset('vendor/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
    <script src="{{ asset('vendor/plugins/datatable/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('vendor/plugins/datatable/responsive.bootstrap5.min.js')}}"></script>
    <script src="{{ asset('vendor/js/table-data.js')}}"></script>

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