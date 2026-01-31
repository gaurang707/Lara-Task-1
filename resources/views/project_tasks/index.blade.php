<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Project Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <h1 class="text-xl font-semibold mb-4">
                    Tasks for Project: {{ $project->name }}
                    <br />Project deadline: {{ $project->deadline }}
                </h1>

                <table class="datatable mdl-data-table dataTable" cellspacing="0" width="100%" role="grid"
                    style="width: 100%;" id="project-task-datatable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>                            
                            <th>Status</th>
                            <th>Assigned ID</th>
                            <th>Assigned To</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            $('#project-task-datatable').DataTable({
                processing: true,
                serverSide: false, // API returns full data
                ajax: {
                    url: '{{ url('/api/projects/' . $project->id . '/tasks') }}',
                    type: "GET",
                    headers: {
                        'Accept': 'application/json'
                    }
                },
                columns: [{
                        data: 'id',
                        data: 'id',
                        visible: true
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    // {
                    //     data: 'project_id',
                    //     name: 'project_id',
                    //     visible: false
                    // },
                    // {
                    //     data: 'project_name',
                    //     name: 'project.name', // Matches your server-side whereHas/filterColumn logic
                    //     title: 'Project Name'
                    // },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'assigned_id',
                        name: 'assigned_id',
                        visible: false

                    },
                    {
                        data: 'assignee_name',
                        name: 'assignee.name',

                    },
                    {
                        data: 'createdAt',
                        name: 'createdAt',
                        orderable: false,
                        searchable: false
                    },

                ],
                order: [
                    [0, 'desc']
                ]
            });
        });
    </script>
</x-app-layout>
