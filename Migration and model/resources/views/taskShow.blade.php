@extends('taskTemplate')

<div class="max-w-2xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <div class="bg-white shadow-lg overflow-hidden rounded-xl">
        <div class="px-6 py-5 border-b border-gray-300 flex justify-between items-center">
            <h1 class="text-3xl font-bold text-gray-900">Task List</h1>
            <a href="{{ url('/tasks/create') }}" class="inline-flex items-center px-5 py-2 border border-transparent rounded-lg shadow-sm text-white bg-blue-600 hover:bg-blue-700 transition duration-150">
                + Add New Task
            </a>
        </div>
        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg mt-4 mx-6">
                {{ session('success') }}
            </div>
        @endif
        <ul class="divide-y divide-gray-200">
            @forelse($tasks as $task)
                <li class="px-6 py-4 hover:bg-gray-50 transition duration-150">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">{{ $task->title }}</h3>
                            <p class="text-sm text-gray-600">{{ $task->description }}</p>
                        </div>
                        <a href="{{ route('tasks.show', $task->id) }}" class="text-blue-600 hover:text-blue-800">View Details →</a>
                    </div>
                </li>
            @empty
                <p class="text-center text-gray-500 py-6">No tasks found. Add a new one to get started!</p>
            @endforelse
        </ul>
    </div>
</div>
