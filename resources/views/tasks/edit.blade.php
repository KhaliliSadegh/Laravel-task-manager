@extends('layout')

@section('content')
<h1 class="text-2xl font-semibold mb-4">Edit Task</h1>

<form method="POST" action="{{ route('tasks.update', $task) }}" class="space-y-4 bg-white p-6 rounded-lg shadow-md max-w-md">
    @csrf
    @method('PUT')

    <div>
        <label class="block text-sm font-medium mb-1">Task Name</label>
        <input type="text" name="name" value="{{ old('name', $task->name) }}" required class="w-full border-gray-300 rounded p-2">
        @error('name') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Project</label>
        <select name="project_id" class="w-full border-gray-300 rounded p-2">
            <option value="">None</option>
            @foreach($projects as $project)
                <option value="{{ $project->id }}" {{ $task->project_id == $project->id ? 'selected' : '' }}>
                    {{ $project->name }}
                </option>
            @endforeach
        </select>
        @error('project_id') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
    </div>

    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
        Update Task
    </button>
</form>
@endsection
