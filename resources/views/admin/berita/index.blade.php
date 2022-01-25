@extends('admin.layout')

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
                    <li class="breadcrumb-item active">Berita</li>
                </ol>
            </div>
        </div>
        </div>
    <!-- /.container-fluid -->
    </section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
        <div class="col-12">

            <div class="card">
            <div class="card-header">
                <div class="bs-example">
                <h3 class="card-title">Berita</h3>
                <a href="{{route('berita.create')}}" class="btn btn-primary font-weight-bolder float-right">
                    <i class="la la-plus"></i>Tambah Data</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                    <th>No.</th>
                    <th>Judul Berita</th>
                    <th>Pengarang</th>
                    <th>Preview Gambar</th>
                    <th>View</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($berita as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$data->title}}</td>
                            <td>{{$data->name}}</td>
                            <td><img width="100px" height="100px" src="{{asset('storage/Berita/'.$data->img)}}" alt=""></td>
                            <td>{{$data->view}}</td>
                            <td>
                                <a class="badge badge-info m-1" href="{{route('berita.edit', $data->uuid)}}">
                                    <span class="fa fa-edit"></span> Edit
                                </a>
                                <a class="badge badge-danger m-1" href="{{route('berita.destroy', $data->uuid)}}" onclick=" return confirm('Apakah anda ingin menghapus data ini?')">
                                    <span class="fa fa-trash"></span> Hapus
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                
                </table>
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- batas nya content -->

@endsection