<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">

                <div>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>

                <div style="float:right;padding:2px;">
                    <a href="{{ route('tasks.create') }}"
                        style="padding:2px; margin:1px; color:blue; border:1px solid lightblue;">Create New Task</a>
                </div>

                <table class="datatable mdl-data-table dataTable" cellspacing="0" width="100%" role="grid"
                    style="width: 100%;" id="task-datatable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Project</th>
                            <th>Project Name</th>
                            <th>Status</th>
                            <th>Assigned ID</th>
                            <th>Assigned To</th>
                            <th>Created At</th>
                            <th>Action</th>
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
            $('#task-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ url('taskgetdata') }}',
                columns: [{
                        data: 'id',
                        data: 'id',
                        visible: false
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'project_id',
                        name: 'project_id',
                        visible:false
                    },
                    {
                        data: 'project_name',
                        name: 'project.name', // Matches your server-side whereHas/filterColumn logic
                        title: 'Project Name'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'assigned_id',
                        name: 'assigned_id',
                        visible:false
                        
                    },
                    {
                        data: 'assignee_name',
                        name: 'assignee.name',                        
                        
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ],
                order: [
                    [0, 'desc']
                ]
            });
        });
    </script>
</x-app-layout>
