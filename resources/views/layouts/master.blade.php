<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('pageTitle')</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/minified/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/minified/core.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/minified/components.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/minified/colors.min.css') }}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="{{ asset('assets/js/core/libraries/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('assets/js/core/libraries/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/ui/nicescroll.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/ui/drilldown.js') }}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="{{ asset('assets/js/core/app.js') }}"></script>
    <!-- /theme JS files -->

    @yield('scripts')
    @yield('notifications')
</head>

<body class="navbar-top-md-md">

<!-- Fixed navbars wrapper -->
<div class="navbar-fixed-top">

    <!-- Main navbar -->
    <div class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.html">Kabula Pharmacy Stock Control</a>

            <ul class="nav navbar-nav pull-right visible-xs-block">
                <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            </ul>
        </div>

        <div class="navbar-collapse collapse" id="navbar-mobile">
            <ul class="nav navbar-nav">

            </ul>

            <ul class="nav navbar-nav navbar-right">

                <li class="dropdown dropdown-user">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <img src="" alt="">
                        <span>{{ Auth::user()['name'] }}</span>
                        <i class="caret"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right">

                        <li><a href="#"><i class="icon-cog5"></i> Account settings</a></li>
                        <li><a href="{{ url('/logout') }}"><i class="icon-switch2"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- /main navbar -->


    <!-- Second navbar -->
    <div class="navbar navbar-default" id="navbar-second">
        <ul class="nav navbar-nav no-border visible-xs-block">
            <li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second-toggle"><i class="icon-menu7"></i></a></li>
        </ul>

        <div class="navbar-collapse collapse" id="navbar-second-toggle">
            <ul class="nav navbar-nav">
                <li><a href="{{ route('dashboard') }}"><i class="icon-display4 position-left"></i> Dashboard</a></li>
                <li><a href="{{ route('pos') }}"><i class="icon-cash4 position-left"></i> P.O.S</a></li>
                <li><a href="{{ route('stock') }}"><i class="icon-pie-chart7 position-left"></i> Stock</a></li>
                <li><a href="{{ route('orders') }}"><i class="icon-drawer-out"></i> Orders</a></li>
                <li><a href="{{ route('supplier') }}"><i class="icon-drawer-in position-left"></i> Suppliers</a></li>
                <li><a href="{{ route('reports') }}"><i class="icon-book3 position-left"></i> Reports</a></li>
                <li><a href="{{ route('users') }}"><i class="icon-users4 position-left"></i> users</a></li>
                <li><a href="{{ route('products') }}"><i class="icon-database position-left"></i> Product Database</a></li>
                <li><a href="{{ route('configuration') }}"><i class="icon-cog position-left"></i> Config</a></li>
            </ul>

        </div>
    </div>
    <!-- /second navbar -->

</div>
<!-- /fixed navbars wrapper -->


<!-- Page header -->
<div class="page-header">
    <div class="page-header-content">
        <div class="page-title">
            <h4>@yield('pageTitle')</h4>
            <div class="heading-elements">
              @yield('quick-tools')
            </div>
        </div>
    </div>
</div>
<!-- /page header -->


<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">
            @yield('content')



        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->


    <!-- Footer -->
    <div class="footer text-muted">
        &copy; 2016. <a href="#">Kabula Pharmacy Stock Control</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Macheza Dzabala</a>
    </div>
    <!-- /footer -->

</div>
<!-- /page container -->

</body>
</html>