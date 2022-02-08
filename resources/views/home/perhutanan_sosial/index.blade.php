{{-- content --}}
@extends('home.layout')

@section('content')
    
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">

        <div class="container mt-4" data-aos="fade-up">

            <header class="section-header">
                <h2>Perhutanan Sosial</h2>
                    <p>{{$title}}</p>
            </header>

            <div class="row gy-4" data-aos="fade-up">
                <div class="col-lg-6">
                    
                    <h2>{{$title}} ( {{$name}} )</h2>

                    <div class="tab-content">
                        <p>
                            {!!$content!!}
                        </p>
                        <br>
                        <br>
                        <br>
                        @if($link != NULL)
                            <p>Klik Link yang ada dibawah ini untuk melihat detail peta wilayah Kelompok Tani {{$title}}</p>
                            <a href="{{ URL::to($link) }}" target="_blank">{{$title}}</a>
                        @endif
                    </div>

                </div>
                <div class="col-lg-6">
                    <img src="{{asset('home/assets/img/features.png')}}" class="img-fluid" alt="">
                </div>
            </div>

        </div>

    </section>
    <!-- End Contact Section -->
@endsection