<?php namespace App\Http\Controllers\Blog;


use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CategoriesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $categories = Category::with('articles')->latest()->get();
        return view('blog.cats.index', compact('categories'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($slug)
    {
        $page_size = env('num_per_page');

//        //method I.               num of queries:  17.
//        $articles = Category::findBySlug($slug)->articles()->latest()->paginate($page_size);

        //method II: eager loading. num of queries 5
        //http://php.net/manual/en/functions.anonymous.php   "use" to inherit variables from its parent scope
        //whereSlug($slug) equals to where('slug', '=', $slug).
        $articles = \App\Article::with('tags', 'category')->published()->whereHas('category', function ($query) use ($slug)
        {
            $query->whereSlug($slug);
        })->latest()->paginate($page_size);

        $Catname=Category::whereSlug($slug)->firstOrFail()->name;
        return view('blog.cats.show', compact('articles','Catname'));
    }


}
