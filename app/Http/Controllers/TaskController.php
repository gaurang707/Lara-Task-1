<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Project;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TaskController extends Controller
{
    public function index()
    {
        return view("tasks.index");
    }

    public function taskgetdata()
    {
        //$collection = Task::query();
        $collection = Task::with('project', 'assignee')->select('tasks.*');
        return Datatables::of($collection)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return view('tasks.action-buttons', compact('row'))->render();
            })
            ->addColumn('project_name', function ($task) {
                return $task->project ? $task->project->name : 'N/A';
            })
            ->addColumn('assignee_name', function ($task) {
                return $task->assignee ? $task->assignee->name : 'Unassigned';
            })
            // Enable Searching
            ->filterColumn('project_name', function ($query, $keyword) {
                $query->whereHas('project', function ($q) use ($keyword) {
                    $q->where('name', 'like', "%{$keyword}%");
                });
            })
            ->filterColumn('assignee_name', function ($query, $keyword) {
                $query->whereHas('assignee', function ($q) use ($keyword) {
                    $q->where('name', 'like', "%{$keyword}%");
                });
            })
            // Enable Ordering
            ->orderColumn('project_name', function ($query, $order) {
                $query->orderBy(Project::select('name')->whereColumn('projects.id', 'tasks.project_id'), $order);
            })
            ->orderColumn('assignee_name', function ($query, $order) {
                $query->orderBy(Project::select('name')->whereColumn('users.id', 'tasks.assigned_id'), $order);
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function create()
    {
        $projects = Project::select("id", "name")->orderBy('name', 'asc')->get();
        $statuses = ['pending', 'completed'];
        $assignees = User::select('id', 'name')->orderBy('name', 'asc')->get();
        return view('tasks.create', compact('projects', 'statuses', 'assignees'));
    }

    public function store(StoreTaskRequest $request)
    {
        Task::create($request->validated());
        return redirect()->route('tasks.index')
            ->with('success', 'Task created successfully.');
    }


    public function show(Task $task)
    {
        $task->load('project', 'assignee');
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        $task->load('project', 'assignee');
        // $projects = Project::select("id", "name")->where("deadline", ">=", now())->orderBy('name', 'asc')->get();
        $projects = Project::select("id", "name")->orderBy('name', 'asc')->get();
        $statuses = ['pending', 'completed'];
        $assignees = User::select('id', 'name')->orderBy('name', 'asc')->get();
        return view('tasks.edit', compact('task', 'projects', 'statuses', 'assignees'));
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->validated());
        return redirect()->route('tasks.index')->with('success', 'Task Updated Sucessfully');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully');
    }

    public function getdeadline(Request $request)
    {       
        $deadline = Project::where('id', $request->item_id)->first()->deadline;
        $message = $deadline ?? '';

        $data = [
            'item_id' => $request->item_id ?? '',
            'message' => $message,
            'status' => 'success'
        ];
        return response()->json($data);
    }
}
