@foreach($articles as $article)
    <div class="sc-article-summ">
        <div class="sc-article-title">
            <h1>
                <a class="slide-l-to-r" href="/blog/{{ $article->slug }}">{{ $article->title }}
                </a>
            </h1>
            @unless($article->subhead==null)
                <div class="subhead">{{ $article->subhead }}</div>
            @endunless

            <div class="sc-article-meta">Posted in <a
                        href="/blog/categories/{{ $article->category->slug }}">{{ $article->category->name }}</a>
                @unless($article->tags->count()==0)
                    and tagged
                    @foreach($article->tags as $key => $tag)
                        <a href="/blog/tags/{{ $tag->slug }}">{{ $tag->name }}</a>
                    @endforeach
                @endunless
                 Updated about <span class="sc-article-meta-time">{{ $article->updated_at->diffForHumans() }}</span>
            </div>
        </div>

        <div class="sc-article-body">
            @if($article->excerpt==null)
                {!! str_limit($article->body_html, $limit = 500, $end = '...') !!}
            @else
                {!! $article->excerpt_html !!}
                <p>..................</p>
            @endif
        </div>
    </div>
@endforeach