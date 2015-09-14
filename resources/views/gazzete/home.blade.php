@extends('gazzete.layouts.master')
@section('title', 'Home')
@section('content')

    <div class="sub-nav">
        <a href="#" class="select-posts active">Posts</a>
        <a href="#" id="categories-tab" class="select-categories">Categories</a>
    </div>

    <div class="home-page-posts animated fadeIn">
        <div id="posts">
            @forelse ($posts as $post)
                <article>
                    <div class="post-preview col-xs-10 no-gutter">
                        <h2><a href="{!! route('posts.show', $post) !!}">{!! $post->title !!}</a></h2>
                        <p> {!! $post->summary !!}</p>
                        <p class="meta">
                            <a href="{!! route('authors.show', $post->author) !!}"> {!! $post->author->name !!}</a> in
                            <a href="{!! route('categories.show', $post->category) !!}">{!! $post->category->name !!}</a>
                            <i class="link-spacer"></i> <i class="fa fa-bookmark"></i> {!! $post->minutes_read !!}
                        </p>
                    </div>
                    <div class="col-xs-2  no-gutter">
                        <img src="{!! $post->author->avatar !!}" class="user-icon" alt="user-image">
                    </div>
                </article>
            @empty
                <h2>No posts!</h2>
            @endforelse
        </div>
        <div class="row hidden-sm hidden-xs">
            <button id="btn-more-posts" class="btn btn-primary btn-block"><i class="fa fa-road"></i> More</button>
        </div>
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
@endsection
@section('inline-scripts')
    <script>
        $(document).ready(function () {
            var $posts = $("#posts");
            var pageNumber = 1;
            var posts;
            var url = "{!! route('api.v1.posts.index') !!}";

            $("#btn-more-posts").click(function(){
                getMorePosts();
            });

            $(window).scroll(function () {
                if ($(window).scrollTop() >= $(document).height() - $(window).height() - 10) {
                        getMorePosts();
                }
            });

            function renderPosts(data) {
                var postShowUrl = "{!! route('posts.show') !!}";
                var authorShowUrl = "{!! route('authors.show') !!}";
                var categoryShowUrl = "{!! route('categories.show') !!}";

                $.each(data.posts, function (index, post) {
                    postShowUrl = postShowUrl.replace("%7Bposts%7D", post.id);
                    authorShowUrl = authorShowUrl.replace("%7Bauthors%7D", post.author.id);
                    categoryShowUrl= categoryShowUrl.replace("%7Bcategories%7D", post.category.id);

                    var article = $('<article><article/>');
                    var previewPost = $('<div class="post-preview col-xs-10 no-gutter"></div>');
                    var postTitle = $('<h2><a href="' + postShowUrl + '">' + post.title + '</a></h2>');
                    var postSummary = $('<p>' + post.summary + '</p>');

                    var postMeta =  $('<p class="meta"></p>');
                    var postMedataData = $('<a href="' + authorShowUrl + '"> ' + post.author.name + '</a> in' +
                            '<a href="' + categoryShowUrl + '">' + post.category.name + '</a>' +
                            '<i class="link-spacer"></i> <i class="fa fa-bookmark"></i> ' + post.minutes_read);
                    postMeta.append(postMedataData);

                    previewPost.append(postTitle);
                    previewPost.append(postSummary);
                    previewPost.append(postMeta);

                    var avatar = $('<div class="col-xs-2  no-gutter"><img src="' + post.author.avatar + '" class="user-icon" alt="user-image"></div>');

                    article.append(previewPost);
                    article.append(avatar);

                    $posts.append(article);
                });
            }

            function getMorePosts() {
                return $.ajax({
                    type: 'GET',
                    url: url + "?page=" + pageNumber + "&limit=10",
                    success: function (data) {
                        pageNumber++;
                        if (data.length == 0) {
                            console.log('no posts');
                        } else {
                            renderPosts(data);
                        }
                    }, error: function (data) {
                    }
                });
            }

        });
    </script>
@endsection
