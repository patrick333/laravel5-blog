<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <link rel="icon" type="image/png" href="/images/blue-trident-within-a-shape.png"/>
    <link rel="stylesheet" href="/css/final.css">

    @yield('head')

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

        @include('admin.partials.header')
        @include('admin.partials.side')

    </nav>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><a href="javascript:void(0);" class="admin-fullscreen-ctrl"><i class="glyphicon glyphicon-fullscreen"></i></a> @yield('title')</h3>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        @include('flash::message')
        <div class="row">
            @yield('content')
        </div>

        <div class="row">
            <div class="col-lg-8">
                @include('errors.list')
            </div>
        </div>

        <div class="row">
            @yield('bottom')
        </div>
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->


<script src="/js/final.js"></script>
@yield('footer')

</body>

</html>
