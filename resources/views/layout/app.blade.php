<?php
/**
 * Created by PhpStorm.
 * User: Nayem
 * Date: 08-Nov-18
 * Time: 8:32 AM
 */
?>
        <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>SellBazar</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{asset('framework/bootstrap/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('datatable/dataTables.bootstrap4.min.css')}}">


    <link rel="stylesheet" href="{{asset('framework/animate/animate.css')}}">
    <link href={{asset('framework/bootstrap4-glyphicons/css/bootstrap-glyphicons.min.css')}} rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('framework/meanmenu/meanmenu.min.css')}}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


    <!-- Custom fonts for this template -->
    <link rel="stylesheet" href="{{asset('framework/fontawesome/css/fontawesome-all.css')}}">
    <link rel="stylesheet" href="{{asset('framework/adminpro/adminpro-custon-icon.css')}}">
    <link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link rel="stylesheet" href="{{asset('framework/sb-admin.css')}}">
    <link rel="stylesheet" href="{{asset('framework/custom/style.css')}}">
    <link rel="stylesheet" href="{{asset('framework/custom/user/userStyle.css')}}">
</head>
<body class="darklayout">

<div class="wrapper">

    <div id="content">
        @include('inc.navbar')
        @yield('content')
    </div>
</div>

<!-- JavaScript Libraries -->
<script src="{{asset('framework/jquery/jquery.min.js')}}"></script>
<script src="{{asset('framework/jquery/jquery-migrate.min.js')}}"></script>
<script src="{{asset('framework/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="{{asset('framework/meanmenu/jquery.meanmenu.js')}}"></script>
<script src="{{asset('framework/chart/jquery.sparkline.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

<!-- Bootstrap core JS -->
<script src="{{asset('framework/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('framework/custom/script.js')}}"></script>
<script src="{{asset('framework/custom/user/userScript.js')}}"></script>
<script src="{{asset('datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('datatable/dataTables.bootstrap4.min.js')}}"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
</body>
</html>
