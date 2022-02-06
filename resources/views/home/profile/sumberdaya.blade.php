@extends('home.layout')

@section('content')
<!-- ======= Team Section ======= -->
    <section id="team" class="team">

        <div class="container mt-5" data-aos="fade-up">

        <header class="section-header">
            <h2>Sumber Daya</h2>
            <p>Sumber Daya Kami</p>
        </header>
        @foreach($member as $data)
            @if($data->level_id == 1)
                <div class="row justify-content-center mb-3">
                    <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="400">
                        <div class="member">
                            <div class="member-img">
                                <img src="{{asset('storage/Member/'. $data->img)}}" class="img-fluid" alt="">
                            </div>
                            <div class="member-info">
                                <h4>{{$data->fullname}}</h4>
                                <span>{{$data->level_id}}</span>
                                <p>{{$data->email}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach

        </div>

    </section>
<!-- End Team Section -->
@endsection