<!DOCTYPE html>
<html class="loading" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description"
        content="Apex admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Apex admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Login Page - {{env('APP_NAME')}} Panel</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('admin/app-assets/img/ico/favicon.ico')}}">
    <link rel="shortcut icon" type="image/png" href="{{asset('admin/app-assets/img/ico/favicon-32.png')}}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link
        href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900%7CMontserrat:300,400,500,600,700,800,900"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/fonts/feather/style.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/fonts/simple-line-icons/style.min.css')}}">
    <link rel="stylesheet" type="text/css"
        href="{{asset('admin/app-assets/fonts/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/perfect-scrollbar.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/prism.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/switchery.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/bootstrap-extended.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/colors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/components.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/themes/layout-dark.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/app-assets/css/plugins/switchery.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/app-assets/css/pages/authentication.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/assets/css/style.css')}}">
</head>

<body class="vertical-layout vertical-menu 1-column auth-page navbar-sticky blank-page" data-menu="vertical-menu"
    data-col="1-column">
    <div class="wrapper">
        <div class="main-panel">
            <div class="main-content">
                <div class="content-overlay"></div>
                <div class="content-wrapper">
                    <section id="login" class="auth-height">
                        <div class="row full-height-vh m-0">
                            <div class="col-12 d-flex align-items-center justify-content-center">
                                <div class="card overflow-hidden">
                                    <div class="card-content">
                                        <form method="post">
                                            @csrf
                                            <div class="card-body auth-img">
                                                <div class="row m-0">
                                                    <div
                                                        class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center auth-img-bg p-3">
                                                        <img src="{{asset('admin/app-assets/img/gallery/login.png')}}"
                                                            alt="" class="img-fluid" width="300" height="230">
                                                    </div>

                                                    <div class="col-lg-6 col-12 px-4 py-3">
                                                        <h4 class="mb-2 card-title">Login</h4>
                                                        <p>Welcome back, please login to your account.</p>
                                                        @if(count($errors) > 0 )
                                                        <div class="alert alert-danger alert-dismissible fade show"
                                                            role="alert">
                                                            <button type="button" class="close" data-dismiss="alert"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            <ul class="p-0 m-0" style="list-style: none;">
                                                                @foreach($errors->all() as $error)
                                                                <li>{{$error}}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        @endif
                                                        <input type="email" name="email" class="form-control mb-3"
                                                            placeholder="Email" value="{{ old('email') }}">
                                                        <input type="password" name="password" class="form-control mb-2"
                                                            value="{{ old('password') }}" placeholder="Password">
                                                        <div
                                                            class="d-flex justify-content-between flex-sm-row flex-column">
                                                            <input type="submit" class="btn btn-primary"
                                                                value="Login" />
                                                        </div>
                                                        <hr>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        @env('local')
                                            <x-login-link guard="admin" class="btn btn-primary" email="admin@gmail.com"  redirect-url="{{ route('admin.dashboard') }}"/>
                                        @endenv
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="{{asset('admin/app-assets/vendors/js/vendors.min.js')}}"></script>
<script src="{{asset('admin/app-assets/vendors/js/switchery.min.js')}}"></script>
<script src="{{asset('admin/app-assets/js/core/app-menu.min.js')}}"></script>
<script src="{{asset('admin/app-assets/js/core/app.min.js')}}"></script>
<script src="{{asset('admin/app-assets/js/notification-sidebar.min.js')}}"></script>
<script src="{{asset('admin/app-assets/js/customizer.min.js')}}"></script>
<script src="{{asset('admin/app-assets/js/scroll-top.min.js')}}"></script>
<script src="../assets/js/scripts.js"></script>
</body>
</html>
