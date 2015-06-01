<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('home', ['middleware' => 'auth', 'uses' => 'Home\HomeController@index']);
Route::get('profile', ['middleware' => 'auth.basic', function ()
{
    return "auth.basic";
}]);


Route::get('sitemap', function ()
{
    $sitemap = App::make("sitemap");

    $sitemap->add(env('site_url'), '2015-04-25T20:10:00+02:00', '0.2', 'daily');
    $sitemap->add(env('site_url').'/blog', '2015-04-26T12:30:00+02:00', '0.2', 'daily');
    $sitemap->add(env('site_url').'/blog/articles', '2015-04-26T12:30:00+02:00', '0.1', 'daily');

    $articles = \App\Article::published()->orderBy('created_at', 'desc')->get();

    foreach ($articles as $article)
    {
        $sitemap->add(env('site_url').'/blog/'.$article->slug, $article->updated_at, '0.1', 'daily');
    }

//        $sitemap->store('xml', 'sitemap');

    return $sitemap->render('xml');
});

Route::controllers([
    'auth'     => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);


Route::group(['namespace' => 'Home'], function ()
{
    Route::get('/', 'HomeController@index');
    Route::post('messages/contact', 'MessagesController@contactMe');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function ()
{
    Route::get('/', 'HomeController@index');

    Route::get('articles/indexActions', 'ArticlesController@indexActions');
    Route::get('articles/trash', 'ArticlesController@trash');
    Route::post('articles/restore/{id}', 'ArticlesController@restore');
    Route::delete('articles/forceDelete/{id}', 'ArticlesController@forceDelete');
    Route::post('articles/publish/{id}', 'ArticlesController@publish');
    Route::post('articles/unpublish/{id}', 'ArticlesController@unpublish');
    Route::resource('articles', 'ArticlesController');


    Route::resource('categories', 'CategoriesController');
    Route::resource('tags', 'TagsController');
    Route::resource('projects', 'ProjectsController');

    Route::get('messages', 'MessagesController@index');

    Route::get('setting/flush', function ()
    {
        \Cache::flush();

        return 'cache flush ok';
    });

});

Route::group(['prefix' => 'blog', 'namespace' => 'Blog'], function ()
{
    Route::get('/', 'HomeController@index');

    Route::get('tags', 'TagsController@index');
    Route::get('tags/{slug}', 'TagsController@show');

    Route::get('categories/{slug}', 'CategoriesController@show');

    Route::get('articles', 'ArticlesController@index');
    Route::get('{slug}', 'ArticlesController@show');
});
