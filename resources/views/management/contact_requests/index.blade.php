@extends('management.layouts.master')
@section('title', 'Contacts Requests')
@section('styles')
    <link href='{!! url("vendor/admin-lte/plugins/datatables/dataTables.bootstrap.css") !!}' rel='stylesheet' type='text/css'/>
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">All Contact Requests</h3>
                </div>

                <div class="box-body">
                    <table id="contact-requests-table" class="table table-bordered table-striped responsive"  width="100%">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Peek</th>
                            <th>Viewed</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contactRequests as $contactRequest)
                            <tr>
                                <td>{{ $contactRequest->name }}</td>
                                <td>{{ $contactRequest->email }}</td>
                                <td>{{ $contactRequest->phone_number }}</td>
                                <td>{{ substr($contactRequest->message, 0, 23) }} ...</td>
                                <td><i class="fa fa-eye{{ $contactRequest->is_read ?: "-slash"  }}"></i></td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE', 'route' =>
                                        ['management.contact-requests.destroy', $contactRequest]])!!}

                                    {!! link_to_route('management.contact-requests.show', 'Show', $contactRequest,
                                        ["class" => "btn btn-primary"]) !!}

                                    {!! Form::button("<i class='fa fa-trash-o'></i>",
                                    ['class' => 'confirm btn btn-danger', 'type' => 'submit']) !!}

                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Peek</th>
                            <th>Viewed</th>
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
            $("#contact-requests-table").DataTable({
                "scrollX": true
            });
        });
    </script>
@endsection
