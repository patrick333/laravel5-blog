@extends('admin.layout')

@section('title')
    All the tags
@endsection


@section('content')

    <table class="table table-striped table-hover" id="dataTables-example">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Articles</th>
            <th>Created_at</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tags as $tag)
            <tr>
                <td>{{ $tag->id }}</td>
                <td>{{ $tag->name }}</td>
                <td>{{ $tag->slug }}</td>
                <td>{{ $tag->articles()->count() }}</td>
                <td>{{ $tag->created_at }}</td>

                <td>
                    {!! Form::open(['method' => 'get', 'url' => 'admin/tags/'.$tag->id.'/edit']) !!}
                    <button type="submit" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span> Edite</button>
                    {!! Form::close() !!}

                    {!! Form::open(['method' => 'delete', 'url' => 'admin/tags/'.$tag->id]) !!}
                    <button type="submit" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


@endsection