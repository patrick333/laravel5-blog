@extends('admin.layout')

@section('title')
    Project editing: {{$project->name}}
@endsection

@section('content')

    <div class="col-lg-8">
        {!! Form::model($project,['method'=>'PATCH','url' => '/admin/projects/'.$project->id]) !!}
        @include('admin.projects.form',['submitButtonText'=>'Update Project', 'form_date'=>$project->created_at->format('Y-m-d')])
        {!! Form::close() !!}
    </div>
@stop