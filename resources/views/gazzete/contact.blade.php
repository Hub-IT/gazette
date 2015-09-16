@extends('gazzete.layouts.master')
@section('title', 'Home')
@section('styles') @endsection
@section('content')

<main class="container left-container">

    @include('gazzete.home._sidebar')

    <div class="row">

        <div class="col-md-7 col-sm-12 col-md-offset-5 main-content">

            <h3>Contact our Team</h3>

            <form>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" placeholder="Jane Doe" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" placeholder="example@email.com" class="form-control" name="email">
                </div>
                <div class="form-group">
                    <label for="company">Company</label>
                    <input type="text" placeholder="Example Ltd" class="form-control" name="company">
                </div>

                <div class="form-group">
                    <label for="number">Phone Number</label>
                    <input type="tel" placeholder="+44778217779" class="form-control" name="number">
                </div>

                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" name="message" placeholder="Hello, lets chat"></textarea>
                </div>

                <div class="form-group">
                    <input class="btn btn-default" type="submit" value="Send">
                </div>
            </form>

            <footer class="split-footer">
                <a href="post.html">About</a>
                <i class="link-spacer"></i>
                <a href="post.html">Writer 2015</a>
            </footer>
        </div>

    </div>
</main>
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
                        if (data.length != 0) renderPosts(data);
                    }
                });
            }

        });
    </script>
@endsection
