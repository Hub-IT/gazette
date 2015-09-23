@extends('gazette.layouts.master')
@section('title', 'Home')
@section('styles') @endsection
@section('content')

<main class="container left-container">

    @include('gazette.home._sidebar')

    <div class="row">

        <div class="col-md-7 col-sm-12 col-md-offset-5 main-content">

            <h3>Contact our Team</h3>

            {!!  Form::model($contact, ['route' => 'contact.post']) !!}

            <div class="form-group @if($errors->first('name')) alert alert-danger  @endif">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Jane Doe']) !!}
                {!! $errors->first('name', '<h5 class="help-block alert-danger">:message</h5>') !!}
            </div>

            <div class="form-group @if($errors->first('email')) alert alert-danger  @endif">
                {!! Form::label('email', 'Email') !!}
                {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'example@email.com']) !!}
                {!! $errors->first('email', '<h5 class="help-block alert-danger">:message</h5>') !!}
            </div>

            <div class="form-group @if($errors->first('phone_number')) alert alert-danger  @endif">
                {!! Form::label('phone_number', 'Phone Number') !!}
                {!! Form::tel('phone_number', null, ['class' => 'form-control', 'placeholder' => '++306912345678']) !!}
                {!! $errors->first('phone_number', '<h5 class="help-block alert-danger">:message</h5>') !!}
            </div>

            <div class="form-group @if($errors->first('message')) alert alert-danger  @endif">
                {!! Form::label('message', 'Message') !!}
                {!! Form::textarea('message', null, ['class' => 'form-control', 'placeholder' => 'Hello, please help me with ...']) !!}
                {!! $errors->first('message', '<h5 class="help-block alert-danger">:message</h5>') !!}
            </div>

            @include('flash::message')

            <div class="form-group">
                {!! Form::submit('Send', ['class' => 'btn btn-default']) !!}
            </div>

            {!! Form::close() !!}

        </div>

    </div>
</main>
@endsection
@section('scripts')
@endsection
