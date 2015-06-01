<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class DashboardViewComposerServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeDashboard();
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

    private function composeDashboard()
    {
        view()->composer('admin.index',function($view){

            $numArticle=\App\Article::count();
            $numCategory=\App\Category::count();
            $numTag=\App\Tag::count();
            $numProject=\App\Project::count();
            $numMessage=\App\Message::count();


            $view->with(compact('numArticle','numCategory','numTag','numProject','numMessage'));
        });
    }

}
