@extends('admin.layout')

@push('css')
    <link rel="stylesheet" href="{{URL::asset('assets/dist/css/upload-data.css')}}">
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
            <li class="breadcrumb-item"><a href="{{route('galeri.index')}}">Galeri</a></li>
            <li class="breadcrumb-item active">Tambah</li>
            </ol>
        </div>
        </div>
    </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"> Data Galeri</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('galeri.store') }}" method="POST" id="quickForm" enctype="multipart/form-data">
                        @csrf    
                        <div class="form-group" id="form1">
                            <label>Judul</label>
                            @error('title') <span style="font-size: 12px; color:red; display: block;">{{ $message }}</span> @enderror
                            <input type="name" min="0" id="title" name="title" value="{{ old ('title') }}" class="form-control" placeholder="Masukkan Judul" >
                        </div>

                        <div class="form-group">
                            <label>Deskripsi</label>
                            @error('description') <span style="font-size: 12px; color:red; display: block;">{{ $message }}</span> @enderror
                            <input type="name" min="0" id="description" name="description" value="{{ old ('description') }}" class="form-control" placeholder="Masukkan Deskripsi">
                        </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <div class="col-md-6">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Foto</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <label>Upload</label>
                    <div class="custom-file">
                        <input type="file" multiple name="file[]" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <a href="{{ route('galeri.index') }}" class="btn btn-secondary">Cancel</a>
            <input type="submit" value="Submit" class="btn btn-success float-right">
        </div>
    </div>
</form>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- batas nya content -->

@endsection

@push('javascript')
    <script src="{{ URL::asset('assets/dist/js/upload.js') }}"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script>
        $( function() {
            $( "#date" ).datepicker({
                autoclose:true,
                todayHighlight:true,
                format:'yyyy-mm-dd',
                language: 'id'
            });
        } );
    </script> --}}
@endpush 