<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>@yield('title', env('site_name'))</title>

    <link rel="icon" type="image/png" href="/images/blue-trident-within-a-shape.png"/>
    <link rel="stylesheet" href="/css/final.css">

    <script type="text/javascript" src="/js/final.js"></script>
</head>

<body>
<!-- Google Tag Manager -->
<noscript>
    <iframe src="//www.googletagmanager.com/ns.html?id=GTM-W5PWHS"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<script>(function (w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(), event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
                '//www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-W5PWHS');</script>
<!-- End Google Tag Manager -->
@yield('header')

<div class="float-flash">
    @include('flash::message')
</div>

<div class="float-error">
    @include('errors.list')
</div>

<div class="container main-frame">

    <div clas="row">
        <div class="col-md-9 main-body">
            <div class="main-content">
                <button class="btn sc-side-control sc-side-displayed">
                    <i class="fa fa-arrow-right"></i>
                </button>
                <div class="sc-side-dock">

                </div>

                <div class="container-fluid">
                    @yield('content')
                </div>

            </div>


        </div>
        <div class="col-md-3 side animated">
            <div class="side-content">
                @yield('side')
            </div>
        </div>
    </div>


</div>


@yield('footer')


</body>
</html>
