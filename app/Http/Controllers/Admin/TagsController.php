<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Tag;
use App\Http\Requests\TagRequest;
use Illuminate\Http\Request;

class TagsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $num_per_page=env('num_per_page_admin');
        $tags = Tag::latest()->paginate($num_per_page);

        return view('admin.tags.index',compact('tags'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('admin.tags.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(TagRequest $request)
	{
        $attributes = $request->all();
        $slug=$this->getSlug($request->input('name'), false);
        if($slug==false){
            flash()->error('You need a different name!');
            return redirect('admin/tags/create');
        }
        $attributes['slug'] =$slug;
        Tag::create($attributes);

        flash()->success('Your tag has been created!');

        return redirect('admin/tags');
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
        $tag = Tag::findOrFail($id);
        $tags = \App\Tag::lists('name', 'id');

        return view('admin.tags.edit',compact('tag', 'tags'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(TagRequest $request, $id)
	{
        $tag = Tag::findOrFail($id);
        $attributes = $request->all();

        if($tag->slug!=str_slug($request->input('name'))){
            $slug=$this->getSlug($request->input('name'), false);
            if($slug==false){
                flash()->error('You need a different name!');
                return redirect('admin/tags/'.$id.'/edit');
            }
            $attributes['slug'] =$slug;
        }

        $tag->update($attributes);

        return redirect('admin/tags');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        Tag::find($id)->delete();
        return redirect('admin/tags');
	}


    public function getSlug($title, $allow_overlap=true)
    {
        $slug = str_slug($title);

        $slugCount = count(Tag::whereRaw("slug REGEXP '^{$slug}(-[0-9]*)?$'")->get());

        if($allow_overlap==false){
            return ($slugCount > 0) ? false : $slug;
        }
        else{
            return ($slugCount > 0) ? "{$slug}-{$slugCount}" : $slug;
        }
    }

}
