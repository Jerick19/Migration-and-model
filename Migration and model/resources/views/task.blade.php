@extends('taskTemplate')

<div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Tasks</h2>
    <a href="{{ url('/tasks/create') }}" class="bg-blue-500 text-white py-2 px-4 rounded">
        Add Task
    </a>

    @if(session('success'))
        <p class="bg-green-100 text-green-700 p-2 rounded mt-4">{{ session('success') }}</p>
    @endif

    <ul class="bg-white rounded-lg mt-4">
        @forelse($tasks as $task)
            <li class="p-4 border-b">
                <h3 class="font-semibold">{{ $task->title }}</h3>
                <a href="{{ route('tasks.show', $task->id) }}" class="text-blue-500">View →</a>
            </li>
        @empty
            <p class="text-center text-gray-500 py-4">No tasks found.</p>
        @endforelse
    </ul>
</div>
