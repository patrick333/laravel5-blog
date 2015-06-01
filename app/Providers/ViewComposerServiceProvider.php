<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
        $this->composeSidebar();
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

    private function composeSidebar()
    {
        view()->composer('blog.partials.side',function($view){

//            $allTags=\App\Tag::all();
            $allCategories=\App\Category::getSortedCategories();
            $NewestArticles=\App\Article::published()->orderBy('updated_at', 'desc')->take(10)->get();
            //take() is alias of limit().

            $view->with(compact('allCategories', 'NewestArticles'));
//            $view->with(compact('allTags', 'NewestArticles'));
        });

        view()->composer('home.partials.side',function($view){

            $NewestArticles=\App\Article::published()->orderBy('updated_at', 'desc')->take(10)->get();


            $view->with(compact('NewestArticles'));
        });
    }

}
