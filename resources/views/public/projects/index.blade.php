<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects — Barangay Digital Service Portal</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-50 via-slate-100 to-slate-200 text-slate-900">

<!-- RESPONSIVE NAVBAR -->
<nav class="sticky top-0 z-50 bg-blue-950 text-white shadow-lg">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6">
        <a href="{{ url('/') }}" class="text-sm font-bold tracking-tight sm:text-lg md:text-xl hover:text-blue-200 transition">
            Barangay Digital Service Portal
        </a>

        <div class="flex items-center gap-3 text-xs font-medium sm:gap-6 sm:text-sm">
            <!-- Projects link -->
            <a href="{{ route('projects.index') }}" class="hidden transition hover:text-blue-200 md:block">Projects</a>
            
            <!-- NEW: Officials link -->
            <a href="{{ route('officials.index') }}" class="transition hover:text-blue-200">Officials</a>
            
            <!-- Complaint links -->
            <a href="{{ route('complaints.create') }}" class="transition hover:text-blue-200">Submit Complaint</a>
            <a href="{{ route('complaints.track') }}" class="hidden transition hover:text-blue-200 sm:block">Track Complaint</a>

            <!-- Login button -->
            <a href="{{ route('login') }}"
               class="rounded-full bg-white px-4 py-2 text-blue-950 shadow transition duration-300 hover:-translate-y-1 hover:bg-blue-100 sm:px-5">
                Login
            </a>
        </div>
    </div>
</nav>
<div class="mx-auto max-w-7xl px-6 py-10">
    <div class="mb-8">
        <a href="{{ route('home') }}" class="group inline-flex items-center gap-2 rounded-2xl bg-white px-5 py-3 text-sm font-bold text-slate-700 shadow-sm ring-1 ring-slate-200 transition-all hover:bg-blue-50 hover:text-blue-700 hover:shadow-md active:scale-95">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="h-4 w-4 transition-transform group-hover:-translate-x-1"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" /></svg>
            BACK TO HOME
        </a>
    </div>

    <form method="GET" class="mb-10 flex flex-col gap-4 rounded-3xl bg-white/70 backdrop-blur-md p-5 shadow-xl ring-1 ring-slate-200 md:flex-row md:items-center">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search projects..." class="w-full rounded-full border border-slate-300 bg-white/70 px-5 py-3 text-sm outline-none transition focus:border-blue-600 focus:ring-4 focus:ring-blue-100 md:flex-1">
        <select name="status" class="rounded-full border border-slate-300 bg-white/70 px-5 py-3 text-sm outline-none transition focus:border-blue-600 focus:ring-4 focus:ring-blue-100">
            <option value="">All Status</option>
            <option value="planned" {{ request('status') === 'planned' ? 'selected' : '' }}>Planned</option>
            <option value="ongoing" {{ request('status') === 'ongoing' ? 'selected' : '' }}>Ongoing</option>
            <option value="completed" {{ request('status') === 'completed' ? 'selected' : '' }}>Completed</option>
        </select>
        <button type="submit" class="rounded-full bg-blue-700 px-7 py-3 text-sm font-semibold text-white shadow-lg transition duration-300 hover:-translate-y-1 hover:bg-blue-800 hover:shadow-xl active:scale-95">Filter</button>
    </form>

    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
        @forelse($projects as $project)
            <a href="{{ route('projects.show', $project) }}" class="group block rounded-3xl bg-white/70 backdrop-blur-md p-6 shadow-lg ring-1 ring-slate-200 transition duration-300 hover:-translate-y-2 hover:shadow-2xl">
                <div class="mb-5 flex items-start justify-between">
                    <span class="rounded-full px-3 py-1 text-xs font-bold {{ $project->status === 'ongoing' ? 'bg-yellow-100 text-yellow-700' : ($project->status === 'completed' ? 'bg-green-100 text-green-700' : 'bg-blue-100 text-blue-700') }}">{{ ucfirst($project->status) }}</span>
                    <span class="text-xs font-semibold text-slate-400">{{ $project->project_code }}</span>
                </div>
                <h3 class="mb-2 text-xl font-extrabold text-blue-950 group-hover:text-blue-700">{{ $project->title }}</h3>
                <p class="mb-4 text-sm text-slate-500 line-clamp-2">{{ $project->description }}</p>
                @if($project->location) <p class="mb-5 text-sm text-slate-500">📍 {{ $project->location }}</p> @endif
                <div class="mb-5 text-xs font-semibold text-slate-500"><div class="flex justify-between mb-2"><span>Progress</span><span>{{ $project->completion_percentage }}%</span></div><div class="h-3 w-full rounded-full bg-slate-200 overflow-hidden"><div class="h-3 bg-blue-700 transition-all duration-700" style="width: {{ $project->completion_percentage }}%"></div></div></div>
                <div class="flex justify-between border-t border-slate-200 pt-4 text-xs text-slate-500"><span>Budget: <strong class="text-blue-950">₱{{ number_format($project->total_budget, 0) }}</strong></span><span>Spent: <strong class="text-red-600">₱{{ number_format($project->total_spent, 0) }}</strong></span></div>
            </a>
        @empty
            <div class="col-span-full rounded-3xl bg-white/70 py-16 text-center text-slate-400 shadow-lg ring-1 ring-slate-200">No projects found.</div>
        @endforelse
    </div>
    <div class="mt-8">{{ $projects->links() }}</div>
</div>
</body>
</html>