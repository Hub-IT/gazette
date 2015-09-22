@extends('management.layouts.master')
@section('title', 'Posts')
@section('styles')
    <link href='{!! url("vendor/admin-lte/plugins/datatables/dataTables.bootstrap.css") !!}' rel='stylesheet' type='text/css'/>
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">All Posts</h3>
                </div>

                <div class="box-body">
                    <table id="posts-table" class="table table-bordered table-striped responsive">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Summary</th>
                            <th>Category</th>
                            <th>Published</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr {!! $post->published ?: 'class="bg-gray color-palette"' !!}>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->author->name }}</td>
                                <td>{{ substr($post->summary, 0, 23) }} ...</td>
                                <td>{{ $post->category->name }}</td>
                                <td>{{ $post->published ? 'Yes' : 'No' }}</td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE', 'route' =>
                                        ['management.posts.destroy', $post]])!!}

                                    {!! link_to_route('posts.show', 'Show', $post->slug,
                                        ["class" => "btn btn-info btn-flat", 'target' => '_blank']) !!}

                                    {!! link_to_route('management.posts.edit', 'Edit', $post->slug,
                                        ["class" => "btn btn-primary btn-flat"]) !!}

                                    {!! Form::submit("Delete", ['class' => 'confirm btn btn-danger btn-flat']) !!}

                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        <tfoot>
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Summary</th>
                            <th>Category</th>
                            <th>Published</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src='{!! url("vendor/admin-lte/plugins/datatables/jquery.dataTables.min.js") !!}'></script>
    <script src='{!! url("vendor/admin-lte/plugins/datatables/dataTables.bootstrap.min.js") !!}'></script>
@endsection
@section('inline-scripts')
    <script>
        $(function () {
            $("#posts-table").DataTable({
                "scrollX": true
            });
        });
    </script>
@endsection
