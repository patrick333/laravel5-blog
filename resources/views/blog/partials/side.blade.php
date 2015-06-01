<div class="sc-side-section">
    <h3>Categories</h3>
    <ul class="list-unstyled">
        @foreach($allCategories as $category)
            @if($category->parent_id > 0)
                <li class="sub-li">
                    &nbsp;&nbsp;
                    <i class="fa fa-angle-left animated pulse"></i>
                    <a href="/blog/categories/{{ $category->slug }}">{{ $category->name }}</a>
                </li>
            @else
                <li>
                    <i class="fa fa-angle-left animated pulse"></i>
                    <a href="/blog/categories/{{ $category->slug }}">{{ $category->name }}</a>
                </li>
            @endif


        @endforeach
    </ul>
</div>

<div class="sc-side-section">
    <h3>Recent posts</h3>
    <ul class="list-unstyled">
        @foreach($NewestArticles as $article)
            <li>
                <i class="fa fa-angle-left animated pulse"></i>
                <a href="/blog/{{ $article->slug }}">{{ $article->title }}</a>
            </li>
        @endforeach
    </ul>
</div>


{{--<div class="sc-side-section">--}}
{{--<h3>Links</h3>--}}
{{--<ul class="list-unstyled">--}}
{{--<li><a href="http://www.90door.com">林大帅博客</a></li>--}}
{{--<li><a href="http://www.57kan.com">微阅读</a></li>--}}
{{--<li><a href="http://www.baidu.com">百度</a></li>--}}
{{--<li><a href="http://www.haosou.com">好搜</a></li>--}}
{{--<li><a href="http://www.google.com">谷歌</a></li>--}}
{{--</ul>--}}
{{--</div>--}}


{{--<div class="sc-side-section">--}}
{{--<h3>Recent comments</h3>--}}
{{--<div class="sc-side-comments">--}}
{{--<script type="text/javascript" src="http://peihuishao.disqus.com/recent_comments_widget.js?num_items=8&hide_avatars=0&avatar_size=30&excerpt_length=150"></script>--}}
{{--<script type="text/javascript" src="http://funbutlearn.disqus.com/recent_comments_widget.js?num_items=8&hide_avatars=0&avatar_size=30&excerpt_length=150"></script>--}}
{{--</div>--}}
{{--</div>--}}