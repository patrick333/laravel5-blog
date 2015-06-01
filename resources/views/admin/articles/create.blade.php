@extends('admin.layout')

@section('title')
    Add an article
@endsection

@section('content')

    <div class="col-lg-8">
        {!! Form::open(['url' => '/admin/articles']) !!}
        @include('admin.articles.form',['submitButtonText'=>'Add Article', 'form_date'=>date('Y-m-d')])
        {!! Form::close() !!}
    </div>
@stop