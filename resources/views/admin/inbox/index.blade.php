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
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Inbox</li>
            </ol>
        </div>
        </div>
    </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                <div class="col-12">
        
                    <div class="card">
                    <div class="card-header">
                        <div class="bs-example">
                            <h3 class="card-title">Inbox</h3>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>E-mail</th>
                                <th>Nomor Telepon</th>
                                <th>Subject</th>
                                <th>Isi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inbox as $data)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$data->fullname}}</td>
                                    <td>{{$data->email}}</td>
                                    <td>{{$data->phone_number}}</td>
                                    <td>{{$data->subject}}</td>
                                    <td>{{$data->content}}</td>
                                    <td>
                                        <a class="badge badge-danger m-1" href="{{ route('inbox.destroy', $data->uuid) }}" onclick=" return confirm('Apakah anda ingin menghapus data ini?')">
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