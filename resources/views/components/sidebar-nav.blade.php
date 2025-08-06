<!--APP-SIDEBAR-->
<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
        <div class="app-sidebar ">
            <div class="side-header">
                <a class="header-brand1" href="/home">
                    <img src="{{ asset('vendor/images/brand/logo.png')}}" class="header-brand-img desktop-logo" alt="logo">
                    <img src="{{ asset('vendor/images/brand/logo-1.png')}}" class="header-brand-img toggle-logo"
                        alt="logo">
                    <img src="{{ asset('vendor/images/brand/logo-2.png')}}" class="header-brand-img light-logo" alt="logo">
                    <img src="{{ asset('vendor/images/brand/logo-3.png')}}" class="header-brand-img light-logo1"
                        alt="logo">
                </a>
                <!-- LOGO -->
            </div>
            <div class="main-sidemenu">
                <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg"
                        fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                    </svg></div>
                    @if(Auth::user()->id == 225 )
                <ul class="side-menu">
                    <li class="sub-category">
                        <h3>Main</h3>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="/home"><i
                                class="side-menu__icon fe fe-home"></i><span
                                class="side-menu__label">Dashboard</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="/sudoku"><i
                                class="side-menu__icon fa fa-th-large"></i><span
                                class="side-menu__label">Sudoku</span></a>
                    </li>
                </ul>
                @else
                <ul class="side-menu">
                    <li class="sub-category">
                        <h3>Main</h3>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="/home"><i
                                class="side-menu__icon fe fe-home"></i><span
                                class="side-menu__label">Dashboard</span></a>
                    </li>
                    <li class="sub-category">
                        <h3>User menu</h3>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="/userl"><i
                                class="side-menu__icon fa fa-users"></i><span
                                class="side-menu__label">User List</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                class="side-menu__icon fa fa-spinner"></i><span
                                class="side-menu__label">BBPOM Melayani</span><i
                                class="angle fe fe-chevron-right"></i></a>
                        <ul class="slide-menu">
                            <li><a href="/siyapp" class="slide-item">SIYAPP</a></li>
                            <li><a href="/sinonim" class="slide-item">SINONIM</a></li>
                            <li><a href="/sudoku" class="slide-item">SUDOKU</a></li>
                            <li><a href="/sappaiadmin" class="slide-item">SAPPAI</a></li>
                            
                        </ul>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                class="side-menu__icon fa fa-spinner"></i><span
                                class="side-menu__label">SDM</span><i
                                class="angle fe fe-chevron-right"></i></a>
                        <ul class="slide-menu">
                            <li><a href="/siikma" class="slide-item">SIIKMA</a></li>
                            <li><a href="/adaja" class="slide-item">ADAJA</a></li>
                            <li><a href="/smile" class="slide-item">SMILE</a></li>
                        </ul>
                    </li>
                    <!--<li class="slide">-->
                    <!--    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i-->
                    <!--            class="side-menu__icon fa fa-spinner"></i><span-->
                    <!--            class="side-menu__label">Akuntabilitas</span><i-->
                    <!--            class="angle fe fe-chevron-right"></i></a>-->
                    <!--    <ul class="slide-menu">-->
                    <!--        <li><a  class="slide-item">AKN 1</a></li>-->
                    <!--        <li><a  class="slide-item">AKN 2</a></li>-->
                    <!--    </ul>-->
                    <!--</li>-->
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                class="side-menu__icon fa fa-spinner"></i><span
                                class="side-menu__label">Pelayanan Publik</span><i
                                class="angle fe fe-chevron-right"></i></a>
                        <ul class="slide-menu">
                            <li><a href="/ulpk" class="slide-item">SEPPULO</a></li>
                        </ul>
                       
                        <ul class="slide-menu">
                            <li><a href="/sipintar-v1" class="slide-item">SIPINTAR</a></li>
                        </ul>
                         <ul class="slide-menu">
                            <li><a href="/info-pom" class="slide-item">INFOPOM</a></li>
                        </ul>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="/online-sppd"><i
                                class="side-menu__icon fa fa-globe"></i><span
                                class="side-menu__label">Online SPPD</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="/bmn"><i
                                class="side-menu__icon fa fa-suitcase"></i><span
                                class="side-menu__label">BMN Moments</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="/berakhlak"><i
                                class="side-menu__icon fa fa-university"></i><span
                                class="side-menu__label">BerAKHLAK</span></a>
                    </li>
                     @if(checkPermission(['admin','superadmin']))
                    <li class="sub-category">
                        <h3>Admin menu</h3>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="/sppd-view-admin"><i
                                class="side-menu__icon fa fa-globe"></i><span
                                class="side-menu__label">Online SPPD Admin</span></a>
                    </li>
                    @endif
                    @if(checkPermission(['perlengkapan','superadmin']))
                    <li class="sub-category">
                        <h3>Admin BMN menu</h3>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="/bmn/admin/daftar-barang"><i
                                class="side-menu__icon fa fa-cube"></i><span
                                class="side-menu__label">Daftar Barang BMN</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="/bmn/admin/daftar-ruangan"><i
                                class="side-menu__icon fa fa-home"></i><span
                                class="side-menu__label">Daftar Ruangan</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="/bmn/admin/daftar-kendaraan"><i
                                class="side-menu__icon fa fa-car"></i><span
                                class="side-menu__label">Daftar Kendaraan</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="/bmn/admin/daftar-driver"><i
                                class="side-menu__icon fa fa-id-card"></i><span
                                class="side-menu__label">Daftar Driver Kantor</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="/bmn/admin/daftar-aula"><i
                                class="side-menu__icon fa fa-university"></i><span
                                class="side-menu__label">Daftar AULA</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="/bmn/admin/peminjaman-kendaraan"><i
                                class="side-menu__icon fa fa-exchange"></i><span
                                class="side-menu__label">Peminjaman Kendaraan</span></a>
                    </li>
                     <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="/bmn/admin/peminjaman-aula"><i
                                class="side-menu__icon fa fa-exchange"></i><span
                                class="side-menu__label">Peminjaman AULA</span></a>
                    </li>
                     <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="/bmn/admin/pinjam-non-bast"><i
                                class="side-menu__icon fa fa-exchange"></i><span
                                class="side-menu__label">Peminjaman Barang</span></a>
                    </li>
                    @endif
                    @if(checkPermission(['superadmin']))
                    <li class="sub-category">
                        <h3>Admin menu</h3>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="/filemanager"><i
                                class="side-menu__icon fa fa-folder-open"></i><span
                                class="side-menu__label">File Manager</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="/serambi"><i
                                class="side-menu__icon fa fa-cubes"></i><span
                                class="side-menu__label">SERAMBI</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                class="side-menu__icon fa fa-pencil-square-o"></i><span
                                class="side-menu__label">Post</span><i
                                class="angle fe fe-chevron-right"></i></a>
                        <ul class="slide-menu">
                            <li><a href="{{ route('posts.create') }}" class="slide-item">Post</a></li>
                            <li><a href="{{route('posts.index')}}" class="slide-item">Post View</a></li>
                            <li><a href="{{route('posts.trash')}}" class="slide-item">Post Trash</a></li>
                            
                        </ul>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                class="side-menu__icon fa fa-list-ul"></i><span
                                class="side-menu__label">Categories</span><i
                                class="angle fe fe-chevron-right"></i></a>
                        <ul class="slide-menu">
                            <li><a href="/categories" class="slide-item">Category View</a></li>
                            <li><a href="/catinput" class="slide-item">Category Iinput</a></li>
                        </ul>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                class="side-menu__icon fa fa-tags"></i><span
                                class="side-menu__label">Tags</span><i
                                class="angle fe fe-chevron-right"></i></a>
                        <ul class="slide-menu">
                            <li><a href="/tags" class="slide-item">Tags View</a></li>
                            <li><a href="/taginput" class="slide-item">Tags Iinput</a></li>
                        </ul>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                class="side-menu__icon fe fe-user"></i><span
                                class="side-menu__label">Users</span><i
                                class="angle fe fe-chevron-right"></i></a>
                        <ul class="slide-menu">
                            <li><a href="/userv" class="slide-item">User view</a></li>
                            <li><a href="/useri" class="slide-item">User Input</a></li>
                       
                        </ul>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="/logview"><i
                                class="side-menu__icon fa fa-universal-access"></i><span
                                class="side-menu__label">Log Aktivitas</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                class="side-menu__icon fa fa-puzzle-piece"></i><span
                                class="side-menu__label">Ekstensi</span><i
                                class="angle fe fe-chevron-right"></i></a>
                        <ul class="slide-menu">
                            <li><a href="/latar" class="slide-item">Latar Belakang</a></li>
                            <li><a href="/vm" class="slide-item">Visi Misi</a></li>
                            <li><a href="/tf" class="slide-item">Tugas dan Fungsi</a></li>
                            <li><a href="/so" class="slide-item">Struktur Organisasi</a></li>
                        </ul>
                    </li>
                    @endif
                </ul>
                @endif
                <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                        width="24" height="24" viewBox="0 0 24 24">
                        <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                    </svg></div>
            </div>
        </div>
        <!--/APP-SIDEBAR-->
    </div>
</div>