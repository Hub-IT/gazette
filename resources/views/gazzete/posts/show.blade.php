@extends('gazzete.layouts.master')
@section('title', $post->title)
@section('content')
<header class="hero-image" role="banner" style="background-image: url('{!! $post->header_background or url('img/default-single-hero.jpg') !!}');">
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
            <p class="meta">
                <a href="{!! $post->author->slug !!}">{{ $post->author->name }}</a> in <a href="{!! $post->category->slug !!}">{{ $post->category->name }}</a>
                <i class="link-spacer"></i> <i class="fa fa-bookmark"></i> {{ $post->minutes_read }} minute read
            </p>
            <h1>{{ $post->title }}</h1>

            <p class="subtitle">{{ $post->summary }}</p>

            {!! $post->content !!}

        </div>
        <!-- main-content/col -->
    </div>
    <!--/row -->

</main>
<!-- /container -->

<footer class="single">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-2">
                <img src="{!! $post->author->avatar !!}" class="user-icon " alt="user-image">
            </div>
            <div class="col-xs-12 col-sm-6">
                <div class="category-list">
                    <p>Published <span>{!! $post->created_at !!}</span></p>

                    <p><a href="{!! route('authors.show', $post->author->slug) !!}">{{ $post->author->name }}</a> in <a href="{!! route('categories.show', $post->category->slug) !!}">{{ $post->category->name }}</a></p>

                </div>
            </div>
            <!-- end col -->
            <div class="col-xs-12 col-sm-4">
                <div class="social">
                    <p>Share this article</p>

                    <div class="social-links">
                        <a class="social-icon twitter-share-button" target="_blank"
                                href="https://twitter.com/intent/tweet?hashtags=gazzete,{{ $post->category->slug }},{{ $post->slug }}"
                                data-platform="twitter"
                                data-message="{{ $post->title }}, {!! route('posts.show', $post->slug)!!}" >
                            <i class="fa fa-twitter"></i></a>
                        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>

    <div class="row read-another-section">
        @foreach($latestPosts as $post)
            <a href="{!! route('posts.show', $post->slug) !!}">
                <div class="col-sm-6 col-md-2 no-gutter read-another-container">
                    <div class="overlay"></div>
                    <img src="{!! $post->avatar !!}">
                    <h3 class="read-another">{{ $post->title }}</h3>
                </div>
            </a>
        @endforeach
    </div>
</footer>
@endsection
