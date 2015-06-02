<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'autofocus' => 'autofocus']) !!}
</div>

<div class="form-group">
    {!! Form::label('parent_id', 'Parent:') !!}
    {!! Form::select('parent_id', $categories, null, ['id' => 'parent_id', 'class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>

@section('head')
    <link rel="stylesheet" href="/css/admin/select2.min.css">
@endsection

@section('footer')
    <script src="/js/admin/select2.min.js"></script>
    <script>
        $('#parent_id').select2();
    </script>
@endsection