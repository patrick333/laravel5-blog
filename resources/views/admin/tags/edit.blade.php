@extends('admin.layout')

@section('title')
    Tag editing: {{$tag->name}}
@endsection

@section('content')

    <div class="col-lg-8">
        {!! Form::model($tag,['method'=>'PATCH','url' => '/admin/tags/'.$tag->id]) !!}
        @include('admin.tags.form',['submitButtonText'=>'Update Tag', 'form_date'=>$tag->created_at->format('Y-m-d')])
        {!! Form::close() !!}
    </div>
@stop