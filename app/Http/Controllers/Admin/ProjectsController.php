<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Project;
use App\Http\Requests\ProjectRequest;
use Illuminate\Http\Request;

class ProjectsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $num_per_page=env('num_per_page_admin');
        $projects = Project::latest()->paginate($num_per_page);

        return view('admin.projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ProjectRequest $request)
    {
        $attributes = $request->all();
        Project::create($attributes);

        flash()->success('Your project has been created!');

        return redirect('admin/projects');
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
        $project = Project::findOrFail($id);
        $projects = \App\Tag::lists('name', 'id');

        return view('admin.projects.edit',compact('project', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(ProjectRequest $request, $id)
    {
        $project = Project::findOrFail($id);


        $project->update($request->all());

        return redirect('admin/projects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Project::find($id)->delete();
        return redirect('admin/projects');
    }


}