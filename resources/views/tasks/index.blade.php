@extends('layout')

@section('content')
<div class="flex items-center justify-between mb-4">
    <h1 class="text-2xl font-semibold text-gray-800">Tasks</h1>

    <form method="GET" action="{{ route('tasks.index') }}" class="flex space-x-2">
        <select name="project_id" onchange="this.form.submit()" class="border-gray-300 rounded px-2 py-1 text-sm">
            <option value="">All Projects</option>
            @foreach($projects as $project)
                <option value="{{ $project->id }}" {{ $projectId == $project->id ? 'selected' : '' }}>
                    {{ $project->name }}
                </option>
            @endforeach
        </select>
    </form>
</div>

<ul id="task-list" class="bg-white shadow rounded-lg divide-y divide-gray-200">
    @forelse($tasks as $task)
        <li class="p-4 flex justify-between items-center cursor-move bg-white hover:bg-gray-50" 
            data-id="{{ $task->id }}">
            <div class="flex items-center space-x-3">
                <!-- Priority Badge -->
                <span class="bg-indigo-100 text-indigo-700 font-semibold text-xs px-2 py-1 rounded">
                    #{{ $task->priority }}
                </span>

                <div>
                    <p class="font-medium text-gray-800">{{ $task->name }}</p>
                    @if($task->project)
                        <p class="text-xs text-gray-500">Project: {{ $task->project->name }}</p>
                    @endif
                </div>
            </div>

            <div class="space-x-3">
                <a href="{{ route('tasks.edit', $task) }}" class="text-indigo-600 hover:text-indigo-800 text-sm">Edit</a>
                <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-600 hover:text-red-800 text-sm" onclick="return confirm('Delete this task?')">
                        Delete
                    </button>
                </form>
            </div>
        </li>
    @empty
        <li class="p-4 text-center text-gray-500">No tasks found.</li>
    @endforelse
</ul>

<script src="/js/reorder.js"></script>
@endsection
