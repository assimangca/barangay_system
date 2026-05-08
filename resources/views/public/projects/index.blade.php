<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects — Barangay System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen overflow-x-hidden bg-[#071326] text-slate-900">

<!-- BLUEPRINT BACKGROUND -->
<div class="fixed inset-0 z-0 overflow-hidden pointer-events-none">

    <div class="absolute inset-0 opacity-20"
         style="
            background-image:
                linear-gradient(to right, rgba(255,255,255,0.05) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(255,255,255,0.05) 1px, transparent 1px);
            background-size: 18px 18px;
         ">
    </div>

    <div class="absolute inset-0 opacity-15"
         style="
            background-image:
                linear-gradient(to right, rgba(255,255,255,0.10) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(255,255,255,0.10) 1px, transparent 1px);
            background-size: 90px 90px;
         ">
    </div>

    <div class="absolute left-[-150px] top-[120px] h-[500px] w-[500px] rounded-full bg-blue-700/20 blur-3xl"></div>
    <div class="absolute bottom-[-200px] right-[-100px] h-[600px] w-[600px] rounded-full bg-blue-500/10 blur-3xl"></div>

</div>

<!-- FLOATING PROJECT ICONS -->
<div class="pointer-events-none fixed inset-0 z-0 overflow-hidden">
    <div class="float-icon float-icon-1">🏗️</div>
    <div class="float-icon float-icon-2">📋</div>
    <div class="float-icon float-icon-3">📍</div>
</div>

<!-- NAVBAR -->
<nav class="sticky top-0 z-50 bg-blue-950 text-white shadow-lg">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">

        <!-- LOGO -->
        <a href="{{ route('home') }}"
           class="flex items-center gap-3 group">

            <!-- LOGO ICON -->
            <div class="relative flex h-14 w-14 items-center justify-center">

                <!-- OUTER GLOW -->
                <div class="absolute inset-0 rounded-full bg-blue-400/20 blur-md transition duration-500 group-hover:bg-blue-300/30"></div>

                <!-- MAIN CIRCLE -->
                <div class="relative flex h-14 w-14 items-center justify-center rounded-full border-4 border-blue-200 bg-gradient-to-br from-blue-400 via-sky-300 to-blue-700 shadow-[0_10px_25px_rgba(37,99,235,0.45)]">

                    <!-- INNER RING -->
                    <div class="absolute inset-[4px] rounded-full border-2 border-white/70"></div>

                    <!-- SHIELD -->
                    <div class="relative z-10 flex h-7 w-6 items-center justify-center rounded-b-xl rounded-t-md border border-white/60 bg-white/90 shadow-inner">

                        <!-- SUN -->
                        <div class="absolute top-[3px] h-2 w-2 rounded-full bg-yellow-400 shadow-sm"></div>

                        <!-- HOUSE -->
                        <div class="absolute bottom-[5px] h-2 w-3 rounded-sm bg-blue-700"></div>

                    </div>

                    <!-- SMALL STARS -->
                    <div class="absolute left-[6px] top-1/2 h-1.5 w-1.5 -translate-y-1/2 rounded-full bg-yellow-300"></div>

                    <div class="absolute right-[6px] top-1/2 h-1.5 w-1.5 -translate-y-1/2 rounded-full bg-yellow-300"></div>

                </div>

            </div>

            <!-- TEXT -->
            <div class="leading-tight">

                <h1 class="text-xl font-extrabold tracking-wide text-white">
                    Barangay System
                </h1>

                <p class="text-[11px] uppercase tracking-[0.25em] text-blue-200">
                    Republic of the Philippines
                </p>

            </div>

        </a>

    </div>
</nav>

<!-- SIDEBAR -->
<aside class="fixed left-0 top-[88px] z-40 hidden h-[calc(100vh-88px)] w-64 border-r border-blue-400/10 bg-blue-950/90 px-5 py-8 text-white shadow-2xl backdrop-blur-md md:block">

    

    <div class="flex flex-col gap-4 text-sm font-semibold">

        <a href="{{ route('projects.index') }}"
           class="rounded-2xl bg-blue-700 px-5 py-4 text-center text-white shadow-lg transition duration-300 hover:-translate-y-1 hover:bg-blue-800 hover:shadow-xl active:scale-95">
            Projects
        </a>

        <a href="{{ route('complaints.create') }}"
           class="rounded-2xl border border-blue-400 bg-white/10 px-5 py-4 text-center text-blue-100 shadow transition duration-300 hover:-translate-y-1 hover:bg-white/20 hover:shadow-lg active:scale-95">
            Submit Complaint
        </a>

        <a href="{{ route('complaints.track') }}"
           class="rounded-2xl border border-blue-400 bg-white/10 px-5 py-4 text-center text-white shadow transition duration-300 hover:-translate-y-1 hover:bg-white/20 hover:shadow-lg active:scale-95">
            Track Complaint
        </a>

    </div>

</aside>

<!-- MOBILE BUTTONS -->
<div class="relative z-10 mx-auto flex max-w-7xl gap-3 overflow-x-auto px-6 pt-6 md:hidden">

    <a href="{{ route('projects.index') }}"
       class="min-w-[130px] rounded-full bg-blue-700 px-5 py-3 text-center text-sm font-semibold text-white shadow-lg transition duration-300 hover:bg-blue-800">
        Projects
    </a>

    <a href="{{ route('complaints.create') }}"
       class="min-w-[170px] rounded-full border border-blue-400 bg-white/10 px-5 py-3 text-center text-sm font-semibold text-white shadow">
        Submit Complaint
    </a>

    <a href="{{ route('complaints.track') }}"
       class="min-w-[160px] rounded-full border border-blue-400 bg-white/10 px-5 py-3 text-center text-sm font-semibold text-white shadow">
        Track Complaint
    </a>

</div>

<!-- BACK BUTTON -->
<div class="relative z-10 mx-auto max-w-7xl px-6 pt-6 md:ml-[19rem]">

    <a href="{{ route('home') }}"
       class="inline-flex items-center gap-2 rounded-full bg-white/75 backdrop-blur-md px-5 py-2 text-sm font-semibold text-blue-950 shadow-md ring-1 ring-white/10 transition duration-300 hover:-translate-y-1 hover:bg-white hover:shadow-lg">

        ← Back to Homepage

    </a>

</div>

<main class="relative z-10 mx-auto max-w-7xl px-6 py-10 md:ml-[19rem]">

    <!-- HEADER -->
    <div class="mb-10 animate-fade-up">

        <p class="mb-4 inline-block rounded-full bg-blue-100 px-4 py-2 text-sm font-semibold text-blue-800">
            Community Transparency Portal
        </p>

        <h1 class="text-5xl font-extrabold tracking-tight text-white">
            Barangay Projects
        </h1>

        <p class="mt-4 max-w-2xl text-lg leading-relaxed text-slate-300">
            View ongoing, planned, and completed barangay projects
            with progress, budgets, and project details.
        </p>

    </div>

    <!-- FILTER -->
    <form method="GET"
          class="mb-10 flex flex-col gap-4 rounded-3xl bg-white/75 backdrop-blur-md p-5 shadow-xl ring-1 ring-white/10 md:flex-row md:items-center animate-fade-up animation-delay-100">

        <input type="text"
               name="search"
               value="{{ request('search') }}"
               placeholder="Search projects..."
               class="w-full rounded-full border border-slate-300 bg-white/80 px-5 py-3 text-sm outline-none transition focus:border-blue-600 focus:ring-4 focus:ring-blue-100 md:flex-1">

        <select name="status"
                class="rounded-full border border-slate-300 bg-white/80 px-5 py-3 text-sm outline-none transition focus:border-blue-600 focus:ring-4 focus:ring-blue-100">

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
               class="group block rounded-3xl bg-white/75 backdrop-blur-md p-6 shadow-lg ring-1 ring-white/10 transition duration-300 hover:-translate-y-2 hover:bg-white/90 hover:shadow-2xl animate-fade-up">

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

                        <div class="progress-bar h-3 rounded-full bg-blue-700"
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

            <div class="col-span-full rounded-3xl bg-white/75 backdrop-blur-md py-16 text-center text-slate-400 shadow-lg ring-1 ring-white/10">

                No projects found.

            </div>

        @endforelse

    </div>

    <!-- PAGINATION -->
    <div class="mt-8">
        {{ $projects->links() }}
    </div>

</main>

<style>
.animate-fade-up {
    animation: fadeUp 0.8s ease both;
}

.animation-delay-100 {
    animation-delay: 0.1s;
}

.progress-bar {
    animation: growProgress 1.2s ease-out both;
    transform-origin: left;
}

.float-icon {
    position: absolute;
    font-size: 3rem;
    opacity: 0.14;
    filter: drop-shadow(0 0 18px rgba(59,130,246,0.8));
    animation: floatIcon 7s ease-in-out infinite;
}

.float-icon-1 {
    left: 8%;
    top: 22%;
}

.float-icon-2 {
    right: 9%;
    top: 34%;
    animation-delay: 1.5s;
}

.float-icon-3 {
    left: 18%;
    bottom: 12%;
    animation-delay: 3s;
}

@keyframes fadeUp {
    from {
        opacity: 0;
        transform: translateY(18px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes growProgress {
    from {
        transform: scaleX(0);
    }

    to {
        transform: scaleX(1);
    }
}

@keyframes floatIcon {
    0%, 100% {
        transform: translateY(0) rotate(-4deg);
    }

    50% {
        transform: translateY(-18px) rotate(4deg);
    }
}
</style>

</body>
</html>