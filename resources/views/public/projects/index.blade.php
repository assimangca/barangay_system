<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects — Barangay System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gradient-to-br from-blue-50 via-slate-100 to-slate-200 text-slate-900">

<!-- NAVBAR -->
<nav class="sticky top-0 z-50 bg-blue-950 text-white shadow-lg">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">

        <a href="{{ route('home') }}" class="text-xl font-bold">
            Barangay System
        </a>

        <div class="flex items-center gap-6 text-sm font-medium">

            <a href="{{ route('projects.index') }}" class="text-blue-200">
                Projects
            </a>

            <a href="{{ route('complaints.create') }}"
               class="transition hover:text-blue-200">
                Submit Complaint
            </a>

            <a href="{{ route('complaints.track') }}"
               class="transition hover:text-blue-200">
                Track Complaint
            </a>

        </div>
    </div>
</nav>

<!-- BACK BUTTON -->
<div class="mx-auto max-w-7xl px-6 pt-6">

    <a href="{{ route('home') }}"
       class="inline-flex items-center gap-2 rounded-full bg-white/70 backdrop-blur-md px-5 py-2 text-sm font-semibold text-blue-950 shadow-md ring-1 ring-slate-200 transition duration-300 hover:-translate-y-1 hover:bg-white hover:shadow-lg">

        ← Back to Homepage

    </a>

</div>

<main class="mx-auto max-w-7xl px-6 py-10">

    <!-- HEADER -->
    <div class="mb-10">

        <p class="mb-4 inline-block rounded-full bg-blue-100 px-4 py-2 text-sm font-semibold text-blue-800">
            Community Transparency Portal
        </p>

        <h1 class="text-5xl font-extrabold tracking-tight text-blue-950">
            Barangay Projects
        </h1>

        <p class="mt-4 max-w-2xl text-lg leading-relaxed text-slate-600">
            View ongoing, planned, and completed barangay projects
            with progress, budgets, and project details.
        </p>

    </div>

    <!-- FILTER -->
    <form method="GET"
          class="mb-10 flex flex-col gap-4 rounded-3xl bg-white/70 backdrop-blur-md p-5 shadow-xl ring-1 ring-slate-200 md:flex-row md:items-center">

        <input type="text"
               name="search"
               value="{{ request('search') }}"
               placeholder="Search projects..."
               class="w-full rounded-full border border-slate-300 bg-white/70 px-5 py-3 text-sm outline-none transition focus:border-blue-600 focus:ring-4 focus:ring-blue-100 md:flex-1">

        <select name="status"
                class="rounded-full border border-slate-300 bg-white/70 px-5 py-3 text-sm outline-none transition focus:border-blue-600 focus:ring-4 focus:ring-blue-100">

            <option value="">All Status</option>

            <option value="planned"
                {{ request('status') === 'planned' ? 'selected' : '' }}>
                Planned
            </option>

            <option value="ongoing"
                {{ request('status') === 'ongoing' ? 'selected' : '' }}>
                Ongoing
            </option>

            <option value="completed"
                {{ request('status') === 'completed' ? 'selected' : '' }}>
                Completed
            </option>

        </select>

        <button type="submit"
                class="rounded-full bg-blue-700 px-7 py-3 text-sm font-semibold text-white shadow-lg transition duration-300 hover:-translate-y-1 hover:bg-blue-800 hover:shadow-xl active:scale-95">
            Filter
        </button>

    </form>

    <!-- PROJECT GRID -->
    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">

        @forelse($projects as $project)

            <a href="{{ route('projects.show', $project) }}"
               class="group block rounded-3xl bg-white/70 backdrop-blur-md p-6 shadow-lg ring-1 ring-slate-200 transition duration-300 hover:-translate-y-2 hover:shadow-2xl">

                <!-- STATUS -->
                <div class="mb-5 flex items-start justify-between">

                    <span class="rounded-full px-3 py-1 text-xs font-bold

                        {{ $project->status === 'ongoing' ? 'bg-yellow-100 text-yellow-700' : '' }}

                        {{ $project->status === 'completed' ? 'bg-green-100 text-green-700' : '' }}

                        {{ $project->status === 'planned' ? 'bg-blue-100 text-blue-700' : '' }}

                        {{ $project->status === 'suspended' ? 'bg-red-100 text-red-700' : '' }}">
                        {{ ucfirst($project->status) }}
                    </span>

                    <span class="text-xs font-semibold text-slate-400">
                        {{ $project->project_code }}
                    </span>

                </div>

                <!-- TITLE -->
                <h3 class="mb-2 text-xl font-extrabold text-blue-950 transition group-hover:text-blue-700">
                    {{ $project->title }}
                </h3>

                <!-- DESCRIPTION -->
                <p class="mb-4 text-sm leading-relaxed text-slate-500 line-clamp-2">
                    {{ $project->description }}
                </p>

                <!-- LOCATION -->
                @if($project->location)
                    <p class="mb-5 text-sm text-slate-500">
                        📍 {{ $project->location }}
                    </p>
                @endif

                <!-- PROGRESS -->
                <div class="mb-5">

                    <div class="mb-2 flex justify-between text-xs font-semibold text-slate-500">
                        <span>Progress</span>
                        <span>{{ $project->completion_percentage }}%</span>
                    </div>

                    <div class="h-3 w-full overflow-hidden rounded-full bg-slate-200">

                        <div class="h-3 rounded-full bg-blue-700 transition-all duration-700"
                             style="width: {{ $project->completion_percentage }}%">
                        </div>

                    </div>

                </div>

                <!-- BUDGET -->
                <div class="flex justify-between border-t border-slate-200 pt-4 text-xs text-slate-500">

                    <span>
                        Budget:
                        <strong class="text-blue-950">
                            ₱{{ number_format($project->total_budget, 0) }}
                        </strong>
                    </span>

                    <span>
                        Spent:
                        <strong class="text-red-600">
                            ₱{{ number_format($project->total_spent, 0) }}
                        </strong>
                    </span>

                </div>

            </a>

        @empty

            <div class="col-span-full rounded-3xl bg-white/70 backdrop-blur-md py-16 text-center text-slate-400 shadow-lg ring-1 ring-slate-200">

                No projects found.

            </div>

        @endforelse

    </div>

    <!-- PAGINATION -->
    <div class="mt-8">
        {{ $projects->links() }}
    </div>

</main>

</body>
</html>