@extends('admin.layout')

@section('title')
    Article editing: {{$article->title}}
@endsection

@section('content')

    <div class="col-lg-12">
        {!! Form::model($article,['method'=>'PATCH','url' => '/admin/articles/'.$article->id]) !!}
        @include('admin.articles.form',['submitButtonText'=>'Update Article', 'form_date'=>$article->created_at->format('Y-m-d')])
        {!! Form::close() !!}
    </div>
@stop