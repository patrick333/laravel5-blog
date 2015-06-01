var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.less(['bootstrap/bootstrap.less','app.less']);

    mix.styles([
        'bootstrap.css',
        'font-awesome.min.css',
        'owl.carousel.css',
        'owl.theme.css',
        'metisMenu.css',
        'highlight.min.css',
        'emojify-emoticons.min.css',
        'sb-admin-2.css',
        'animate.css',
        'app.css',
    ],'public/css/final.css','public/css');

    mix.scripts([
        "jquery-2.0.3.min.js",
        "jquery.cookie.js",
        "bootstrap.min.js",
        "underscore-min.js",
        "backbone-min.js",
        "moment.min.js",
        'owl.carousel.min.js',
        'metisMenu.js',
        'highlight.min.js',
        'emojify.min.js',
        'sb-admin-2.js',
        "app.js"
    ],'public/js/final.js','public/js');
});
