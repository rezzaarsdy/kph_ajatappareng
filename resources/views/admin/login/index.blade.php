    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KPH Ajatappareng | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{URL::asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{URL::asset('assets/dist/css/adminlte.min.css')}}">
    <link rel="icon" href="{{URL::asset('assets/dist/img/1540276247.png')}}" sizes="32x32" />
    </head>
    <body class="hold-transition login-page">
    <div class="login-box">
    <div class="login-logo">
        <img src="{{ URL::asset('assets/dist/img/1540276247.png')}}" width="150px" height="200px" alt="">
        <br>
        <a href="{{route('login')}}"><b>KPH </b>Ajatappareng</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
        <p class="login-box-msg">Silahkan Login</p>

        <form action="{{route('admin.authenticate')}}" method="post">
            @csrf
            <div class="input-group mb-3">
                <input type="username" class="form-control" name="username" placeholder="Username">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                </div>
            <!-- /.col -->
            </div>
        </form>
    </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{URL::asset('assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{URL::asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{URL::asset('assets/dist/js/adminlte.min.js')}}"></script>
    </body>
    </html>
