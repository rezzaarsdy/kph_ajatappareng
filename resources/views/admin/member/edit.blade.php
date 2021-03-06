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
            <li class="breadcrumb-item"><a href="{{route('member.index')}}">Personil</a></li>
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
                    <h3 class="card-title"> Data Personil</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('anggota.update', $member->uuid) }}" method="POST" id="quickForm" enctype="multipart/form-data">
                        @csrf 
                        @method('PUT')   
                        <div class="form-group" id="form1">
                            <label>Nama Lengkap</label>
                            @error('fullname') <span style="font-size: 12px; color:red; display: block;">{{ $message }}</span> @enderror
                            <input type="name" min="0" id="name" name="fullname" value="{{ $member->fullname }}" class="form-control" placeholder="Masukkan Nama Lengkap" >
                        </div>

                        <div class="form-group" id="form1">
                            <label>NIP</label>
                            @error('nip') <span style="font-size: 12px; color:red; display: block;">{{ $message }}</span> @enderror
                            <input type="name" min="0" id="nip" name="nip" value="{{ $member->nip }}" class="form-control" placeholder="Masukkan NIP" >
                        </div>

                        <div class="form-group" id="form1">
                            <label>Pangkat</label>
                            @error('fullname') <span style="font-size: 12px; color:red; display: block;">{{ $message }}</span> @enderror
                            <input type="name" min="0" id="pangkat" name="pangkat" value="{{ $member->pangkat }}" class="form-control" placeholder="Masukkan Pangkat" >
                        </div>

                        <div class="form-group">
                            <label>Alamat</label>
                            @error('address') <span style="font-size: 12px; color:red; display: block;">{{ $message }}</span> @enderror
                            <input type="name" min="0" id="address" name="address" value="{{ $member->address }}" class="form-control" placeholder="Masukkan Alamat">
                        </div>

                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            @error('place_of_birth') <span style="font-size: 12px; color:red; display: block;">{{ $message }}</span> @enderror
                            <input type="name" min="0" id="place_of_birth" name="place_of_birth" value="{{ $member->place_of_birth }}" class="form-control" placeholder="Masukkan Tempat Lahir">
                        </div>
                        
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            @error('date_of_birth') <span style="font-size: 12px; color:red; display: block;">{{ $message }}</span> @enderror
                            <input type="date" min="0" id="date" name="date_of_birth" value="{{ $member->date_of_birth }}" class="form-control" placeholder="Masukkan Tanggal Lahir">
                        </div>

                        <div class="form-group">
                            <label>Agama</label>
                            @error('religion') <span style="font-size: 12px; color:red; display: block;">{{ $message }}</span> @enderror
                            <input type="name" min="0" id="religion" name="religion" value="{{ $member->religion }}" class="form-control" placeholder="Masukkan Agama">
                        </div>

                        <div class="form-group">
                            <label>E-mail</label>
                            @error('email') <span style="font-size: 12px; color:red; display: block;">{{ $message }}</span> @enderror
                            <input type="name" min="0" id="email" name="email" value="{{ $member->email }}" class="form-control" placeholder="Masukkan E-mail">
                        </div>

                        <div class="form-group">
                            <label>Pendidikan Terakhir</label>
                            @error('education') <span style="font-size: 12px; color:red; display: block;">{{ $message }}</span> @enderror
                            <input type="name" min="0" id="education" name="education" value="{{ $member->education }}" class="form-control" placeholder="Masukkan Pendidikan Terakhir">
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            @error('golongan') <span style="font-size: 12px; color:red; display: block;">{{ $message }}</span> @enderror
                            <select id="golongan" name="golongan" class="form-control select_role">
                                <option value="" selected disabled hidden>Silakan Pilih</option>
                                @if($member->golongan == "PNS")
                                    <option value="PNS" selected>PNS</option>
                                @else
                                    <option value="non-PNS">Non-PNS</option>
                                @endif
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Jabatan</label>
                            @error('level_id') <span style="font-size: 12px; color:red; display:block;">{{$message}}</span>@enderror
                            <select id="level_id" name="level_id" class="form-control select_role" onchange="tampilkan()">
                                <option value="" selected disabled hidden>Silakan Pilih</option>
                                @foreach ($kategori_jabatan as $us)
                                    <option value="{{ $us->id }}" @if ($member->level_id == $us->id ) selected @endif>{{$us->jabatan}}</option>
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
                    <img width="100px" height="100px" class="rounded mx-auto d-block" src="{{asset('storage/Member/'. $member->img)}}" alt="">
                </div>


                <div class="file-upload">
                    <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Ganti Foto</button>
                    <div class="image-upload-wrap">
                        <input class="file-upload-input" type='file' name="file" value="{{old('file')}}" onchange="readURL(this);" accept="application/jpg"/>
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
    </div>
    <div class="row">
        <div class="col-12">
            <a href="{{ route('member.index') }}" class="btn btn-secondary">Cancel</a>
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