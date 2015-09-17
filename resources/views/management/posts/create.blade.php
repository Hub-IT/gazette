@extends('management.layouts.master')
@section('title', 'Create Post')
@section('styles')
    <link href='{!! url("vendor/admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css") !!}' rel='stylesheet' type='text/css'/>
    <link href='{!! url("vendor/admin-lte/plugins/iCheck/square/blue.css") !!}' rel='stylesheet' type='text/css'/>
@endsection
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Meta</h3>
                </div>
                <!-- /.box-header --><!-- form start -->
                {!! Form::model($post, ['route' => 'management.auth.store', 'role' => 'form']) !!}

                    <div class="box-body">

                        <div class="col-md-6 form-group has-feedback @if($errors->first('title')) has-error @endif has-feedback">
                            {!! Form::label('title', 'Title') !!}
                            {!! Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Required']) !!}
                            {!! $errors->first('title', '<div class="help-block col-sm-reset inline">:message</div>') !!}
                        </div>

                        <div class="col-md-6 form-group has-feedback @if($errors->first('summary')) has-error @endif has-feedback">
                            {!! Form::label('summary', 'Summary') !!}
                            {!! Form::text('summary', $post->summary, ['class' => 'form-control', 'placeholder' => 'Required. One to two sentences.']) !!}
                            {!! $errors->first('summary', '<div class="help-block col-sm-reset inline">:message</div>') !!}
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="exampleInputFile">Header background</label>
                            <input type="file" id="exampleInputFile">
                            <p class="help-block">Recommended but not required. Size: 1555x1037 px.</p>
                        </div>

                        <div class="col-md-6 form-group">
                            <label>
                                {!! Form::checkbox('publish') !!} Publish </label>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </form>
            </div>
            <!-- /.box -->

            <div class='box'>
                <div class='box-header'>
                    <h3 class='box-title'>Content <small>Simple and fast</small></h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <button class="btn btn-default btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-default btn-sm" data-widget='remove' data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div class='box-body pad'>
                    <form>
                        <textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </form>
                </div>
            </div>


            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </div>
        <!--/.col (left) -->
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
    <script src='{!! url("vendor/admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js") !!}'></script>
    <script src='{!! url("vendor/admin-lte/plugins/iCheck/icheck.min.js") !!}'></script>
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
        });
    </script>
@endsection
