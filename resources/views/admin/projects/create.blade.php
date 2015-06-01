@extends('admin.layout')

@section('title')
    Add a project
@endsection

@section('content')

    <div class="col-lg-8">
        {!! Form::open(['url' => '/admin/projects']) !!}
        @include('admin.projects.form',['submitButtonText'=>'Add Project', 'form_date'=>date('Y-m-d')])
        {!! Form::close() !!}
    </div>
@stop