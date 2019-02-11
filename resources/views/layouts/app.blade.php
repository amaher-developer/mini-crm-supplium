
<!DOCTYPE html>
<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('resources/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('resources/css/app.css') }}" rel="stylesheet">

    <meta name="description" content="">
    <meta name="author" content="">



    <!-- Custom styles for this template-->
    <link href="{{asset('resources/css/sb-admin.css')}}" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="{{asset('resources/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="{{asset('resources/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('resources/css/sb-admin.css')}}" rel="stylesheet">
    @if(@$lang == 'ar')
    <style>.dir_class{direction: rtl;}</style>
    @endif
</head>

<body id="page-top">

<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="{{asset('/home')}}">Mini-CRM</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">

    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">

        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle fa-fw"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">

        @guest
                <a class="dropdown-item" href="{{ route('login') }}">{{trans('global.login')}}</a>
        @else
                <a id="navbarDropdown" class="dropdown-item" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{trans('global.logout')}}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
            @endguest

            <a class="dropdown-item" href="{{preg_replace('/'.request()->segment(1).'/', 'ar', strtolower(request()->fullUrl()),1)}}">العربيه</a>
            <a class="dropdown-item" href="{{preg_replace('/'.request()->segment(1).'/', 'en', strtolower(request()->fullUrl()),1)}}">English</a>

            </div>
        </li>
    </ul>

</nav>

<div id="wrapper">

    <!-- Sidebar -->
    @guest
    @else
    @include('layouts.side-bar')
    @endguest
    <div id="content-wrapper">


        @yield('content')
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright © Your Website 2019</span>
                    <span style="padding-left: 20%;">
            <a  href="{{preg_replace('/'.request()->segment(1).'/', 'ar', strtolower(request()->fullUrl()),1)}}">العربيه</a>
            | <a  href="{{preg_replace('/'.request()->segment(1).'/', 'en', strtolower(request()->fullUrl()),1)}}">English</a>
            </span>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>



<!-- Bootstrap core JavaScript-->
<script src="{{asset('resources/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('resources/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('resources/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Page level plugin JavaScript-->
<script src="{{asset('resources/vendor/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('resources/vendor/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('resources/vendor/datatables/dataTables.bootstrap4.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('resources/js/sb-admin.min.js')}}"></script>

<!-- Demo scripts for this page-->
<script src="{{asset('resources/js/demo/datatables-demo.js')}}"></script>
<script src="{{asset('resources/js/demo/chart-area-demo.js')}}"></script>


</body>

</html>

