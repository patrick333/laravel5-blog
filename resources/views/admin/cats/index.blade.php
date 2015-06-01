@extends('admin.layout')

@section('title')
    All the categories
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
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>@if($category->parent_id) &nbsp;&nbsp;&nbsp;— @endif
                    {{ $category->name }}
                </td>
                <td>{{ $category->slug }}</td>
                <td>{{ $category->articles()->count() }}</td>
                <td>{{ $category->created_at }}</td>

                <td>
                    {!! Form::open(['method' => 'get', 'url' => 'admin/categories/'.$category->id.'/edit']) !!}
                    <button type="submit" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span> Edite</button>
                    {!! Form::close() !!}

                    {!! Form::open(['method' => 'delete', 'url' => 'admin/categories/'.$category->id]) !!}
                    <button type="submit" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


@endsection