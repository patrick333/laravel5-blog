<?php namespace App\Http\Controllers\Admin;


use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;

use Illuminate\Http\Request;

class ArticlesController extends Controller {


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $num_per_page = env('num_per_page_admin');
        $articles = Article::with('tags', 'category')->latest()->paginate($num_per_page);

//        dd($articles);
        return view('admin.articles.index', compact('articles'));
    }

    public function indexActions()
    {
        $num_per_page = env('num_per_page_admin');
        $articles = Article::with('tags', 'category')->latest()->paginate($num_per_page);

        return view('admin.articles.indexActions', compact('articles'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $tags = \App\Tag::lists('name', 'id');

        $categories = \App\Category::getLeveledCategories();

        return view('admin.articles.create', compact('tags', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ArticleRequest $request)
    {
        $attributes = $request->all();
        $slug = $this->getSlug($request->input('title'), false);
        if ($slug == false)
        {
            flash()->error('You need a different title!');

            return redirect('admin/articles/create');
        }
        $attributes['slug'] = $slug;

        $article = Article::create($attributes);

        $this->syncTags($article, $request->input('tag_list'));
        flash()->success('Your article has been created!');

        return redirect('/admin/articles/'.$article->id.'/edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($slug)
    {
        $article = Article::findBySlug($slug);

        return view('admin.articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);

        $tags = \App\Tag::lists('name', 'id');

        $categories = \App\Category::getLeveledCategories();

//        dd(\Cache::tags('categories')->get('leveled_categories'));


        return view('admin.articles.edit', compact('article', 'tags', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(ArticleRequest $request, $id)
    {
        $article = Article::findOrFail($id);
        $attributes = $request->all();

        if ($article->slug != str_slug($request->input('title')))
        {
            $slug = $this->getSlug($request->input('title'), false);
            if ($slug == false)
            {
                flash()->error('You need a different title!');

                return redirect('admin/articles/' . $id . '/edit');
            }
            $attributes['slug'] = $slug;
        }


        $article->update($attributes);
        $this->syncTags($article, $request->input('tag_list'));

        return redirect('/admin/articles/'.$id.'/edit');
    }

    /**
     * Publish the aritcle
     *
     * @param  int $id
     * @return Response
     */
    public function publish($id)
    {
        $article = Article::findOrFail($id);
        $article->published = 1;
        $article->save();
//        dd($article->published);
        flash()->success('Your article "' . $article->title . '"" has been published!');

        return redirect('/admin/articles/indexActions');
    }

    /**
     * Unpublish the aritcle
     *
     * @param  int $id
     * @return Response
     */
    public function unpublish($id)
    {
        $article = Article::findOrFail($id);
        $article->published = 0;  //setter
        $article->save();
        flash()->warning('Your article "' . $article->title . '"" has been unpublished!');

        return redirect('/admin/articles/indexActions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public
    function destroy($id)
    {
        Article::find($id)->delete();

        return redirect('/admin/articles/trash');
    }

    public
    function trash()
    {
        $num_per_page = env('num_per_page_admin');
        $articles = Article::with('tags', 'category')->onlyTrashed()
            ->latest('deleted_at')->paginate($num_per_page);

//        dd($articles);

        return view('/admin.articles.trash', compact('articles'));
    }

    public
    function restore($id)
    {
        Article::onlyTrashed()->find($id)->restore();

        return redirect('/admin/articles');
    }

    public
    function forceDelete($id)
    {
        Article::onlyTrashed()->find($id)->forceDelete();

        return redirect('/admin/articles/trash');
    }


    public
    function syncTags(Article $article, $tags)
    {
//        var_dump($article->tags());
//        var_dump($tags); //e.g. 0=>'3', 1=>'10'. or with a new tag 'test':  e.g. 0=>'3', 1=>'test'

        if ($tags === null)
        {
            $article->tags()->detach();

            return;
        }
        foreach ($tags as $key => $tag)
        {
            if ( ! is_numeric($tag))
            {
                $newTag = \App\Tag::create(['name' => $tag, 'slug' => $tag]);
                $tags[ $key ] = $newTag->id;
            }
        }
        $article->tags()->sync($tags);
    }

    public
    function getSlug($title, $allow_overlap = true)
    {
        $slug = str_slug($title);

        $slugCount = count(Article::whereRaw("slug REGEXP '^{$slug}(-[0-9]*)?$'")->get());

        if ($allow_overlap == false)
        {
            return ($slugCount > 0) ? false : $slug;
        } else
        {
            return ($slugCount > 0) ? "{$slug}-{$slugCount}" : $slug;
        }
    }


}
