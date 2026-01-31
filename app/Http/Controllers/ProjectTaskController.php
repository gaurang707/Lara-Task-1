<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectTaskResource;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Project $project)
    {
        // echo $project->tasks()->latest()->count();
        // exit;
        return response()->json([
            'data' => ProjectTaskResource::collection($project->tasks()->latest()->get())
        ]);

        // return response()->json([
        //     'success' => true,
        //     'data' => $tasks,
        //     'message' => 'Tasks Fetch sucessfully'
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
