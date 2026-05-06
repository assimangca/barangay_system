<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects — Barangay System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen">

{{-- Nav --}}
<nav class="bg-blue-900 text-white px-6 py-4 flex items-center justify-between">
    <a href="{{ route('home') }}" class="text-lg font-bold">Barangay System</a>
    <div class="flex gap-4 text-sm">
        <a href="{{ route('projects.index') }}" class="underline">Projects</a>
        <a href="{{ route('complaints.create') }}" class="hover:underline">Submit Complaint</a>
        <a href="{{ route('complaints.track') }}" class="hover:underline">Track Complaint</a>
    </div>
</nav>

<div class="max-w-6xl mx-auto px-6 py-8">

    {{-- Header + Filter --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Barangay Projects</h1>
        <form method="GET" class="flex gap-2">
            <input type="text" name="search" value="{{ request('search') }}"
                   placeholder="Search projects..."
                   class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            <select name="status"
                    class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">All Status</option>
                <option value="planned"   {{ request('status') === 'planned'   ? 'selected' : '' }}>Planned</option>
                <option value="ongoing"   {{ request('status') === 'ongoing'   ? 'selected' : '' }}>Ongoing</option>
                <option value="completed" {{ request('status') === 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
            <button type="submit"
                    class="bg-blue-700 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-800">
                Filter
            </button>
        </form>
    </div>

    {{-- Projects Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
        @forelse($projects as $project)
        <a href="{{ route('projects.show', $project) }}"
           class="bg-white rounded-xl border border-gray-200 p-5 hover:shadow-md transition block">

            <div class="flex items-start justify-between mb-3">
                <span class="text-xs px-2 py-1 rounded-full font-medium
                    {{ $project->status === 'ongoing'   ? 'bg-yellow-100 text-yellow-700' : '' }}
                    {{ $project->status === 'completed' ? 'bg-green-100 text-green-700'   : '' }}
                    {{ $project->status === 'planned'   ? 'bg-blue-100 text-blue-700'     : '' }}
                    {{ $project->status === 'suspended' ? 'bg-red-100 text-red-700'       : '' }}">
                    {{ ucfirst($project->status) }}
                </span>
                <span class="text-xs text-gray-400">{{ $project->project_code }}</span>
            </div>

            <h3 class="font-semibold text-gray-800 mb-1">{{ $project->title }}</h3>
            <p class="text-xs text-gray-500 mb-3 line-clamp-2">{{ $project->description }}</p>

            @if($project->location)
            <p class="text-xs text-gray-400 mb-3">📍 {{ $project->location }}</p>
            @endif

            {{-- Progress --}}
            <div class="mb-3">
                <div class="flex justify-between text-xs text-gray-500 mb-1">
                    <span>Progress</span>
                    <span>{{ $project->completion_percentage }}%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-blue-600 h-2 rounded-full"
                         style="width: {{ $project->completion_percentage }}%"></div>
                </div>
            </div>

            {{-- Budget --}}
            <div class="flex justify-between text-xs text-gray-500 border-t pt-3">
                <span>Budget: <strong class="text-gray-700">₱{{ number_format($project->total_budget, 0) }}</strong></span>
                <span>Spent: <strong class="text-red-600">₱{{ number_format($project->total_spent, 0) }}</strong></span>
            </div>
        </a>
        @empty
        <div class="col-span-3 text-center py-12 text-gray-400">
            No projects found.
        </div>
        @endforelse
    </div>

    <div class="mt-6">{{ $projects->links() }}</div>
</div>

</body>
</html>