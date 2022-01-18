@extends('home.layout')

@section('content')
<!-- ======= Recent Posts Section ======= -->
<section id="recent-blog-posts" class="recent-blog-posts">

    <div class="container mt-4" data-aos="fade-up">

        <header class="section-header">
        <h2>Berita</h2>
        <p>Berita Terbaru</p>
        </header>

        <div class="row">
            @foreach ($berita as $data)
                <div class="col-lg-4">
                    <div class="post-box">
                    <div class="post-img"><img src="{{asset('storage/Berita/'.$data->img)}}" class="img-fluid" alt=""></div>
                    <span class="post-date">{{$data->created_at->isoFormat('dddd, D MMMM Y')}}</span>
                    <h3 class="post-title">{{$data->title}}</h3>
                    <a href="{{route('berita.show', $data->uuid)}}" class="readmore stretched-link mt-auto"><span>Selengkapnya</span><i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End Recent Posts Section -->
@endsection