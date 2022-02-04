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
                @foreach ($berita as $data)
                    <div class="card shadow mb-5 bg-white rounded" data-aos="zoom-in">
                        <div class="post-box">
                            <div class="post-img" style="height: 300px">
                                <img src="{{asset('storage/Berita/'.$data->img)}}" class="img-fluid" alt="">
                            </div>
                            <span class="post-date">{{$data->created_at->isoFormat('dddd, D MMMM Y')}}</span>
                            <h3 class="post-title">{{$data->title}}</h3>
                            <h6>{!! Str::limit($data->content, 50) !!}</h6>
                            <a href="{{route('berita_home.show', $data->slug)}}" class="readmore stretched-link mt-auto"></a>
                            <div >
                                <a href="#" class="text-dark mx-2 my-2">
                                    <i class="bi bi-people"> {{$data->name}} </i>
                                </a>

                                <a href="" class="text-dark mx-2 my-2">
                                    @if($data->view != 0)
                                    <i class="bi bi-eye"> {{$data->view}}</i>
                                    @else
                                    <i class="bi bi-eye"> 0</i>
                                    @endif
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
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
                                        <a href="{{route('berita_home.show', $item->slug)}}" class="text-dark fs-5">
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
                        @foreach ($berita as $item)
                            <div class="col-md-3">
                                <div class="overflow-hidder img-info-side">
                                    <img src="{{asset('storage/Berita/'.$item->img)}}" alt="" class="card-img mt-3 img-thumbnail">
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="card-body">
                                    <h6 class="post-title">
                                        <a href="{{route('berita_home.show', $item->slug)}}" class="text-dark fs-5">
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
        <div class="d-flex justify-content-center">
            {{$berita->links('pagination::bootstrap-4')}}
        </div>
    </div>
</section>
<!-- End Recent Posts Section -->
@endsection