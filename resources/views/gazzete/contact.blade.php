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
                    <label for="number">Phone Number</label>
                    <input type="tel" placeholder="++306912345678" class="form-control" name="number">
                </div>

                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" name="message" placeholder="Hello, please help me with ..."></textarea>
                </div>

                <div class="form-group">
                    <input class="btn btn-default" type="submit" value="Send">
                </div>
            </form>
            
        </div>

    </div>
</main>
@endsection
@section('scripts')
@endsection
