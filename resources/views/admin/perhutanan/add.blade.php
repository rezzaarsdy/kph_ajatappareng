@extends('admin.layout')

@push('css')
    <link rel="stylesheet" href="{{URL::asset('assets/dist/css/upload-data.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha256-aAr2Zpq8MZ+YA/D6JtRD3xtrwpEz2IqOS+pWD/7XKIw=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha256-OFRAJNoaD8L3Br5lglV7VyLRf0itmoBzWUoM+Sji4/8=" crossorigin="anonymous"></script>
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
            <li class="breadcrumb-item"><a href="{{route('perhutanan.index')}}">Perhutanan Sosial</a></li>
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
            <h3 class="card-title">Kategori Perhutanan Sosial</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
                </button>
            </div>
            </div>
            <div class="card-body">
    <form action="{{ route('perhutanan.store') }}" method="POST" id="quickForm" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Kategori Perhutanan Sosial</label>
                    @error('perhutanan_category_id') <span style="font-size: 12px; color:red; display:block;">{{$message}}</span>@enderror
                    <select id="perhutanan_category_id" name="perhutanan_category_id" class="form-control select_role" onchange="tampilkan()">
                        <option value="" selected disabled hidden>Silakan Pilih</option>
                        @foreach ($kategori_perhutanan as $us)
                            <option value="{{ $us->id }}" @if (old('perhutanan_category_id') == $us->id ) selected @endif>{{$us->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Judul</label>
                    @error('title') <span style="font-size: 12px; color:red; display: block;">{{ $message }}</span> @enderror
                    <input type="name" min="0" id="title" name="title" value="{{ old ('title') }}" class="form-control" placeholder="Masukkan Kepanjangan" >
                </div>

                <div class="form-group" id="form1">
                    <label>Link</label>
                    @error('link') <span style="font-size: 12px; color:red; display: block;">{{ $message }}</span> @enderror
                    <input type="name" min="0" id="link" name="link" value="{{ old ('link') }}" class="form-control" placeholder="Masukkan Link Map contoh : http://www.google.com">
                </div>

                <div class="form-group">
                    <label>Content</label>
                    @error('content') <span style="font-size: 12px; color:red; display: block;">{{ $message }}</span> @enderror
                    <textarea class="form-control tinymce-editor" style="height:50px" value="{{ old('content') }}" name="content"></textarea>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        </div>
    </div>
        <div class="row">
        <div class="col-12">
            <a href="{{ route('perhutanan.index') }}" class="btn btn-secondary">Cancel</a>
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
    
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>  
    <script type="text/javascript">
        tinymce.init({
            selector: 'textarea.tinymce-editor',
            height: 100,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic underline backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
            content_css: '//www.tiny.cloud/css/codepen.min.css'
        });
    </script>

    <script>
        const title = document.querySelector('#name');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/berita/checkslug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
    </script>
@endpush 