@extends('blog.layout')

@section('content')
    <div class="sc-articles-summ">
        @foreach($categories as $cat)
            <div>{{$cat->name}}</div>
            <ul>
                @foreach($cat->articles as $article)
                    <li>{{$article->title}}</li>
                @endforeach
            </ul>
        @endforeach
    </div>

@endsection