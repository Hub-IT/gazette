@extends('gazzete.layouts.master')
@section('title', 'Home')
@section('styles') @endsection
@section('content')

<main class="container left-container">

    @include('gazzete.home._sidebar')

    <div class="row">

        <div class="col-md-7 col-sm-12 col-md-offset-5 main-content">

            <h3>Contact our Team</h3>
            
            @include('flash::message')

            {!!  Form::model($contact, ['route' => 'contact.post']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', 'Jane Doe', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email', 'example@email.com', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('phone_number', 'Phone Number') !!}
                    {!! Form::tel('phone_number', '++306912345678', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('message', 'Message') !!}
                    {!! Form::textarea('message', 'Hello, please help me with ...', ['class' => 'form-control']) !!}
                </div>

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
