@extends('home.layout')

@section('content')
<!-- ======= Recent Posts Section ======= -->
<section id="recent-blog-posts" class="recent-blog-posts">

    <div class="container mt-5" data-aos="fade-left">

        <header class="section-header">
            <h2>Informasi</h2>
            <p>Informasi Terbaru</p>
        </header>

        <div class="row">
            <div class="col-sm-8">
                <div class="post-box shadow mb-5 bg-white rounded" data-aos="zoom-in">
                    <div class="overflow-hidden">
                        <img src="{{asset('storage/Berita/'.$berita->img)}}" class="card-img-top" alt="">
                    </div>
                    <div class="card-body">
                        <h4 class="post-title fw-bold fs-3 text-center">{{$berita->title}}</h4>
                        {!! $berita->content !!}
                        <div class="text-center mt-5">
                            <a href="#" class="text-dark mx-2 my-2">
                                <i class="bi bi-people"> {{$berita->name}} </i>
                            </a>

                            <a href="" class="text-dark mx-2 my-2">
                                <i class="bi bi-eye"> {{$berita->view}}</i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="col sm-4">
                <div class="card shadow p-3 mb-5 bg-white rounded">
                    <div class="row">
                        <h5 style="font-weight: bold" class="text-dark text-center fs-4">Cari Informasi</h5>
                        <form action="">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="search">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">Cari</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="row no-gutters">
                        <h6 style="font-weight: bold;" class="text-dark fs-5">Informasi Terpopuler</h6>
                        @foreach ($berita_populer as $item)
                            <div class="col-md-3">
                                <div class="overflow-hidder img-info-side">
                                    <img src="{{asset('storage/Berita/'.$item->img)}}" alt="" class="card-img mt-3 img-thumbnail">
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="card-body">
                                    <h6 class="post-title">
                                        <a href="{{route('berita_home.show', $item->uuid)}}" class="text-dark fs-5">
                                            {{$item->title}}
                                        </a>
                                    </h6>
                                    <p class="card-text">
                                        <small class="text-muted">{{$item->created_at->isoFormat('D MMM Y')}}</small>
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="row no-gutters">
                        <h6 style="font-weight: bold;" class="text-dark fs-5">Informasi Terbaru</h6>
                        @foreach ($berita_terbaru as $item)
                            <div class="col-md-3">
                                <div class="overflow-hidder img-info-side">
                                    <img src="{{asset('storage/Berita/'.$item->img)}}" alt="" class="card-img mt-3 img-thumbnail">
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="card-body">
                                    <h6 class="post-title">
                                        <a href="{{route('berita_home.show', $item->uuid)}}" class="text-dark fs-5">
                                            {{$item->title}}
                                        </a>
                                    </h6>
                                    <p class="card-text">
                                        <small class="text-muted">{{$item->created_at->isoFormat('D MMM Y')}}</small>
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection