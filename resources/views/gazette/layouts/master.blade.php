<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>@yield('title') &middot; Gazette</title>
    <meta name="description" content="Unofficial CMS for DEREE Gazette">
    <meta name="viewport" content="width=device-width">

    <link href='{!! url("gazette/favicon.ico") !!}' rel="icon">
    <link href='{!! url("vendor/bootstrap/dist/css/bootstrap.min.css") !!}' rel='stylesheet' type='text/css'/>
    <link href='{!! url("vendor/fontawesome/css/font-awesome.min.css") !!}' rel='stylesheet' type='text/css'/>
    <link href='{!! url("vendor/pnotify/src/pnotify.core.css") !!}' rel='stylesheet' type='text/css'/>
    @yield('styles')
    <link href='{!! url('gazette/css/main.css') !!}' rel='stylesheet' type='text/css'/>
    <link href='{!! url('gazette/css/app.css') !!}' rel='stylesheet' type='text/css'/>

    <!--[if lt IE 9]>
    <script src='{!! url("vendor/html5shiv/dist/html5shiv.min.js") !!}'></script><![endif]-->
    <script src='{!! url("vendor/respond/dest/respond.min.js") !!}'></script>
</head>

<body>

@yield('content')

<script src="{!! url('vendor/jquery/dist/jquery.min.js') !!}"></script>
<script src='{!! url("vendor/bootstrap/dist/js/bootstrap.min.js") !!}'></script>
<script src='{!! url("vendor/jpanelmenu/jquery.jpanelmenu-legacy.js") !!}'></script>
<script src='{!! url("vendor/fastclick/lib/fastclick.js") !!}'></script>
<script src='{!! url("vendor/pnotify/src/pnotify.core.min.js") !!}'></script>
<script src='{!! url("vendor/pnotify/src/pnotify.confirm.min.js") !!}'></script>
<script src='{!! url("gazette/js/main.js") !!}'></script>
@yield('scripts')
@include('flash::pnotify')
@yield('inline-scripts')
</body>
</html>