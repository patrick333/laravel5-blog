@extends('admin.layout')

@section('title')
    Add a tag
@endsection

@section('content')

    <div class="col-lg-8">
        {!! Form::open(['url' => '/admin/tags']) !!}
        @include('admin.tags.form',['submitButtonText'=>'Add Tag', 'form_date'=>date('Y-m-d')])
        {!! Form::close() !!}
    </div>
@stop