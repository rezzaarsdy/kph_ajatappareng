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
              <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Admin</a></li>
              <li class="breadcrumb-item active">Edit</li>
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
              <h3 class="card-title">Admin</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
    <form action="{{ route('admin.update', $dataAdmin->uuid) }}" method="POST" id="quickForm" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group" id="form1">
                  <label>Nama Lengkap</label>
                  @error('name') <span style="font-size: 12px; color:red; display: block;">{{ $message }}</span> @enderror
                  <input type="name" min="0" id="name" name="name" value="{{ $dataAdmin->name }}" class="form-control" placeholder="Masukkan Nama Lengkap" >
                </div>

                <div class="form-group">
                  <label>Username</label>
                  @error('username') <span style="font-size: 12px; color:red; display: block;">{{ $message }}</span> @enderror
                  <input type="name" min="0" id="username" name="username" value="{{$dataAdmin->username }}" class="form-control" placeholder="Masukkan Username">
                </div>

                <div class="form-group">
                    <label>Role</label>
                    @error('role_id') <span style="font-size: 12px; color:red; display: block;">{{ $message }}</span> @enderror
                    <select id="role_id" name="role_id" class="form-control select_role">
                        <option value="" selected disabled hidden>Silakan Pilih Role</option>
                        @foreach ($role as $us)
                            <option value="{{ $us->id }}" @if($dataAdmin->role_id == $us->id) selected @endif>{{$us->nama}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                  <label>Password</label>
                  @error('password') <span style="font-size: 12px; color:red; display: block;">{{ $message }}</span> @enderror
                  <input type="password" min="0" id="password" name="password" class="form-control" placeholder="Masukkan Password">
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
                <img width="100px" height="100px" class="rounded mx-auto d-block" src="{{asset('storage/Profile/'. $dataAdmin->img)}}" alt="">
            </div>
            <div class="file-upload">
              <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Ganti Foto</button>
              <div class="image-upload-wrap">
                  <input class="file-upload-input" type='file' name="img" onchange="readURL(this);" accept="application/jpg"/>
                  <div class="drag-text">
                  <h3>Drag and drop a file or select add Image</h3>
                  </div>
              </div>
              <div class="file-upload-content">
                  <img class="file-upload-image" src="#" alt="your image" />
                  <div class="image-title-wrap">
                  <button type="button" onclick="removeUpload()" class="remove-image">Hapus <span class="image-title">Data</span></button>
                  </div>
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