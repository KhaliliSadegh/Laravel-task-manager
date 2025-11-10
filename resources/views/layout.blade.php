<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel Task Manager') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 min-h-screen flex flex-col">

    <!-- Navigation -->
    <nav class="bg-white shadow p-4 flex justify-between items-center">
        <a href="{{ route('tasks.index') }}" class="text-xl font-semibold text-indigo-600">Task Manager</a>
        <div class="space-x-4">
            <a href="{{ route('tasks.create') }}" class="text-gray-700 hover:text-indigo-600">+ New Task</a>
            <a href="{{ route('projects.index') }}" class="text-gray-700 hover:text-indigo-600">Projects</a>
        </div>
    </nav>

    <!-- Flash messages -->
    <main class="flex-1 container mx-auto px-6 py-8">
        @if(session('success'))
            <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white shadow-inner text-center text-gray-500 py-4 text-sm">
        Laravel Task Manager • Built with ❤️ & TailwindCSS
    </footer>

</body>
</html>
