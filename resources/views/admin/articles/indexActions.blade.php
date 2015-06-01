@extends('admin.layout')

@section('title')
    All the articles
@endsection


@section('content')

    {{--<div class="col-lg-12">--}}
    {{--<div class="table-responsive">--}}
    <table class="table table-striped table-hover" id="dataTables-example">
        <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Category</th>
            <th>Publish/Unpublish</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($articles as $article)
            <tr>
                <td>{{ $article->id }}</td>
                <td>
                    {{ $article->title}}<br/>
                </td>
                <td>{{ $article->category->name }}</td>
                <td>
                    @if($article->published==false)
                        {!! Form::open(['method' => 'post', 'url' => '/admin/articles/publish/'.$article->id,
                        'class'=>'action-form-sm']) !!}
                        <button type="submit" class="btn btn-sm btn-success">
                            <span class="fa fa-check-circle"></span> Publish
                        </button>
                        {!! Form::close() !!}
                    @else
                        {!! Form::open(['method' => 'post', 'url' => '/admin/articles/unpublish/'.$article->id,
                        'class'=>'action-form-sm']) !!}
                        <button type="submit" class="btn btn-sm btn-warning">
                            <span class="fa fa-times-circle"></span> Unpublish
                        </button>
                        {!! Form::close() !!}
                    @endif
                </td>

                <td>
                    {!! Form::open(['method' => 'delete', 'url' => '/admin/articles/'.$article->id,
                    'class'=>'action-form-sm']) !!}
                    <button type="submit" class="btn btn-sm btn-danger"><span
                                class="glyphicon glyphicon-trash"></span> Delete
                    </button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{--</div>--}}
    {{--</div>--}}


    <div class="col-md-6 col-md-push-3">
        {!! $articles->render() !!}
    </div>


@endsection