<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') &middot; Gazzete CMS</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link href='{!! asset("management/favicon.ico") !!}' rel="icon">
    <link href='{!! url("vendor/admin-lte/bootstrap/css/bootstrap.min.css") !!}' rel='stylesheet' type='text/css'/>
    <link href='{!! url("vendor/fontawesome/css/font-awesome.min.css") !!}' rel='stylesheet' type='text/css'/>
    <link href='{!! url("vendor/Ionicons/css/ionicons.min.css") !!}' rel='stylesheet' type='text/css'/>

    @yield('styles')

    <link href='{!! url("vendor/admin-lte/dist/css/AdminLTE.min.css") !!}' rel='stylesheet' type='text/css'/>
    <link href='{!! url("vendor/admin-lte/dist/css/skins/skin-blue.min.css") !!}' rel='stylesheet' type='text/css'/>

    <!--[if lt IE 9]>
    <script src='{!! url("vendor/html5shiv/dist/html5shiv.min.js") !!}'></script>
    <script src='{!! url("vendor/respond/dest/respond.min.js") !!}'></script><![endif]-->

</head>

<body class="skin-blue sidebar-mini">

<div class="wrapper">

    @include('management.layouts.master._header')

    @include('management.layouts.master._main_sidebar')

    <div class="content-wrapper">

        <section class="content-header">

            @include('flash::message')

            @yield('content-header')

        </section>

        <section class="content">

            @yield('content')

        </section>

    </div>

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 0.1.0
        </div>
        <strong>Copyright &copy; {!! date('Y') !!}
            <a href="https://github.com/Hub-IT/gazzete">Gazzete</a>.</strong> MIT License.
    </footer>

</div>

<script src='{!! url("vendor/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js") !!}'></script>
<script src='{!! url("vendor/admin-lte/bootstrap/js/bootstrap.min.js") !!}'></script>
<script src='{!! url("vendor/admin-lte/plugins/slimScroll/jquery.slimscroll.min.js") !!}'></script>
<script src='{!! url("vendor/admin-lte/plugins/fastclick/fastclick.min.js") !!}'></script>
<script src='{!! url("vendor/admin-lte/dist/js/app.min.js") !!}'></script>
@yield('scripts')
@yield('inline-scripts')
</body>
</html>