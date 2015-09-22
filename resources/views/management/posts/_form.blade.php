<!-- general form elements -->
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Meta</h3>

        <div class="pull-right box-tools">
            <button class="btn btn-default btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
            <button class="btn btn-default btn-sm" data-widget='remove' data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
        </div>
        <!-- /. tools -->
    </div>
    <div class="box-body">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group has-feedback @if($errors->first('title')) has-error @endif">
                    {!! Form::label('title', 'Title') !!}
                    {!! Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Required']) !!}
                    {!! $errors->first('title', '<div class="help-block col-sm-reset inline">:message</div>') !!}
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group has-feedback @if($errors->first('summary')) has-error @endif">
                    {!! Form::label('summary', 'Summary') !!}
                    {!! Form::text('summary', $post->summary, ['class' => 'form-control', 'placeholder' => 'Required. One to two sentences.']) !!}
                    {!! $errors->first('summary', '<div class="help-block col-sm-reset inline">:message</div>') !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group has-feedback @if($errors->first('header_background')) has-error @endif">
                    {!! Form::label('header_background', 'Header Background URL') !!}
                    {!! Form::text('header_background', $post->header_background, ['class' => 'form-control', 'placeholder' => 'Recommended but not required. Size: 1555x1037 px.']) !!}
                    {!! $errors->first('header_background', '<div class="help-block col-sm-reset inline">:message</div>') !!}
                </div>
            </div>

            <div class="col-md-6 form-group has-feedback @if($errors->first('category_id')) has-error @endif">
                {!! Form::label('category_id', 'Category') !!}
                {!! Form::select('category_id', $categories, $post->category_id,
                    ['class' => 'select2 form-control', 'placeholder' => 'Select a category',
                    'style' => 'width: 100%']) !!}
                {!! $errors->first('category_id', '<div class="help-block col-sm-reset inline">:message</div>') !!}
            </div>
        </div>

        <div class="col-md-6 form-group has-feedback checkbox icheck @if($errors->first('publish')) has-error @endif">
            <label>
                {!! Form::checkbox('published') !!} Publish </label>
        </div>
    </div>
</div>
<!-- /.box -->

<div class='box'>
    <div class='box-header'>
        <h3 class='box-title'>Content
            <small>Simple and fast</small>
        </h3>
        <!-- tools box -->
        <div class="pull-right box-tools">
            <button class="btn btn-default btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
            <button class="btn btn-default btn-sm" data-widget='remove' data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
        </div>
        <!-- /. tools -->
    </div>
    <!-- /.box-header -->
    <div class='box-body pad'>
        <div class="form-group has-feedback @if($errors->first('content')) has-error @endif has-feedback">
            {!! Form::textarea('content', null, ['class' => 'textarea',
            'placeholder' => 'Write the article here', 'style' => 'width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;']) !!}
            {!! $errors->first('content', '<div class="help-block col-sm-reset inline">:message</div>') !!}
        </div>
    </div>
</div>
