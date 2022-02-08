{{-- content --}}
@extends('home.layout')

@section('content')
{{-- <!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">

    <div class="container">
    <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center ">
            <h1 data-aos="fade-up text-bold">Logo</h1>
            <h2 data-aos="fade-up" data-aos-delay="400">UPT Kesatuan Pengelolaan Hutan Ajatappareng</h2>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
            <img src="{{ URL::asset('assets/dist/img/1540276247.jpg')}}" class="img-fluid" alt="">
        </div>
    </div>
    </div>

</section><!-- End Hero --> --}}

{{-- <section id="hero" class="hero d-flex align-item-center">
    <div class="container">
        <div class="row">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="">
                <div class="carousel-item active">
                    <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                        <img src="{{ URL::asset('assets/dist/img/1540276247.jpg')}}" class="img-fluid" alt="">
                    </div>
                    <div class="carousel-caption d-none d-md-block">
                        <div class="col-lg-6 d-flex flex-column justify-content-center ">
                            <h1 data-aos="fade-up text-bold">Logo</h1>
                            <h2 data-aos="fade-up" data-aos-delay="400">UPT Kesatuan Pengelolaan Hutan Ajatappareng</h2>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="..." class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="..." class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
    
</section> --}}

<section id="hero" class="hero">
    <div class="carousel slide d-flex align-items-center" id="carouselExampleCaptions" data-bs-ride="carousel">
        <div class="carousel-inner d-flex align-items-center">
            <div class="carousel-item active py-5">
                <div class="container">
                    <div class="row justify-content-between mt-5">
                        <div class="col-lg-6 d-flex flex-column justify-content-center">
                            <div class="text-center text-lg-start mx-auto aos-init aos-animate">
                                <h1 style="font-size: 30px" data-aos="fade-up text-bold">Dinas Kehutanan</h1>
                                <h1 style="font-size: 28px" data-aos="fade-up text-bold">Provinsi Sulawesi Selatan</h1>
                                <h2 data-aos="fade-up" data-aos-delay="400">UPT Kesatuan Pengelolaan Hutan Ajatappareng</h2>
                            </div>
                        </div>
                        <div class="col-lg-4 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="200">
                            <img src="{{ URL::asset('assets/dist/img/1540276247.png')}}" style="height: 350px; width: auto;" height="350" width="auto" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

<main id="main">
    {{-- Visi Misi --}}
    <section id="features" class="features">
        <div class="container" data-aos="fade-up">
            <div class="row feture-tabs" data-aos="fade-up">
                <div class="col-lg-6">
                    <header class="section-header">
                        <p>Visi dan Misi UPT KPH Ajatappareng</p>
                    </header>
                    <div class="tab-content">
                        <p>
                            @foreach ($profile as $data)
                                @if($data->profile_category_id == 1)
                                    {!!$data->content!!}
                                @endif
                            @endforeach
                        </p>
                    </div>

                </div>
                <div class="col-lg-6">
                    <img src="{{asset('home/assets/img/features.png')}}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>
    {{-- End Visi Misi --}}


    <!-- ======= Recent Posts Section ======= -->
    <section id="recent-blog-posts" class="recent-blog-posts">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
            <h2>Informasi</h2>
            <p>Informasi Terbaru</p>
            </header>

            <div class="row">
                @foreach ($berita as $data)
                    <div class="col-lg-4">
                        <div class="post-box">
                        <div class="post-img"><img src="{{asset('storage/Berita/'.$data->img)}}" class="img-fluid" alt=""></div>
                        <span class="post-date">{{$data->created_at->isoFormat('dddd, D MMMM Y')}}</span>
                        <h3 class="post-title">{{$data->title}}</h3>
                        <h6>{!! Str::limit($data->content, 40) !!}</h6>
                        <a href="{{route('berita_home.show', $data->slug)}}" class="readmore stretched-link mt-auto"><span>Selengkapnya</span><i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Recent Posts Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <h2>Galeri</h2>
                <p>Dokumentasi Kegiatan UPT KPH Ajatappareng</p>
            </header>
                <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                    @foreach ($galery as $data)
                    <div class="col-lg-4 col-md-6 portfolio-item">
                        <div class="portfolio-wrap">
                            <img src="{{asset('storage/Galeri/'. $data->img)}}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                            <h4>{{$data->title}}</h4>
                            <p>{{$data->description}}</p>
                            <div class="portfolio-links">
                                <a href="{{asset('storage/Galeri/'. $data->img)}}" data-gallery="portfolioGallery" class="portfokio-lightbox" title="App 1"><i class="bi bi-eye"></i></a>
                            </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
        </div>
    </section>
    <!-- End Portfolio Section -->



    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">

        <div class="container" data-aos="fade-up">

        <header class="section-header">
            <h2>Kontak</h2>
            <p>Kontak Kami</p>
        </header>

        <div class="row gy-4">

            <div class="col-lg-6">

            <div class="row gy-4">
                <div class="col-md-6">
                <div class="info-box">
                    <i class="bi bi-geo-alt"></i>
                    <h3>Alamat</h3>
                    <p>Jl. Sultan Hasanuddin No 95,<br>Sumpang Binangae, Kec. Barru, Kabupaten Barru,<br>Sulawesi Selatan, 90712</p>
                </div>
                </div>
                <div class="col-md-6">
                <div class="info-box">
                    <i class="bi bi-telephone"></i>
                    <h3>Telepon</h3>
                    <p> - <br> - </p>
                </div>
                </div>
                <div class="col-md-6">
                <div class="info-box">
                    <i class="bi bi-envelope"></i>
                    <h3>Email Kami</h3>
                    <p> - <br> - </p>
                </div>
                </div>
                <div class="col-md-6">
                <div class="info-box">
                    <i class="bi bi-clock"></i>
                    <h3>Jam Operasional</h3>
                    <p>Senin - Jum'at<br>07:00AM - 05:00PM</p>
                </div>
                </div>
            </div>

            </div>

            <div class="col-lg-6">
            <form action="{{route('inbox.store')}}" method="POST" id="quickForm" enctype="multipart/form-data">
                @csrf
                <div class="row gy-4">

                <div class="col-md-6">
                    <input type="text" name="fullname" class="form-control" placeholder="Nama Anda" required>
                </div>

                <div class="col-md-6 ">
                    <input type="email" class="form-control" name="email" placeholder="Email Anda" required>
                </div>

                <div class="col-md-6">
                    <input type="text" class="form-control" name="phone_number" placeholder="Nomor Telepon Anda" required>
                </div>

                <div class="col-md-6">
                    <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                </div>

                <div class="col-md-12">
                    <textarea class="form-control" name="content" rows="6" placeholder="Pesan Anda" required></textarea>
                </div>

                <div class="col-md-12 text-center">
                    <input type="submit" value="Kirim" class="btn btn-success float-right">
                </div>

                </div>
            </form>

            </div>

        </div>

        </div>

    </section>
    <!-- End Contact Section -->

</main><!-- End #main -->
@endsection
{{-- end content --}}