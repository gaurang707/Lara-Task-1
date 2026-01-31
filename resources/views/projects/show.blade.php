<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Project') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">


                <div class="mb-6">
                    <label for="name" class="block mb-2.5 text-sm font-medium text-heading">Prjoect
                        name:</label>
                        <span>
                            {{ $project->name }}
                        </span>                    
                </div>

                <div class="mb-6">
                    <label for="description" class="block mb-2.5 text-sm font-medium text-heading">Description:</label>
                    <span>
                        {{ $project->description }}
                    </span>
                  
                </div>
                <div class="mb-6">
                    <label for="deadline" class="block mb-2.5 text-sm font-medium text-heading">Deadline:</label>
                    <div id="deadline-cal"></div>
                </div>


            </div>
        </div>
    </div>

    <script>
        $(function() {
            // Initialize the datepicker
            $("#deadline-cal").datepicker({
                dateFormat: 'yy-mm-dd', // Set the date format to YYYY-MM-DD           
            });

            var customDate = new Date({{ $deadline->year }}, {{ $deadline->month }}, {{ $deadline->day }});
            // Set the input field's initial value to tomorrow's date in the specified format
            $("#deadline-cal").datepicker("setDate", customDate);
        });
    </script>

</x-app-layout>
