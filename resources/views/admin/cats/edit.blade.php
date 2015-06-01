@extends('admin.layout')

@section('title')
    Category editing: {{$category->name}}
@endsection

@section('content')

    <div class="col-lg-8">
        {!! Form::model($category,['method'=>'PATCH','url' => '/admin/categories/'.$category->id]) !!}
        @include('admin.cats.form',['submitButtonText'=>'Update Category', 'form_date'=>$category->created_at->format('Y-m-d')])
        {!! Form::close() !!}
    </div>
@stop