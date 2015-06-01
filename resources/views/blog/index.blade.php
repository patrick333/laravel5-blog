@extends('blog.layout')

@section('title'){{env('blog_description').' | '.env('blog_name')}}@endsection

@section('content')
    <div class="sc-articles-summ">
        @include('blog.partials.articleSum')
    </div>

@endsection

