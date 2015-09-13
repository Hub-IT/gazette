@extends('gazzete.layouts.master')
@section('title', 'Home')
@section('content')

    <div class="sub-nav">
        <a href="#" class="select-posts active">Posts</a>
        <a href="#" id="categories-tab" class="select-categories">Categories</a>
    </div>

    <div class="home-page-posts animated fadeIn" id="posts">
        @forelse ($posts as $post)
            <article class="post">
                <div class="post-preview col-xs-10  no-gutter">
                    <h2><a href="{!! route('posts.show', $post) !!}">{!! $post->title !!}</a></h2>
                    <p> {!! $post->summary !!}</p>
                    <p class="meta">
                        <a href="{!! route('authors.show', $post->author) !!}"> {!! $post->author->name !!}</a> in
                        <a href="{!! route('categories.show', $post->category) !!}">{!! $post->category->name !!}</a>
                        <i class="link-spacer"></i> <i class="fa fa-bookmark"></i> {!! $post->minutes_read !!}
                    </p>
                </div>
                <div class=" col-xs-2  no-gutter">
                    <img src="{!! $post->author->avatar !!}" class="user-icon" alt="user-image">
                </div>
            </article>
        @empty
            <h2>No posts!</h2>
        @endforelse
    </div>

    <div class="home-page-categories animated fadeIn hide">
        <div class="category row">
            <section>

                {{--{% for category in categories %}--}}
                {{--<div class="category-preview col-xs-6 col-sm-4 ">--}}
                    {{--<h2>{{ category.getName }}</h2>--}}
                    {{--<a href="category.html"><img src="{{ category.getExtImg }}" alt="category-image"></a>--}}
                {{--</div>--}}
                {{--{% else %}--}}
                {{--<h2>No categories!</h2>--}}
                {{--{% endfor %}--}}

            </section>
        </div>
    </div>
@endsection
@section('scripts')
    <script src='{!! url("vendor/jquery-during-scroll/source/during-scroll.js") !!}'></script>
@endsection
@section('inline-scripts')
    <script>
        $(document).ready(function () {

            $(window).scroll(function() {
                console.log('window scrolled');
            });

            var scrollInterval = $.duringScroll({
                interval: 60,
                always: function() {},
                scrollStart: function() {},
                duringScroll: function() {},
                afterScroll: function() {}
            });

            $('body').on('click', function() {
                clearInterval(scrollInterval);
                console.log('ssteing');
            });

            $("#posts").scroll(function () {
                console.log('posts scrolled');
                var pageNumber = 1;
                var posts;
                var url = "{!! route('api.v1.posts.index') !!}";

                if ($(window).scrollTop() + $(window).height() > $(document).height()) {
                    $.ajax({
                        type: 'GET',
                        url: url + "?page=" + pageNumber + "&limit=10",
                        success: function (data) {
                            pageNumber++;
                            if (data.length == 0) {
                                // :( no more posts
                            } else {
                                // Great we have more posts
                                posts = items;
                            }
                        }, error: function (data) {
                        }
                    })
                }
            });
        });
    </script>
@endsection
