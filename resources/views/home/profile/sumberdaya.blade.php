@extends('home.layout')

@push('css')
    <style>
        hr { display: block; height: 1px;
        border: 0; border-top: 1px solid #ff0000;
        margin: 1em 0; padding: 0; }
    </style>
@endpush

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
                    <div class="col-lg-3 col-md-6 mb-3 text-center" data-aos="fade-up" data-aos-delay="400">
                        <div class="member">
                            <div class="member-img">
                                @if($data->img != NULL)
                                    <img src="{{asset('storage/Member/'. $data->img)}}" class="img-fluid" alt="">
                                @else
                                    <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="img-fluid" alt="">
                                @endif
                            </div>
                            <div class="member-info">
                                <h4>{{$data->fullname}}</h4>
                                <h6>{{$data->nip}}</h6>
                                <hr style="display: block; height:1px; border:0; border-top: 2px solid #ff0000;">
                                <span>{{$data->jabatan}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
        
            <div class="row justify-content-center mb-3">
                @foreach($member as $data)
                    @if($data->level_id == 2 || $data->level_id == 3 || $data->level_id == 4)
                    <div class="col-lg-3 col-md-6 mb-3 text-center" data-aos="fade-up" data-aos-delay="400">
                        <div class="member">
                            <div class="member-img">
                                @if($data->img != NULL)
                                    <img src="{{asset('storage/Member/'. $data->img)}}" class="img-fluid" alt="">
                                @else
                                    <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="img-fluid" alt="">
                                @endif
                            </div>
                            <div class="member-info">
                                <h4>{{$data->fullname}}</h4>
                                <h6>{{$data->nip}}</h6>
                                <hr style="display: block; height:1px; border:0; border-top: 2px solid #ff0000;">
                                <span>{{$data->jabatan}}</span>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>

            <div class="row justify-content-center mb-3">
                @foreach($member as $data)
                    @if($data->level_id == 5 || $data->level_id == 6 || $data->level_id == 7 || $data->level_id == 8 || $data->level_id == 9 || $data->level_id == 10)
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="member aos-init aos-animate" data-aos="fade-up" data-aos-delay="400">
                            <div class="member-img img-parent overflow-hidden">
                                @if($data->img != NULL)
                                    <img src="{{asset('storage/Member/'. $data->img)}}" class="img-fluid" alt="">
                                @else
                                    <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="img-fluid" alt="">
                                @endif
                            </div>
                            <div class="member-info">
                                <h4>{{$data->fullname}}</h4>
                                <h6>{{$data->nip}}</h6>
                                <hr style="display: block; height:1px; border:0; border-top: 2px solid #ff0000;">
                                <span class="mb-3">{{$data->jabatan}}</span>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>

            <div class="row justify-content-center mb-3">
                @foreach($member as $data)
                    @if($data->level_id == 11 || $data->level_id == 12 || $data->level_id == 13 || $data->level_id == 14)
                    <div class="col-lg-3 col-md-6 mb-3 text-center" data-aos="fade-up" data-aos-delay="400">
                        <div class="member">
                            <div class="member-img">
                                @if($data->img != NULL)
                                    <img src="{{asset('storage/Member/'. $data->img)}}" class="img-fluid" alt="">
                                @else
                                    <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="img-fluid" alt="">
                                @endif
                            </div>
                            <div class="member-info">
                                <h4>{{$data->fullname}}</h4>
                                <h6>{{$data->nip}}</h6>
                                <hr style="display: block; height:1px; border:0; border-top: 2px solid #ff0000;">
                                <span>{{$data->jabatan}}</span>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>

            <div class="row justify-content-center mb-3">
                @foreach($member as $data)
                    @if($data->level_id == 15 || $data->level_id == 16 || $data->level_id == 17 || $data->level_id == 18)
                    <div class="col-lg-3 col-md-6 mb-3 text-center" data-aos="fade-up" data-aos-delay="400">
                        <div class="member">
                            <div class="member-img">
                                @if($data->img != NULL)
                                    <img src="{{asset('storage/Member/'. $data->img)}}" class="img-fluid" alt="">
                                @else
                                    <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="img-fluid" alt="">
                                @endif
                            </div>
                            <div class="member-info">
                                <h4>{{$data->fullname}}</h4>
                                <h6>{{$data->nip}}</h6>
                                <hr style="display: block; height:1px; border:0; border-top: 2px solid #ff0000;">
                                <span>{{$data->jabatan}}</span>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>

            <div class="row justify-content-center mb-3">
                @foreach($member as $data)
                    @if($data->level_id == 19 || $data->level_id == 20 || $data->level_id == 21 || $data->level_id == 22 || $data->level_id == 23 || $data->level_id == 24 || $data->level_id == 25 || $data->level_id == 26)
                    <div class="col-lg-3 col-md-6 mb-3 text-center" data-aos="fade-up" data-aos-delay="400">
                        <div class="member">
                            <div class="member-img">
                                @if($data->img != NULL)
                                    <img src="{{asset('storage/Member/'. $data->img)}}" class="img-fluid" alt="">
                                @else
                                    <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="img-fluid" alt="">
                                @endif
                            </div>
                            <div class="member-info">
                                <h4>{{$data->fullname}}</h4>
                                <h6>{{$data->nip}}</h6>
                                <hr style="display: block; height:1px; border:0; border-top: 2px solid #ff0000;">
                                <span>{{$data->jabatan}}</span>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
            
            <div class="row justify-content-center mb-3">
                @foreach($member as $data)
                    @if($data->level_id == 27)
                    <div class="col-lg-3 col-md-6 mb-3 text-center" data-aos="fade-up" data-aos-delay="400">
                        <div class="member">
                            <div class="member-img">
                                @if($data->img != NULL)
                                    <img src="{{asset('storage/Member/'. $data->img)}}" class="img-fluid" alt="">
                                @else
                                    <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="img-fluid" alt="">
                                @endif
                            </div>
                            <div class="member-info">
                                <h4>{{$data->fullname}}</h4>
                                <h6>{{$data->nip}}</h6>
                                <hr style="display: block; height:1px; border:0; border-top: 2px solid #ff0000;">
                                <span>{{$data->jabatan}}</span>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        

        </div>

    </section>
<!-- End Team Section -->
@endsection