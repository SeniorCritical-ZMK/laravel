<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('startbootstrap-sb-admin-2/vendor/bootstrap/css/bootstrap.min.css?version=1') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('startbootstrap-sb-admin-2/vendor/metisMenu/metisMenu.min.css?version=1') }}" rel="stylesheet">

    @stack('css')

    <style>
        .flat {
            border-radius: 0;
        }

        .custom-page-wrapper {
            background-color:#F8F8F8 !important;
        }

        .err {
            color: #A84442;
        }
    </style>

    <!-- Custom CSS -->
    <link href="{{ asset('startbootstrap-sb-admin-2/dist/css/sb-admin-2.css?version=1') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('startbootstrap-sb-admin-2/vendor/font-awesome/css/font-awesome.min.css?version=1') }}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            
            @include('internal::backend.layouts.header')

            @include('internal::backend.layouts.sidebar')
        </nav>

        <div id="page-wrapper" class="custom-page-wrapper">
            <div class="col-md-12 clearfix">
                @include('internal::component.alert',['type' => 'success', 'message' => session('success_message') ])
                @include('internal::component.alert',['type' => 'info', 'message' => session('info_message') ])
                @include('internal::component.alert',['type' => 'warning', 'message' => session('warning_message') ])
                @include('internal::component.alert',['type' => 'danger', 'message' => session('danger_message') ])
            </div>

            @yield('content')
            
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('startbootstrap-sb-admin-2/vendor/jquery/jquery.min.js?version=1') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('startbootstrap-sb-admin-2/vendor/bootstrap/js/bootstrap.min.js?version=1') }}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('startbootstrap-sb-admin-2/vendor/metisMenu/metisMenu.min.js?version=1') }}"></script>

    @stack('scripts')

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('startbootstrap-sb-admin-2/dist/js/sb-admin-2.js?version=1') }}"></script>

</body>

</html>
