<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="{{URL::asset('css/styles.css')}}">

		<!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/icons/ionicons.min.css')}}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="/plugins/summernote/summernote-bs4.min.css">
<script src="/js/application.js"></script>
</head>
<body>
<div class="login-box mt-4">
<div class="login-logo">
<a href=""><b>BenjaM</b>App</a>
</div>

<div class="card">
<div class="card-body login-card-body">
<p class="login-box-msg">Sign in</p>
        <form action="{{route('login')}}" method="post">
            @csrf
            @if(session('status'))
                <div class="alert alert-danger">{{session('status')}}</div>
            @endif
            <div class="input-group mb-3">
            <input type="email" class="form-control  @error('password') border-danger @enderror" name="email" placeholder="Email">
            <div class="input-group-append">
            <div class="input-group-text @error('password')border-danger @enderror">
            <span class="fas fa-envelope"></span>
            </div>
            </div>
            </div>
            @error('email')
                <div class="mb-3 text-danger text-sm "> 
                        {{$message}}
                </div>
            @enderror
            <div class="input-group mb-3">
            <input type="password" class="form-control @error('password') border-danger @enderror" name="password" placeholder="Password">
            <div class="input-group-append">
            <div class="input-group-text @error('password')border-danger @enderror">
            <span class="fas fa-lock "></span>
            </div>
            </div>
            </div>
              @error('password')
                <div class="mb-3 text-danger text-sm"> 
                        {{$message}}
                </div>
            @enderror
            <div class="row">
            <div class="col-8">
            <div class="icheck-primary">
            <input type="checkbox" id="remember">
            <label for="remember">
            Remember Me
            </label>
            </div>
            </div>

            <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>

            </div>
        </form>
        <div class="social-auth-links text-center mb-3">

        </div>


        <p class="mb-0">
        <a href="{{route('register')}}" class="text-center">Register a new membership</a>
        </p>
</div>

</div>
</div>
</body>
</html>