<?php namespace App\Http\Controllers\Blog;

use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ArticlesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $page_size=env('num_per_page');
        $articles = Article::with('tags', 'category')->published()->orderBy('updated_at', 'desc')->paginate($page_size);

        return view('blog.articles.index',compact('articles'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return Response
     */
    public function show($slug)
    {
        $article = Article::findBySlug($slug);
        if($article->published==0){
            abort(404);
        }
        return view('blog.articles.show',compact('article'));
    }

}
