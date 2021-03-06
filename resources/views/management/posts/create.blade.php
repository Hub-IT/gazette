@extends('management.layouts.master')
@section('title', 'Create post')
@section('styles')
    <link href='{!! url("vendor/admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css") !!}' rel='stylesheet' type='text/css'/>
    <link href='{!! url("vendor/admin-lte/plugins/iCheck/square/blue.css") !!}' rel='stylesheet' type='text/css'/>
    <link href='{!! url("vendor/admin-lte/plugins/select2/select2.min.css") !!}' rel='stylesheet' type='text/css'/>
@endsection
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            {!! Form::model($post, ['route' => 'management.posts.store', 'role' => 'form']) !!}

            @include('management.posts._form')

            <div class="box-footer">
                {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
        </div>
        <!--/.col (left) -->
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
    <script src='{!! url("vendor/admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js") !!}'></script>
    <script src='{!! url("vendor/admin-lte/plugins/iCheck/icheck.min.js") !!}'></script>
    <script src='{!! url("vendor/admin-lte/plugins/select2/select2.min.js") !!}'></script>
@endsection
@section('inline-scripts')
    <script type="text/javascript">
        $(function () {
            $(".textarea").wysihtml5();
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
            $(".select2").select2();
        });
    </script>
@endsection
