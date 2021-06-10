<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Prevent Crawling -->
    <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
    <meta name="base-url" content="{{ url('/') }}" />
    <!-- CSRF Token -->   
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('theme/images/favicon.ico') }}">
    <title>Users</title>
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{ asset('theme/plugins/bootstrap/css/bootstrap.min.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('theme/css/style.css') }}">
    <!-- You can change the theme colors from here -->
    <link rel="stylesheet" href="{{ asset('theme/css/colors/red-dark.css') }}">
    <!--alerts CSS -->
    <link href="{{ asset('theme/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet">
    <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet" />

</head>

<body class="fix-header card-no-border logo-center">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="app"></div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('theme/plugins/popper/popper.min.js') }}"></script>
    <script src="{{ asset('theme/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('theme/js/jquery.slimscroll.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('theme/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('theme/js/sidebarmenu.js') }}"></script>
    <!--stickey kit -->
    <script src="{{ asset('theme/plugins/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
    <script src="{{ asset('theme/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('theme/js/custom.min.js') }}"></script>

    <!-- Sweet-Alert  -->
    <script src="{{ asset('theme/plugins/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('theme/plugins/sweetalert/jquery.sweet-alert.custom.js') }}"></script>
    <script src="{{ asset('theme/js/sweet-alert.js') }}"></script>


</body>

</html>