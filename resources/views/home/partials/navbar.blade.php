<!-- ======= Header ======= -->
<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

    <a href="{{route('beranda')}}" class="logo d-flex align-items-center">
        <span>KPH Ajatappareng</span>
    </a>

    <nav id="navbar" class="navbar">
        <ul>
            <li><a class="nav-link {{ (request()->routeIs('beranda')) ? 'active' : '' }}" href="{{route('beranda')}}">Beranda</a></li>
            <li class="dropdown"><a href="#" class=" {{ (request()->routeIs('profile_home.edit', 'profile_home.struktur', 'profile_home.sumberdaya')) ? 'active' : '' }}"><span>Profile</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                    @foreach($profile_kategori as $item)
                        <li><a href="{{route('profile_home.edit', $item->id)}}">{{$item->name}}</a></li>
                    @endforeach
                    <li><a href="{{route('profile_home.struktur')}}">Struktur Organisasi</a></li>
                    <li><a href="{{route('profile_home.sumberdaya')}}">Sumber Daya Manusia</a></li>
                </ul>
            </li>
            <li class="dropdown"><a href="#"><span>Perhutanan Sosial</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                    @foreach ($kategori_perhutanan as $item)
                        <li><a href="{{route('perhutanan_home.index', $item->slug)}}">{{$item->name}}</a></li>
                    @endforeach
                </ul>
            </li>
            <li class="dropdown"><a href="#" class=" {{ (request()->routeIs('berita_home.index', 'berita_home.edit')) ? 'active' : '' }}"><span>Informasi</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                    <li><a href="{{route('berita_home.index')}}">Semua</a></li>
                    @foreach($berita_kategori as $item)
                        <li><a href="{{route('berita_home.edit', $item->id)}}">{{$item->name}}</a></li>
                    @endforeach
                </ul>
            </li>
            <li><a class="nav-link {{ (request()->routeIs('galeri.home')) ? 'active' : '' }}" href="{{route('galeri.home')}}">Galeri</a></li>
            <li><a class="nav-link {{ (request()->routeIs('inbox.create')) ? 'active' : '' }}" href="{{route('inbox.create')}}">Kontak</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->