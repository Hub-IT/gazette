@extends('gazzete.layouts.master')
@section('title', 'Home')
@section('content')

    <div class="sub-nav">
        <a href="#" class="select-articles active">Posts</a>
        <a href="#" id="categories-tab" class="select-categories">Categories</a>
    </div>

    <div class="home-page-articles animated fadeIn ">

        @forelse ($posts as $post)
            <article class="post">
                <div class="post-preview col-xs-10  no-gutter">
                    <h2><a href="{!! route('posts.show', $post) !!}">{!! $post->title !!}</a></h2>

                    <p> {!! $post->subtitle !!}</p>

                    {{--<p class="meta">--}}
                        {{--<a href="{!! route('authors.show', $post->author) !!}"> {!! $post->author->name !!}</a> in <a--}}
                                {{--href="{!! route('categories.show', $post->category) !!}">{!! $post->category->name !!}</a>--}}
                        {{--<i class="link-spacer"></i> <i class="fa fa-bookmark"></i> {!! $post->minutes_read !!}--}}
                    {{--</p>--}}
                {{--</div>--}}

                <div class=" col-xs-2  no-gutter">
                    <img src="{!! $post->author->avatar !!}" class="user-icon" alt="user-image">
                </div>
            </article>
        @empty
            <h2>No articles!</h2>
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