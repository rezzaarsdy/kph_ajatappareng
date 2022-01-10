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
            <li class="breadcrumb-item"><a href="{{route('profile.index')}}">Profile</a></li>
            <li class="breadcrumb-item active">Create</li>
            </ol>
        </div>
        </div>
    </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
            <h3 class="card-title">Profil</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
                </button>
            </div>
            </div>
            <div class="card-body">
    <form action="{{ route('profile.store') }}" method="POST" id="quickForm" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Kategori</label>
                    @error('profile_category_id') <span style="font-size: 12px; color:red; display: block;">{{ $message }}</span> @enderror
                    <select id="profile_category_id" name="profile_category_id" class="form-control select_role" onchange="tampilkan()">
                        <option value="" selected disabled hidden>Silakan Pilih</option>
                        @foreach ($kategori as $us)
                            <option value="{{ $us->id }}" @if (old('profile_category_id') == $us->id ) selected @endif>{{$us->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Content</label>
                    @error('content') <span style="font-size: 12px; color:red; display: block;">{{ $message }}</span> @enderror
                    <textarea type="name" min="0" id="content" name="content" value="{{ old ('content') }}" class="form-control"> </textarea>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        </div>
    </div>
        <div class="row">
        <div class="col-12">
            <a href="{{ route('admin.index') }}" class="btn btn-secondary">Cancel</a>
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