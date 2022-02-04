@extends('home.layout')

@section('content')
    {{-- Visi Misi --}}
    <section id="features" class="features">
        <div class="container mt-4" data-aos="fade-up">
            <header class="section-header">
                <h2>{{$title}}</h2>
                <p>UPT KPH Ajatappareng</p>
            </header>
            <div class="row gy-4" data-aos="fade-up">
                <div class="col-lg-6">
                    
                    <h2>{{$title}} UPT KPH Ajatappareng</h2>

                    <div class="tab-content">
                        <p>
                            {!!$profile_content!!}
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
@endsection