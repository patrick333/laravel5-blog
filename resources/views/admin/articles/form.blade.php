<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'autofocus' => 'autofocus']) !!}
</div>

<div class="form-group">
    {!! Form::label('subhead', 'Subhead (optional) :') !!}
    {!! Form::text('subhead', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('body', 'Body:') !!}
    {!! Form::textarea('body', null, ['id' => 'editor', 'class' => 'form-control',
    'placeholder' => 'Please Enter some text...', 'rows' => '12']) !!}
</div>

<div class="form-group">
    {!! Form::label('excerpt', 'Excerpt (optional) :') !!}
    {!! Form::textarea('excerpt', null, ['class' => 'form-control',
    'placeholder' => 'You can mannually set the excerpt here...', 'rows' => '5']) !!}
</div>

{{--<div class="form-group">--}}
{{--{!! Form::label('slug', 'Slug:') !!}--}}
{{--{!! Form::text('slug', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<div class="form-group">
    {!! Form::label('category_id', 'Category:') !!}
    <select class="form-control" name="category_id" id="category_id">
        @foreach ($categories['top'] as $top_category)
            <option value="{{ $top_category->id }}"
            @if(isset($article->category_id) && $top_category->id == $article->category_id)
                    selected
                    @endif
                    >{{ $top_category->name }}</option>
            @if(isset($categories['second'][$top_category->id]))
                @foreach ($categories['second'][$top_category->id] as $scategory)
                    <option value="{{ $scategory->id }}"
                    @if(isset($article->category_id) && $scategory->id == $article->category_id)
                            selected
                            @endif
                            >&nbsp;&nbsp;&nbsp;{{ $scategory->name }}</option>
                @endforeach
            @endif
        @endforeach
    </select>
</div>

<div class="form-group">
    {!! Form::label('tag_list', 'Tags:') !!}
    {!! Form::select('tag_list[]', $tags, null, ['id' => 'tag_list', 'class' => 'form-control', 'multiple']) !!}
</div>

<div class="form-group">
    {!! Form::label('created_at', 'Time:') !!}
    {!! Form::input('date', 'created_at', $form_date, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>

@section('head')
    <link rel="stylesheet" href="/css/admin/select2.min.css">
    <link rel="stylesheet" href="/css/admin/codemirror.css">
    <style>
        .CodeMirror {
            height: auto;
        }
    </style>
@stop

@section('footer')
    <!-- CodeMirror -->
    <script src="/js/admin/codemirror.js"></script>
    <script src="/js/admin/markdown.js"></script>
    <script src="/js/admin/continuelist.js"></script>

    <!-- inline-attachment -->
    <script src="/js/admin/inline-attachment.js"></script>
    <script src="/js/admin/codemirror.inline-attachment.js"></script>

    <!-- select2 -->
    <script src="/js/admin/select2.min.js"></script>
    <script>
        var editor = CodeMirror.fromTextArea(document.getElementById("editor"), {
            mode: 'markdown',
            lineNumbers: true,
            lineWrapping: true,
            theme: "default",
            extraKeys: {"Enter": "newlineAndIndentContinueMarkdownList"}
        });
        inlineAttachment.defaults.uploadUrl = '/upload_attachment.php';
        inlineAttachment.editors.codemirror4.attach(editor);

        $(function () {
            $('#tag_list').select2({
                placeholder: 'Choose a tag',
                tags: true
            });

            $('#category_id').select2();

            {{--$('textarea').inlineattachment({--}}
            {{--defaultExtension: 'jpg',--}}
            {{--uploadUrl: '/upload_attachment.php',--}}
            {{--extraParams: {"_token": "{{ csrf_token() }}"}--}}
            {{--});--}}
        });
    </script>
@stop