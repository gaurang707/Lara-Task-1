<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Task - Edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">

                <div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

                <form action="{{ route('tasks.update', $task) }}" method="post">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-6">
                        <label for="title" class="block mb-2.5 text-sm font-medium text-heading">Task Title</label>
                        <input type="text" name="title"
                            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            placeholder="" value="{{ old('title', $task->title) }}"/>
                    </div>

                    <div class="mb-6">
                        <label for="name" class="block mb-2.5 text-sm font-medium text-heading">Prject
                            name</label>
                        <select name="project_id" id="">
                            <option value="">--Select project--</option>
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}" @if (old('project_id', $task->project->id) == $project->id) selected @endif>
                                    {{ $project->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-6">
                        <label for="status" class="block mb-2.5 text-sm font-medium text-heading">Status</label>
                        <select name="status" id="">
                            @foreach ($statuses as $statusval)
                                <option value="{{ $statusval }}" @if (old('status', $task->status) == $statusval) selected @endif>
                                    {{ $statusval }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-6">
                        <label for="assigned_id" class="block mb-2.5 text-sm font-medium text-heading">Assign Id
                        </label>
                        <select name="assigned_id" id="">
                            <option value="">--Select Assignee for task--</option>
                            @foreach ($assignees as $assignee)
                                <option value="{{ $assignee->id }}" @if (old('assigned_id', $task->assignee->id) == $assignee->id) selected @endif>
                                    {{ $assignee->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit"
                        class="text-blue bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none"
                        style="color:blue; border: 1px solid lightblue;">Submit</button>
                </form>


            </div>
        </div>
    </div>

    <script>
        $(function() {
            // Calculate tomorrow's date
            var tomorrow = new Date();
            tomorrow.setDate(tomorrow.getDate() + 1);

            // Initialize the datepicker
            $("#deadline-cal").datepicker({
                dateFormat: 'yy-mm-dd', // Set the date format to YYYY-MM-DD
                minDate: tomorrow, // Disable today and past dates (minimum date is tomorrow)
                defaultDate: tomorrow // Set the default highlighted date to tomorrow
            });

            // Set the input field's initial value to tomorrow's date in the specified format
            $("#deadline-cal").val($.datepicker.formatDate('yy-mm-dd', tomorrow));
        });
    </script>

</x-app-layout>
