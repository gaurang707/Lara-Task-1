<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectTaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            //"project_id" => $this->project_id,
            //"project_name" => $this->project->name,
            "status" => $this->status,
            "assigned_id" => $this->assigned_id,
            "assignee_name" => $this->assignee->name,
            "createdAt" => $this->created_at,
        ];
        // return [
        //     "type" => "task",
        //     "id" => $this->id,
        //     "attributes" => [
        //         "title" => $this->title,
        //         "project_id" => $this->project_id,
        //         "project_name" => $this->project->name,
        //         "status" => $this->status,
        //         "assigned_id" => $this->assigned_id,
        //         "assignee_name" => $this->assignee->name,
        //         "createdAt" => $this->created_at,
        //     ],
        //     "relationships"=> [
        //         "project" => [
        //             "data" => [
        //                 "type" => "project",
        //                 "id"=> $this->project_id,
        //             ]
        //         ],
        //         "links" => [
        //             "self" => route("projects.show", ["project" => $this->project_id] )
        //         ]
        //     ],
        //     "links" => [
        //         "self" => route("tasks.show", ["task"=> $this->id])
        //     ]
        // ];
    }
}
