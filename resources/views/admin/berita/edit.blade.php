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
            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Berita</a></li>
            <li class="breadcrumb-item active">Create</li>
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
                        <h3 class="card-title"> Data Berita</h3>
    
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('berita.upload', $berita->uuid) }}" method="POST" id="quickForm" enctype="multipart/form-data">
                            @csrf
                            @method('PUT') 
                            <div class="form-group" id="form1">
                                <label>Judul Berita</label>
                                @error('title') <span style="font-size: 12px; color:red; display: block;">{{ $message }}</span> @enderror
                                <input type="name" min="0" id="title" name="title" value="{{ $berita->title }}" class="form-control" placeholder="Masukkan Judul Berita" >
                            </div>

                            <div class="form-group">
                                <label>Kategori Berita</label>
                                @error('berita_category_id') <span style="font-size: 12px; color:red; display: block;">{{ $message }}</span> @enderror
                                <select id="berita_category_id" name="berita_category_id" class="form-control select_role">
                                    <option value="" selected disabled hidden>Silakan Pilih</option>
                                    @foreach ($category as $item)
                                        <option value="{{ $item->id }}" @if ($berita->berita_category_id == $item->id ) selected @endif>{{$item->name}}</option>
                                    @endforeach
                                </select>
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
                    <br>
                    <div class="form-group">
                        <img width="100px" height="100px" class="rounded mx-auto d-block" src="{{asset('storage/Berita/'. $berita->img)}}" alt="">
                    </div>
                    <div class="file-upload">
                        <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Ganti Foto</button>
                        <div class="image-upload-wrap">
                            <input class="file-upload-input" type='file' name="file" onchange="readURL(this);" accept="application/jpg"/>
                            <div class="drag-text">
                                <h3>Drag and drop a file or select add Image</h3>
                            </div>
                        </div>
                        <div class="file-upload-content">
                            <img class="file-upload-image" alt="your image" />
                            <div class="image-title-wrap">
                                <button type="button" onclick="removeUpload()" class="remove-image">Hapus <span class="image-title">Data</span></button>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"> Data Berita</h3>
    
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Content:</label>
                            @error('content') <span style="font-size: 12px; color:red; display: block;">{{ $message }}</span> @enderror
                            <textarea class="form-control" style="height:50px" value="{{$berita->content}}" name="content"></textarea>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
                <!-- /.card -->
            
        </div>
        <div class="row">
            <div class="col-12">
                <a href="{{ route('berita.index') }}" class="btn btn-secondary">Cancel</a>
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
@endpush 