@extends('admin.layout')

@section('title')
    All the projects
@endsection


@section('content')

    <table class="table table-striped table-hover" id="dataTables-example">
        <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Body</th>
            <th>Icon URL</th>
            <th>Project URL</th>
            <th>Created_at</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($projects as $project)
            <tr>
                <td>{{ $project->id }}</td>
                <td>{{ $project->title }}</td>
                <td>{{ $project->body }}</td>
                <td>{{ $project->icon }}</td>
                <td>{{ $project->url }}</td>
                <td>{{ $project->created_at }}</td>

                <td>
                    {!! Form::open(['method' => 'get', 'url' => 'admin/projects/'.$project->id.'/edit']) !!}
                    <button type="submit" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span> Edite</button>
                    {!! Form::close() !!}

                    {!! Form::open(['method' => 'delete', 'url' => 'admin/projects/'.$project->id]) !!}
                    <button type="submit" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


@endsection