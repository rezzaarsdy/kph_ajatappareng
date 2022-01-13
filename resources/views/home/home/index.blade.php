{{-- content --}}
@extends('home.layout')

@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">

    <div class="container">
    <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
            <h1 data-aos="fade-up ">Logo</h1>
            <h2 data-aos="fade-up" data-aos-delay="400">KPH Ajatappareng</h2>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
            <img src="{{ URL::asset('assets/dist/img/1540276247.jpg')}}" class="img-fluid" alt="">
        </div>
    </div>
    </div>

</section><!-- End Hero -->

<main id="main">
    {{-- Visi Misi --}}
    <section id="features" class="features">
        <div class="container" data-aos="fade-up">
            <div class="row feture-tabs" data-aos="fade-up">
                <div class="col-lg-6 text-center">
                    <h3>Visi dan Misi</h3>

                    <div class="tab-content">
                        <p class="Text Center"> Visi</p>
                        <p>
                            @foreach ($profile as $data)
                                @if($data->profile_category_id == 2)
                                    {{$data->content}}
                                @endif
                            @endforeach
                        </p>
                    </div>

                    <div class="tab-content">
                        <p class="Text Center"> Misi</p>
                        <p>
                            @foreach ($profile as $data)
                            @if($data->profile_category_id == 3)
                                {{$data->content}}
                            @endif
                        @endforeach 
                        </p>
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
            <form action="{{route('inbox.store')}}" method="post" class="php-email-form">
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
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your message has been sent. Thank you!</div>

                    <button type="submit">Send Message</button>
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