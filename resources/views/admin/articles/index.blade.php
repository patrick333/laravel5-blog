@extends('admin.layout')

@section('title')
    All the articles
@endsection


@section('content')

    <table class="table table-striped table-hover" id="dataTables-example">
        <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Publish</th>
            <th>Category</th>
            <th>Tags</th>
            <th>Created_at</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($articles as $article)
            <tr>
                <td>{{ $article->id }}</td>
                <td>

                    {!! Form::open(['method' => 'get', 'url' => '/admin/articles/'.$article->id.'/edit',
                    'class'
                    => 'action-form-sm']) !!}
                    <button type="submit" class="btn btn-sm btn-success">
                        <span class="glyphicon glyphicon-pencil"></span> Edit
                    </button>
                    &nbsp;{{ $article->title}}
                    {!! Form::close() !!}

                </td>
                <td>
                    @if($article->published==true)
                        Published
                        @else
                        (Drafting)
                    @endif
                </td>
                <td>{{ $article->category->name }}</td>
                <td>@foreach($article->tags as $tag){{ $tag->name }} @endforeach  </td>
                <td>{{ $article->created_at }}</td>
                <td>
                    <a href="/admin/articles/{{ $article->slug }}" class="btn btn-sm btn-primary" target="_blank">
                        <span class="glyphicon glyphicon-eye-open"></span> View</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


    <div class="col-md-6 col-md-push-3">
        {!! $articles->render() !!}
    </div>


@endsection