@extends('taskTemplate')

<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-lg mt-10">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-extrabold text-gray-900">Tasks</h2>
        <a href="{{ url('/tasks/create') }}" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-6 rounded-lg shadow-md transition duration-200">
            + Add Task
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-50 border-l-4 border-green-400 text-green-700 p-4 rounded-lg mb-6">
            {{ session('success') }}
        </div>
    @endif

    <ul class="divide-y divide-gray-200">
        @forelse($tasks as $task)
            <li class="p-4 hover:bg-gray-100 transition duration-150 rounded-lg">
                <div class="flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-gray-800">{{ $task->title }}</h3>
                    <a href="{{ route('tasks.show', $task->id) }}" class="text-blue-600 hover:underline">View →</a>
                </div>
            </li>
        @empty
            <p class="text-center text-gray-500 py-6">No tasks available. Start by adding a new task!</p>
        @endforelse
    </ul>
</div>