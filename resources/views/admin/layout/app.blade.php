<!DOCTYPE html>
<html class="loading" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Apex admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Apex admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('admin/app-assets/img/ico/favicon.png')}}">
    <link rel="shortcut icon" type="image/png" href="{{asset('admin/app-assets/img/ico/favicon-32.png')}}')}}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900%7CMontserrat:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/fonts/feather/style.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/fonts/simple-line-icons/style.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/fonts/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/perfect-scrollbar.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/prism.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/switchery.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/bootstrap-extended.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/colors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/components.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/themes/layout-dark.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/app-assets/css/plugins/switchery.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/pickadate/pickadate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/pages/dashboard1.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/datatables/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/select2.min.css')}}">
</head>
<body class="vertical-layout vertical-menu 2-columns  navbar-sticky" data-menu="vertical-menu" data-col="2-columns">
<nav class="navbar navbar-expand-lg navbar-light header-navbar navbar-fixed">
    <div class="container-fluid navbar-wrapper">
    <div class="navbar-header d-flex">
        <div class="navbar-toggle menu-toggle d-xl-none d-block float-left align-items-center justify-content-center" data-toggle="collapse"><i class="ft-menu font-medium-3"></i></div>
        <ul class="navbar-nav">
        <li class="nav-item mr-2 d-none d-lg-block"><a class="nav-link apptogglefullscreen" id="navbar-fullscreen" href="javascript:;"><i class="ft-maximize font-medium-3"></i></a></li>
        <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="javascript:"><i class="ft-search font-medium-3"></i></a>
            <div class="search-input">
            <div class="search-input-icon"><i class="ft-search font-medium-3"></i></div>
            <input class="input" type="text" placeholder="Explore Apex..." tabindex="0" data-search="template-search">
            <div class="search-input-close"><i class="ft-x font-medium-3"></i></div>
            <ul class="search-list"></ul>
            </div>
        </li>
        </ul>
    </div>
    <div class="navbar-container">
        <div class="collapse navbar-collapse d-block" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="dropdown nav-item mr-1"><a class="nav-link dropdown-toggle user-dropdown d-flex align-items-end" id="dropdownBasic2" href="javascript:;" data-toggle="dropdown">
                <div class="user d-md-flex d-none mr-2">{{ Auth::guard('admin')->user()->full_name }}<span class="text-right">Available</span></div><img class="avatar" src="https://www.gravatar.com/avatar/{{ md5(Auth::guard('admin')->user()->email) }}" alt="avatar" height="35" width="35"></a>
            <div class="dropdown-menu text-left dropdown-menu-right m-0 pb-0" aria-labelledby="dropdownBasic2"><a class="dropdown-item" href="{{ route('admin.logout') }}">
                <div class="d-flex align-items-center"><i class="ft-power mr-2"></i><span>Logout</span></div></a>
            </div>
            </li>
            <li class="nav-item d-none d-lg-block mr-2 mt-1"><a class="nav-link notification-sidebar-toggle" href="javascript:;"><i class="ft-align-right font-medium-3"></i></a></li>
        </ul>
        </div>
    </div>
    </div>
</nav>
<div class="wrapper">
    @include('admin.layout.sidebar')
    <div class="main-panel">
        @yield('content')
    </div>
</div>
</body>
<script src="{{asset('admin/app-assets/vendors/js/vendors.min.js')}}"></script>
<script src="{{asset('admin/app-assets/vendors/js/switchery.min.js')}}"></script>
<script src="{{asset('admin/app-assets/vendors/js/pickadate/picker.js')}}"></script>
<script src="{{asset('admin/app-assets/vendors/js/pickadate/picker.date.js')}}"></script>
<script src="{{asset('admin/app-assets/vendors/js/pickadate/picker.time.js')}}"></script>
<script src="{{asset('admin/app-assets/vendors/js/pickadate/legacy.js')}}"></script>
<script src="{{asset('admin/app-assets/js/core/app-menu.min.js')}}"></script>
<script src="{{asset('admin/app-assets/js/core/app.min.js')}}"></script>
<script src="{{asset('admin/app-assets/js/notification-sidebar.min.js')}}"></script>
<script src="{{asset('admin/app-assets/js/customizer.min.js')}}"></script>
<script src="{{asset('admin/app-assets/js/scroll-top.min.js')}}"></script>
<script src="{{asset('admin/app-assets/vendors/js/select2.full.min.js')}}"></script>
<script src="{{asset('admin/app-assets/vendors/js/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/app-assets/vendors/js/datatable/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/app-assets/vendors/js/datatable/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('admin/app-assets/vendors/js/datatable/buttons.html5.min.js')}}"></script>
<script src="{{asset('admin/app-assets/vendors/js/datatable/buttons.print.min.js')}}"></script>
<script src="{{asset('admin/app-assets/vendors/js/datatable/jszip.min.js')}}"></script>
<script src="{{asset('admin/app-assets/vendors/js/datatable/pdfmake.min.js')}}"></script>
<script src="{{asset('admin/app-assets/vendors/js/datatable/vfs_fonts.js')}}"></script>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(".select-multiple").select2();
    $('.datepicker').pickadate({
        format: 'dd-mm-yyyy',
    });
    function objectToParams(data){
        return Object.entries(data).map(([key, val]) => `${key}=${val}`).join('&');
    }
    $('.ckeditor').ckeditor();
</script>
@yield('footer')
  </body>
</html>
