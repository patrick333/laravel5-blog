<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\Http\Requests\CategoryRequest;

use Illuminate\Http\Request;

/**
 * Class CategoriesController
 * @package App\Http\Controllers\Admin
 */
class CategoriesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
//        $num_per_page=env('num_per_page_admin');
//        $categories = Category::getSortedCategories()->paginate($num_per_page);
//pagination are not possible with getSortedCategories...

        $categories = Category::getSortedCategories();
        return view('admin.cats.index',compact('categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $categories = Category::getTopLevel()->lists('name', 'id');

        $categories =['0' => '/'] + $categories;

        return view('admin.cats.create', compact('categories'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CategoryRequest $request)
	{
        $attributes = $request->all();
        $slug=$this->getSlug($request->input('name'), false);
        if($slug==false){
            flash()->error('You need a different name!');
            return redirect('admin/categories/create');
        }
        $attributes['slug'] =$slug;

        Category::create($attributes);

        flash()->success('Your category has been created!');
        \Cache::tags('categories')->flush();

        return redirect('/admin/categories');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $category = Category::findOrFail($id);
        $categories = \App\Category::getTopLevel()->lists('name', 'id');

        $categories =['0' => '/'] + $categories;

        return view('admin.cats.edit',compact('category', 'categories'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(CategoryRequest $request, $id)
	{
        $category = Category::findOrFail($id);
        $attributes = $request->all();

        if($category->slug!=str_slug($request->input('name'))){
            $slug=$this->getSlug($request->input('name'), false);
            if($slug==false){
                flash()->error('You need a different name!');
                return redirect('admin/categories/'.$id.'/edit');
            }
            $attributes['slug'] =$slug;
        }

        $category->update($attributes);

        \Cache::tags('categories')->flush();

        return redirect('admin/categories');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        if(Category::find($id)->articles()->count()!=0){
            flash('This category has articles, and therefore cannot be deleted now.');
            return redirect('admin/categories');
        }

        Category::find($id)->delete();
        \Cache::tags('categories')->flush();

        return redirect('admin/categories');
	}


    public function getSlug($title, $allow_overlap=true)
    {
        $slug = str_slug($title);

        $slugCount = count(Category::whereRaw("slug REGEXP '^{$slug}(-[0-9]*)?$'")->get());

        if($allow_overlap==false){
            return ($slugCount > 0) ? false : $slug;
        }
        else{
            return ($slugCount > 0) ? "{$slug}-{$slugCount}" : $slug;
        }
    }

}
