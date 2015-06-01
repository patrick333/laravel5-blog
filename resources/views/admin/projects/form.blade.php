<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'autofocus' => 'autofocus']) !!}
</div>

<div class="form-group">
    {!! Form::label('body', 'Project description:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control',
    'placeholder' => 'Please Enter some text...', 'rows' => '8']) !!}
</div>

<div class="form-group">
    {!! Form::label('icon', 'Icon URL:') !!}
    {!! Form::text('icon', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('url', 'Project URL:') !!}
    {!! Form::text('url', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>