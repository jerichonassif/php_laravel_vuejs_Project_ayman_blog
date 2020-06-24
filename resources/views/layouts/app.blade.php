<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AymanBlog') }}</title>


    <!----->
    <!-- Bootstrap 3.3.7 -->
    {{--<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">--}}
    {{--<link href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">--}}

    <!-- Font Awesome -->
    {{--<link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">--}}
    <link href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Ionicons -->
    {{--<link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">--}}
    <link href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}" rel="stylesheet">

    <!-- Theme style -->
    {{--<link rel="stylesheet" href="dist/css/AdminLTE.min.css">--}}
    <link href="{{ asset('dist/css/AdminLTE.min.css') }}" rel="stylesheet">

    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    {{--<link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">--}}
    <link href="{{ asset('dist/css/skins/_all-skins.min.css') }}" rel="stylesheet">

    <!-- Morris chart -->
    {{--<link rel="stylesheet" href="bower_components/morris.js/morris.css">--}}
    <link href="{{ asset('bower_components/morris.js/morris.css') }}" rel="stylesheet">

    <!-- jvectormap -->
    {{--<link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">--}}
    <link href="{{ asset('bower_components/jvectormap/jquery-jvectormap.css') }}" rel="stylesheet">

    <!-- Date Picker -->
    {{--<link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">--}}
    <link href="{{ asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">

    <!-- Daterange picker -->
    {{--<link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">--}}
    <link href="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

    <!-- bootstrap wysihtml5 - text editor -->
    {{--<link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">--}}
    <link href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!----->
    <!-- Scripts -->
    <!-- development version, includes helpful console warnings -->
    {{--  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>  --}}
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    {{--<link rel="dns-prefetch" href="//fonts.gstatic.com">--}}
    {{--<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">--}}
    {{--<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">--}}
    {{--<link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">--}}
    {{--<link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">--}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<style>

</style>
<body>
<div id="app">
        @yield('content')
</div>
{{--  <script src="{{ mix('js/app.js') }}"></script>  --}}

<!-- jQuery 3 -->
{{--<script src="bower_components/jquery/dist/jquery.min.js"></script>--}}
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
{{--<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>--}}
<script src="{{ asset('bower_components/jquery-ui/jquery-ui.min.js') }}"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- Bootstrap 3.3.7 -->
{{--<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>--}}
{{--<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>--}}

<!-- Morris.js charts -->
{{--<script src="bower_components/raphael/raphael.min.js"></script>--}}
<script src="{{ asset('bower_components/raphael/raphael.min.js') }}"></script>

{{--<script src="bower_components/morris.js/morris.min.js"></script>--}}
<script src="{{ asset('bower_components/morris.js/morris.min.js') }}"></script>

<!-- Sparkline -->
{{--<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>--}}
<script src="{{ asset('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>

<!-- jvectormap -->
{{--<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>--}}
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>

{{--<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>--}}
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>

<!-- jQuery Knob Chart -->
{{--<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>--}}
<script src="{{ asset('bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>

<!-- daterangepicker -->
{{--<script src="bower_components/moment/min/moment.min.js"></script>--}}
<script src="{{ asset('bower_components/moment/min/moment.min.js') }}"></script>

{{--<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>--}}
<script src="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

<!-- datepicker -->
{{--<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>--}}
<script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>

<!-- Bootstrap WYSIHTML5 -->
{{--<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>--}}
<script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>

<!-- Slimscroll -->
{{--<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>--}}
<script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>

<!-- FastClick -->
{{--<script src="bower_components/fastclick/lib/fastclick.js"></script>--}}
{{--<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>--}}

<!-- AdminLTE App -->
{{--<script src="dist/js/adminlte.min.js"></script>--}}
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{--<script src="dist/js/pages/dashboard.js"></script>--}}
<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>

<!-- AdminLTE for demo purposes -->
{{--<script src="dist/js/demo.js"></script>--}}
<script src="{{ asset('dist/js/demo.js') }}"></script>

</body>
</html>
