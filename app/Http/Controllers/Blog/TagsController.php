<?php namespace App\Http\Controllers\Blog;

use App\Tag;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class TagsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $tags = Tag::with('articles')->orderBy('name')->get();
        return view('blog.tags.index', compact('tags'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($slug)
    {
        $page_size=env('num_per_page');

//        $articles = Tag::findBySlug($slug)->articles()->latest()->paginate($page_size);
        $articles = \App\Article::with('tags', 'category')->published()->whereHas('tags', function($query) use($slug)
        {
            $query->whereSlug($slug);
        })->latest()->paginate($page_size);

        $Tag = Tag::whereSlug($slug)->firstOrFail();
        $Tagname=$Tag->name;
        return view('blog.tags.show',compact('articles','Tagname'));
    }

}
