@extends('home.layout')

@section('content')
    
<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio">
    <div class="container mt-4" data-aos="fade-up">
        <header class="section-header">
            <h2>Galeri</h2>
            <p>Dokumentasi Kegiatan UPT KPH Ajatappareng</p>
        </header>
            <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                @foreach ($galery as $data)
                    <div class="col-lg-4 col-md-6 portfolio-item">
                        <div class="portfolio-wrap">
                            @php $picture = explode('|', $data->img); @endphp
                                <img src="{{asset('storage/Galeri/'. $picture[0])}}" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <h4>{{$data->title}}</h4>
                                    <p>{{$data->description}}</p>
                                    <div class="portfolio-links">
                                        @foreach(explode('|', $data->img) as $picture)
                                        <a href="{{asset('storage/Galeri/'. $picture)}}" data-gallery="portfolioGallery" class="portfokio-lightbox" title="App 1"><i class="bi bi-eye"></i></a>
                                        @endforeach
                                    </div>
                                </div>
                        </div>
                    </div>
                @endforeach
            </div>
    </div>
</section>
<!-- End Portfolio Section -->
@endsection