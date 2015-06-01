<div class="sc-side-section sc-side-share">
    <h3>Follow Me</h3>
    <ul class="sc-social-icons text-center list-unstyled list-inline">
        <li><a href="https://www.facebook.com/speihui" class="sc-social-icon"><i class="fa fa-facebook fa-lg"></i></a></li>
        <li><a href="https://plus.google.com/u/0/103909270251862925414" class="sc-social-icon"><i class="fa fa-google-plus fa-lg"></i></a></li>
        <li><a href="https://ca.linkedin.com/in/peihuishao" class="sc-social-icon"><i class="fa fa-linkedin fa-lg"></i></a></li>
        <li><a href="https://twitter.com/patrick_shao" class="sc-social-icon"><i class="fa fa-twitter fa-lg"></i></a></li>
    </ul>
</div>
{{--https://github.com/patrick333/--}}


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
    {{--<h3>Recent Tweets</h3>--}}
{{--</div>--}}
