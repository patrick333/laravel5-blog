@extends('blog.layout')

@section('title'){{'Article - '.$article->title.' | '.env('blog_name')}}@stop

@section('content')

    <div class="sc-article">
        <div class="sc-article-title">
            <h1>
                {{ $article->title }}
            </h1>
            @unless($article->subhead==null)
                <div class="subhead">{{ $article->subhead }}</div>
            @endunless

            <div class="sc-article-meta">Posted in <a
                        href="/blog/categories/{{ $article->category->slug }}">{{ $article->category->name }}</a>
                Updated about <span class="sc-article-meta-time">{{ $article->updated_at->diffForHumans() }}</span>
            </div>
        </div>
        <div class="sc-article-body">
            {!! $article->body_html !!}
        </div>

        <div class="sc-article-share-panel shrinked">
            <ul class="list-unstyled">
                <li><a href="#" class="sc-social-icon sc-social-control"><i class="fa fa-share-alt fa-lg"></i></a></li>
                <li><a href="#" class="sc-social-icon"><i class="fa fa-facebook fa-lg"></i></a></li>
                <li><a href="#" class="sc-social-icon"><i class="fa fa-google-plus fa-lg"></i></a></li>
                <li><a href="#" class="sc-social-icon"><i class="fa fa-linkedin fa-lg"></i></a></li>
                <li><a href="#" class="sc-social-icon"><i class="fa fa-twitter fa-lg"></i></a></li>
            </ul>
        </div>

        @unless($article->tags->count()==0)
            <div class="sc-article-tags">
                Tagged in: @foreach($article->tags as $key => $tag)
                    <a href="/blog/tags/{{ $tag->slug }}">{{ $tag->name }}</a>
                @endforeach
            </div>
        @endunless

        <div id="disqus_thread" class="sc-article-comments"></div>
        <script type="text/javascript">
            /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
            var disqus_shortname = 'peihuishao'; // required: replace example with your forum shortname

            /* * * DON'T EDIT BELOW THIS LINE * * */
            (function () {
                var dsq = document.createElement('script');
                dsq.type = 'text/javascript';
                dsq.async = true;
                dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
            })();
        </script>
        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by
                Disqus.</a></noscript>


    </div>


@endsection

{{--<span style="font-weight:200"> article with subhead, excerpt</span><br/>--}}
{{--<span style="font-weight:300"> article with subhead, excerpt</span><br/>--}}
{{--{{ $article->title }}<br/>--}}
{{--<span style="font-weight:600"> article with subhead, excerpt</span><br/>--}}
{{--<span style="font-weight:700"> article with subhead, excerpt</span><br/>--}}
{{--<span style="font-weight:900"> article with subhead, excerpt</span>--}}