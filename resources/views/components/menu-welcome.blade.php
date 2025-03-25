<div class="header-inner fl-wrap">
    <div class="container">
        <!-- logo holder  -->
        <a href="/" class="logo-holder"><img src="{{ asset('vendor/images/brand/logo5.png') }}" alt="" ></a>
        <!-- logo holder end -->
        <div class="search_btn htact show_search-btn"><i class="far fa-search"></i> <span class="header-tooltip">Search</span></div>
        <a href="/login"><div class="srf_btn htact show-reg-form"><i class="fal fa-user"></i><span class="header-tooltip">Sign In</span></div></a>
        <!-- header-search-wrap -->
        <div class="header-search-wrap novis_sarch">
            <div class="widget-inner">
                <form action="/search" method="get">
                @csrf
                    <input name="search" id="se" type="text" class="search" placeholder="Search..." value="" />
                    <button class="search-submit" id="submit_btn"><i class="fa fa-search transition"></i> </button>
                </form>
            </div>
        </div>
        <!-- header-search-wrap end -->
        
        <!-- nav-button-wrap-->
        <div class="nav-button-wrap">
            <div class="nav-button">
                <span></span><span></span><span></span>
            </div>
        </div>
        <!-- nav-button-wrap end-->
        <!--  navigation -->
        <div class="nav-holder main-menu">
            <nav>
                <ul>
                    <li><a href="/" class="act-link">Home</a></li>
                    <li><a href="/aplikasi">Aplikasi</a></li>
                    <!--<li>-->
                    <!--    <a href="#" >Aplikasi <i class="fas fa-caret-down"></i></a>-->
                        <!--second level -->
                    <!--    <ul>-->
                    <!--        <li><a href="/siyapp">SIYAPP</a></li>-->
                    <!--        <li><a href="/sinonim">SINONIM</a></li>-->
                    <!--        <li><a href="/sudoku">SUDOKU</a></li>-->
                    <!--        <li><a href="/sikama">SIKAMA</a></li>-->
                    <!--        <li><a href="/adaja">ADAJA</a></li>-->
                    <!--        <li><a href="/smile">SMILE</a></li>-->
                    <!--        <li><a target="_new" href="https://sites.google.com/d/1vbmKvC5aKFjHtDV9ihJnbb42hTGEfbWf/p/1u6syAus2Pj2RSSCRDWokXp0CrOrWkn68/edit">PEDANG PUANG BASOK</a></li>-->
                    <!--        <li><a target="_new" href="https://sites.google.com/view/dasikuka/">DASIKUKA</a></li>-->
                    <!--        <li><a target="_new" href="https://sappai.bbpom-makassar.com/">SAPPAI</a></li>-->
                    <!--    </ul>-->
                        <!--second level end-->
                    <!--</li>-->
                    <li>
                        <a href="#" >Profile<i class="fas fa-caret-down"></i></a>
                        <!--second level -->
                        <ul>
                            <li><a href="/show/latar-belakang">Latar Belakang</a></li>
                            <li><a href="/show/visi-misi">Visi Misi</a></li>
                            <li><a href="/show/tugas-dan-fungsi">Tugas Pokok</a></li>
                            <li><a href="/show/struktur-organisasi">Struktur Org.</a></li>
                            
                        </ul>
                        <!--second level end-->
                    </li>
                    <li><a href="https://sipt.pom.go.id/pihak-3/login" target="new">SIPT PIHAK KE-3</a></li>
                     <li>
                        <a href="#" >BerAKHLAK<i class="fas fa-caret-down"></i></a>
                        <!--second level -->
                        <ul style="width:200px;">
                            <li><a href="/pelayanan">Berorientasi Pelayanan (Mantap Pol)</a></li>
                            <li><a href="/akuntabel">Akuntabel (MAWAS)</a></li>
                            <li><a href="/kompeten">Kompeten (PORENA)</a></li>
                            <li><a href="/harmonis">Harmonis (SERAMBI)</a></li>
                            <li><a href="/loyal">Loyal (KUPAS)</a></li>
                            <li><a href="/adaptif">Adaptif (SIMBA)</a></li>
                            <li><a href="/kolaboratif">Kolaboratif (BOSMEN)</a></li>
                        </ul>
                        <!--second level end-->
                    </li>
                     <!--<li><a href="https://makassar.pom.go.id/frame/layanan/276" target="new">SURVEY LAYANAN PUBLIK</a></li>-->
                     <li><a href="https://sites.google.com/view/sakapommakassar/saka-pom" target="new">SAKA POM</a></li>
                    <li><a href="/all_news">BERITA</a></li>
                </ul>
            </nav>
        </div>
        <!-- navigation  end -->
    </div>
</div>