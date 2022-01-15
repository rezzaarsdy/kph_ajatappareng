{{-- content --}}
@extends('home.layout')

@section('content')
    
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">

        <div class="container mt-4" data-aos="fade-up">

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
@endsection