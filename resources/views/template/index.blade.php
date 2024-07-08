<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashtreme Admin - Free Dashboard for Bootstrap 4 by Codervent</title>
    <!-- loader-->
    <link href="{{asset('assets/css/pace.min.css')}}" rel="stylesheet" />
    <script src="{{asset('assets/js/pace.min.js')}}"></script>
    <!--favicon-->
    <link rel="icon" href="{{asset('assets/images/favicon.ico')}}" type="image/x-icon">
    <!-- simplebar CSS-->
    <link href="{{asset('assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
    <!-- Bootstrap core CSS-->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <!-- animate CSS-->
    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet" type="text/css" />
    <!-- Icons CSS-->
    <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
    <!-- Sidebar CSS-->
    <link href="{{asset('assets/css/sidebar-menu.css')}}" rel="stylesheet" />
    <!-- Custom Style-->
    <link href="{{asset('assets/css/app-style.css')}}" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="bg-theme bg-theme1">

    <!-- start loader -->
    <div id="pageloader-overlay" class="visible incoming">
        <div class="loader-wrapper-outer">
            <div class="loader-wrapper-inner">
                <div class="loader"></div>
            </div>
        </div>
    </div>
    <!-- end loader -->

    <!-- Start wrapper-->
    <div id="wrapper">

        <!--Start sidebar-wrapper-->
        <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
            <div class="brand-logo">
                <a href="index.html">
                    <img src="{{asset('assets/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
                    <h5 class="logo-text">Simple Shop</h5>
                </a>
            </div>
            <ul class="sidebar-menu do-nicescrol">
                <li class="sidebar-header">MAIN NAVIGATION</li>
                <li class="{{(request()->is('/')?'active':'')}}">
                    <a href="/">
                        <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>


                <li class="{{(request()->is('customer/*')?'active':'')}}">
                    <a href="/customer/index">
                        <i class="fas fa-users"></i> <span>Data Customer</span>
                    </a>
                </li>
                <li class="{{(request()->is('product-category/*')?'active':'')}}">
                    <a href="/product-category/index">
                        <i class="fas fa-users"></i> <span>Data Category</span>
                    </a>
                </li>
                <li class="{{(request()->is('product/*')?'active':'')}}">
                    <a href="/product/index">
                        <i class="fas fa-users"></i> <span>Data Product</span>
                    </a>
                </li>
                <li class="{{(request()->is('transaction-detail/*')?'active':'')}}">
                    <a href="/transaction-detail/index">
                        <i class="fas fa-users"></i> <span>Data Transaksi</span>
                    </a>
                </li>







                <li class="sidebar-header">LABELS</li>

                <li><a href="/logout"><i class="icon-power text-info"></i> <span>Logout</span></a></li>

            </ul>

        </div>
        <!--End sidebar-wrapper-->


        <!--Start topbar header-->
        <header class="topbar-nav">
            <nav class="navbar navbar-expand fixed-top">
                <ul class="navbar-nav mr-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link toggle-menu" href="javascript:void();">
                            <i class="icon-menu menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">

                    </li>
                </ul>

                <ul class="navbar-nav align-items-center right-nav-link">


                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
                            <span class="user-profile"><img src="https://via.placeholder.com/110x110" class="img-circle" alt="user avatar"></span>
                        </a>

                    </li>
                </ul>
            </nav>
        </header>
        <!--End topbar header-->
        <div class="clearfix"></div>

        <div class="content-wrapper">
            <div class="container-fluid">

                @yield('content')

                <!--start overlay-->
                <div class="overlay toggle-menu"></div>
                <!--end overlay-->

            </div>
            <!-- End container-fluid-->

        </div><!--End content-wrapper-->
        <!--Start Back To Top Button-->
        <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
        <!--End Back To Top Button-->


        <!--End footer-->


        <!--end color switcher-->

    </div><!--End wrapper-->


    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

    <!-- simplebar js -->
    <script src="{{asset('assets/plugins/simplebar/js/simplebar.js')}}"></script>
    <!-- sidebar-menu js -->
    <script src="{{asset('assets/js/sidebar-menu.js')}}"></script>

    <!-- Custom scripts -->
    <script src="{{asset('assets/js/app-script.js')}}"></script>

</body>

</html>