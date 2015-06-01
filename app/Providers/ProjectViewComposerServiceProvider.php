<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ProjectViewComposerServiceProvider extends ServiceProvider {

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
        view()->composer('home.partials.projects',function($view){

            $projects=\App\Project::latest()->get();
            $num=count($projects);

            $view->with(compact('projects','num'));
        });
    }

}
