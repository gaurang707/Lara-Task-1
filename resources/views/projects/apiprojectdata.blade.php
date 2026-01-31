<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __(key: 'API Project Data') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
             
                <table class="datatable mdl-data-table dataTable" cellspacing="0" width="100%" role="grid"
                    style="width: 100%;" id="project-datatable-api">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Deadline</th>
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
            $('#project-datatable-api').DataTable({
                processing: true,
                serverSide: false,
                ajax: {
                    url: '{{ url('api/projects') }}',
                    type: "GET",
                    headers: {
                        "Accept": 'application/json' 
                    }
                },
                columns: [{
                        data: 'id',
                        data: 'id',
                        visible:false                        
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'description',
                        name: 'description'
                    },
                    {
                        data: 'deadline',
                        name: 'deadline'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        orderable: false,
                        searchable: false
                    },                    
                ],
                order: [[0, 'desc']]
            });
        });
    </script>
</x-app-layout>
