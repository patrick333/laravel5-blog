@extends('blog.layout')

@section('title'){{'All the tags'.' | '.env('blog_name')}}@stop

@section('content')
    <div class="sc-article">
        <div class="sc-article-title">
            <h1>All the tags are listed below</h1>
        </div>
        <div class="sc-article-body">
            @foreach($tags as $tag)
                <h3 class="tag-title">
                    <a href="/blog/tags/{{ $tag->slug }}">{{$tag->name}}</a>
                    <a href="javascript:void(0);" class="tag-control" data-toggle="tooltip" data-placement="right"
                       title="Show relevant articles">
                        <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </h3>
                <div class="tag-content animated fadeInUp">
                    <ul>
                        @foreach($tag->articles as $article)
                            @if($article->published)
                            <li><a class="slide-l-to-r" href="/blog/{{ $article->slug }}">{{$article->title}}</a>

                                @unless($article->subhead==null)
                                    <div class="subhead">{{ $article->subhead }}</div>
                                @endunless
                                <div class="sc-article-meta">
                                    Last updated: about {{ $article->created_at->diffForHumans() }}.
                                </div>
                            </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            @endforeach

        </div>
    </div>


@endsection