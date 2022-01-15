<!-- ======= Header ======= -->
<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

    <a href="{{route('beranda')}}" class="logo d-flex align-items-center">
        <span>KPH Ajatappareng</span>
    </a>

    <nav id="navbar" class="navbar">
        <ul>
            <li><a class="nav-link {{ (request()->routeIs('beranda')) ? 'active' : '' }}" href="{{route('beranda')}}">Beranda</a></li>
            <li class="dropdown"><a href="#"><span>Profil</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                    <li><a href="#">Visi dan Misi</a></li>
                    <li><a href="#">Tentang Kami</a></li>
                    <li><a href="#">Struktur</a></li>
                    <li><a href="#">Sumber Daya Manusia</a></li>
                </ul>
            </li>
            <li class="dropdown"><a href="#"><span>Informasi</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                    <li><a href="#">HKm</a></li>
                    <li><a href="#">HPHD</a></li>
                    <li><a href="#">HTR</a></li>
                    <li><a href="#">Perlindungan dan Pengamangan Hutan</a></li>
                    <li><a href="#">Lainnya</a></li>
                </ul>
            </li>
            <li class="dropdown"><a href="#"><span>Berita</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                    <li><a href="#">test</a></li>
                </ul>
            </li>
            <li><a class="nav-link scrollto" href="#services">Galeri</a></li>
            <li><a class="nav-link {{ (request()->routeIs('inbox.create')) ? 'active' : '' }}" href="{{route('inbox.create')}}">Kontak</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->