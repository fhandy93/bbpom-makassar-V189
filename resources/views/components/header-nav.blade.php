<header class="main-header">
    <!-- top bar -->
    <div class="top-bar fl-wrap">
        <div class="container">
            <div class="date-holder">
                <span class="date_num"></span>
                <span class="date_mounth"></span>
                <span class="date_year"></span>
            </div>
            <div class="header_news-ticker-wrap">
                <div class="hnt_title">Hot News :</div>
                <div class="header_news-ticker fl-wrap">
                    <ul>
                        @foreach($pop as $item)
                        <li><a href="{{ route('show', $item->slug) }}">{{ $item->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="n_contr-wrap">
                    <div class="n_contr p_btn"><i class="fas fa-caret-left"></i></div>
                    <div class="n_contr n_btn"><i class="fas fa-caret-right"></i></div>
                </div>
            </div>
            <ul class="topbar-social">
                <li><a href="https://www.facebook.com/ewako.mks01" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="https://twitter.com/bpom_makassar" target="_blank"><i class="fab fa-twitter"></i></a></li>
                <li><a href="https://wa.me/085211111533" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
                <li><a href="https://www.instagram.com/bpom.makassar/?igshid=YmMyMTA2M2Y%3D" target="_blank"><i class="fab fa-instagram"></i></a></li>
                <li><a href="https://www.youtube.com/channel/UCxdQ3ws5vzdPLlcfp5DClJw" target="_blank"><i class="fab fa-youtube"></i></a></li>
            </ul>
        </div>
    </div>
    <!-- top bar end -->
    <x-MenuWelcome></x-MenuWelcome>
</header>