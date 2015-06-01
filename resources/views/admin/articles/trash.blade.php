@extends('admin.layout')

@section('title')
    Articles Trash
@endsection

@section('content')
    @if(!$articles->count())
        <div>The trash is empty!</div>
    @else
        <table class="table table-striped table-hover" id="dataTables-example">
            <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
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
                    <td><a href="/blog/{{ $article->slug }}" target="_blank">{{ $article->title }}</a></td>
                    <td>{{ $article->category->name }}</td>
                    <td>@foreach($article->tags as $tag){{ $tag->name }} @endforeach  </td>
                    <td>{{ $article->created_at }}</td>
                    <td>
                        {!! Form::open(['method' => 'post', 'url' => '/admin/articles/restore/'.$article->id,
                        'class'
                        => 'action-form-sm']) !!}
                        <button type="submit" class="btn btn-sm btn-success"><span
                                    class="fa fa-undo fa-fw"></span> Restore
                        </button>
                        {!! Form::close() !!}

                        {!! Form::open(['method' => 'delete', 'url' => '/admin/articles/forceDelete/'.$article->id,
                        'class'
                        =>
                        'action-form-sm']) !!}
                        <button type="submit" class="btn btn-sm btn-danger"><span
                                    class="glyphicon glyphicon-trash"></span> Destroy
                        </button>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="col-md-6 col-md-push-3">
            {!! $articles->render() !!}
        </div>
    @endif
@stop