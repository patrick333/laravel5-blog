@extends('admin.layout')

@section('title')
    All the messages
@endsection


@section('content')

    <table class="table table-striped table-hover" id="dataTables-example">
        <thead>
        <tr>
            <th>#</th>
            <th>Sender</th>
            <th>Name</th>
            <th>Message</th>
            <th>Sent</th>
        </tr>
        </thead>
        <tbody>
        @foreach($messages as $message)
            <tr>
                <td>{{ $message->id }}</td>
                <td>{{ $message->email }}</td>
                <td>{{ $message->user }}</td>
                <td>{{ $message->message }}</td>
                <td>{{ $message->created_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>


@endsection