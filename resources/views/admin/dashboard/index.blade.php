@extends('admin.layout')

@push('css')
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endpush

@section('content')

<!-- mulai disini content nya -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="card" style="width: 1300px">
            <div class="card-header">
              <strong><h1>Selamat Datang</h1></strong>
            </div>
            <div class="card-body">
              <blockquote class="blockquote mb-0">
                <p>Di Website Admin KPH Ajatappareng.</p>
              </blockquote>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$berita}}<sup style="font-size: 20px"></sup></h3>
    
                <p>Berita</p>
              </div>
              <div class="icon">
                <i class="icon ion-document"></i>
              </div>
              <a href="{{route('berita.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$galeri}}<sup style="font-size: 20px"></sup></h3>
    
                <p>Album</p>
              </div>
              <div class="icon">
                <i class="icon ion-images"></i>
              </div>
              <a href="{{route('galeri.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$member}}<sup style="font-size: 20px"></sup></h3>
    
                <p>Personil</p>
              </div>
              <div class="icon">
                <i class="icon ion-ios-people"></i>
              </div>
              <a href="{{route('member.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
      </div>
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- batas nya content -->

@stop