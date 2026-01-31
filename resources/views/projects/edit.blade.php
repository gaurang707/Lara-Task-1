<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Project') }}
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

                <form action="{{ route('projects.update', $project) }}" method="post">
                    @csrf
                    @method("PUT")
                    <div class="mb-6">
                        <label for="name" class="block mb-2.5 text-sm font-medium text-heading">Prjoect
                            name</label>
                        <input type="text" name="name"
                            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            placeholder=""  value="{{ old('name', $project->name) }}"/>
                    </div>

                    <div class="mb-6">
                        <label for="description"
                            class="block mb-2.5 text-sm font-medium text-heading">Description</label>
                        <textarea name="description"
                            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body">{{ old('description', $project->description) }}</textarea>
                    </div>
                    <div class="mb-6">
                        <label for="deadline" class="block mb-2.5 text-sm font-medium text-heading">Deadline</label>
                        <input type="text" id="deadline-cal" name="deadline"
                            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            placeholder="" />
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
