@extends('blog.layout')

@section('title'){{'Tag - '.$Tagname.' | '.env('blog_name')}}@stop

@section('content')
    <div class="sc-articles-summ">
        @include('blog.partials.articleSum')
        <div class="sc-paginate">{!! $articles->render() !!}</div>
    </div>

@endsection

