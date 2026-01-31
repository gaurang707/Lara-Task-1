<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("projects.index");
    }
    public function getdata()
    {
        $collection = Project::query();
        return Datatables::of($collection)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return view('projects.action-buttons', compact('row'))->render();                
            })           
            ->rawColumns(['action'])
            ->make(true);
        //return DataTables::of($collection)->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(view: 'projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        Project::create($request->validated()); 
        return redirect()->route('projects.index')
                        ->with('success','Project created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $deadline = Carbon::parse($project->deadline);     
        return view('projects.show', compact('project', 'deadline'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {    
        $deadline = Carbon::parse($project->deadline);     
        return view('projects.edit', compact('project', 'deadline'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->update($request->validated());
        return redirect()->route('projects.index')->with('success','Project Updated Sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')->with('success','Project deleted successfully');
    }
}
