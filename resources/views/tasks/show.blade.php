<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tasks- Show') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">

                <div class="mb-6" style="float:right;">
                    <button onclick="history.back()" class="button btn-primary">Go Back</button>
                </div>

                <div class="mb-6">
                    <label for="name" class="text-bold block mb-2.5 text-sm font-medium text-heading">Task Title:</label>
                    <span>
                        {{ $task->title }}
                    </span>
                </div>
                <div class="mb-6">
                    <label for="name" class="block mb-2.5 text-sm font-medium text-heading">Project
                        name:</label>
                    <span>
                        {{ $task->project->name }}
                    </span>
                </div>                
                <div class="mb-6">
                    <label for="status" class="block mb-2.5 text-sm font-medium text-heading">Status:</label>
                    <span>
                        {{ $task->status }}
                    </span>
                </div>
                <div class="mb-6">
                    <label for="assigned_id" class="block mb-2.5 text-sm font-medium text-heading">Assigned To :</label>
                    <span>
                        {{ $task->assignee->email }} ({{ $task->assignee->name }})
                    </span>
                </div>
                <div class="mb-6">
                    <label for="created_at" class="block mb-2.5 text-sm font-medium text-heading">Created At:</label>
                    <span>
                        {{ $task->created_at }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
