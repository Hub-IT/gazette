@extends('gazzete.layouts.master')
@section('title', 'About Us')
@section('content')
    <header class="hero-image" role="banner" style="background-image: url('{!! asset("gazzete/img/default-about.jpg") !!}');">
    <span class="menu-trigger animated fadeInDown">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
    </span>

        <noscript>
            <div class="no-js-menu">
                @include('gazzete.layouts._sidebar_options')
            </div>
        </noscript>

        <div id="menu-target">
            @include('gazzete.layouts._sidebar_options')
        </div>
    </header>

    <main class="container">
        <div class="row">
            <div class="col-xs-12 single-content">

                <h1>About Us</h1>

                <p class="subtitle">A summary about us</p>

                <p>Full details about us.</p>

            </div>
            <!-- main-content/col -->
        </div>
        <!--/row -->

    </main>
    <!-- /container -->

    <footer class="single single-page without-readmore">
        <div class="container">
            <div class="col-sm-12">
                <p>The writer community loves your content. Writer &copy; {!! date('Y') !!} <a href="{!! route('home') !!}">latest posts</a></p>
            </div>
        </div>
    </footer>
@endsection
