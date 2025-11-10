@extends('layout')

@section('content')
<div class="flex items-center justify-between mb-4">
    <h1 class="text-2xl font-semibold text-gray-800">Projects</h1>
    <a href="{{ route('projects.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 text-sm">+ New Project</a>
</div>

<ul class="bg-white shadow rounded-lg divide-y divide-gray-200">
    @forelse($projects as $project)
        <li class="p-4 flex justify-between items-center">
            <div>
                <p class="font-medium text-gray-800">{{ $project->name }}</p>
                <p class="text-xs text-gray-500">{{ $project->tasks()->count() }} tasks</p>
            </div>
            <div class="space-x-3">
                <a href="{{ route('projects.edit', $project) }}" class="text-indigo-600 hover:text-indigo-800 text-sm">Edit</a>
                <form action="{{ route('projects.destroy', $project) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-600 hover:text-red-800 text-sm" onclick="return confirm('Delete this project?')">Delete</button>
                </form>
            </div>
        </li>
    @empty
        <li class="p-4 text-center text-gray-500">No projects yet.</li>
    @endforelse
</ul>
@endsection
