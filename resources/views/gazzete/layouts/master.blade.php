<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>@yield('title') &middot; Gazzete</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <link href="{!! asset('gazzete/favicon.ico') !!}" rel="icon">

    <link href='{!! url("vendor/bootstrap/dist/css/bootstrap.min.css") !!}' rel='stylesheet' type='text/css'/>
    <link href='{!! url('vendor/fontawesome/css/font-awesome.min.css') !!}' rel='stylesheet' type='text/css'/>
    <link href='{!! url('gazzete/css/main.css') !!}' rel='stylesheet' type='text/css'/>

    <!--[if lt IE 9]>{!! url('html5shiv/dist/html5shiv.min.js') !!}<![endif]-->
    <link href='{!! url('gazzete/js/modernizr.custom.32229-2.8-respondjs-1-4-2.js') !!}' rel='stylesheet' type='text/css'/>
<body>

@include('gazzete.layouts._sidebar')

<main class="container left-container ">
    <div class="row">
        <section class="col-md-7 col-sm-12 col-md-offset-5 main-content">
            @yield('content')
        </section>
    </div>
</main>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>window.jQuery || document.write("<script src='{!! url("gazzete/jquery/dist/jquery.min.js") !!}'><\\/script>")</script>

<script src='{!! url("vendor/jpanelmenu/jquery.jpanelmenu-legacy.js") !!}'></script>
<script src='{!! url("vendor/bootstrap/dist/js/bootstrap.min.js") !!}'></script>
<script src='{!! url("vendor/fastclick/lib/fastclick.js") !!}'></script>

<script src='{!! url("gazzete/js/main.js") !!}'></script>
</body>
</html>