@extends('home.layout')

@section('content')
    {{-- Visi Misi --}}
    <section id="features" class="features">
        <div class="container mt-5" data-aos="fade-up">
            <header class="section-header">
                <h2>Profile</h2>
                <p>Struktur Organisasi</p>
            </header>
            <div class="row feture-tabs mt-1" data-aos="fade-up">
                <img src="{{ URL::asset('assets/dist/img/bagan.jpg')}}" alt="">
            </div>
        </div>
    </section>
    {{-- End Visi Misi --}}
@endsection