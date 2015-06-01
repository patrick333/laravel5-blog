@extends('admin.layout')

@section('title')
    Add a category
@endsection

@section('content')

    <div class="col-lg-8">
        {!! Form::open(['url' => '/admin/categories']) !!}
        @include('admin.cats.form',['submitButtonText'=>'Add Category', 'form_date'=>date('Y-m-d')])
        {!! Form::close() !!}
    </div>
@stop