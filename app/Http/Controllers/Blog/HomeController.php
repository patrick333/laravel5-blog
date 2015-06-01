<?php namespace App\Http\Controllers\Blog;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class HomeController extends Controller {

    /**
     * Display a listing of the articles.
     *
     * @return Response
     */
    public function index()
    {
        $page_size=env('num_per_page');
        //take: set the limit of the query
        //get: Execute the query as a "select" statement.
        $articles = \App\Article::with('tags', 'category')->published()->orderBy('updated_at', 'desc')->take($page_size)->get();

        return view('blog.index',compact('articles'));
    }

}
