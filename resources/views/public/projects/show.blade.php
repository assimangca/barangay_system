<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $project->title }} — Barangay System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen overflow-x-hidden bg-[#071326] text-slate-900">

    <div class="fixed inset-0 z-0 overflow-hidden pointer-events-none">
        <div class="absolute inset-0 opacity-20"
            style="background-image:linear-gradient(to right, rgba(255,255,255,0.05) 1px, transparent 1px),linear-gradient(to bottom, rgba(255,255,255,0.05) 1px, transparent 1px);background-size: 18px 18px;"></div>
        <div class="absolute left-[-150px] top-[120px] h-[500px] w-[500px] rounded-full bg-blue-700/20 blur-3xl"></div>
        <div class="absolute bottom-[-200px] right-[-100px] h-[600px] w-[600px] rounded-full bg-blue-500/10 blur-3xl"></div>
    </div>

    <nav class="sticky top-0 z-50 bg-blue-950 text-white shadow-lg">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <div class="relative flex h-14 w-14 items-center justify-center">
                    <div class="absolute inset-0 rounded-full bg-blue-400/20 blur-md transition duration-500 group-hover:bg-blue-300/30"></div>
                    <div class="relative flex h-14 w-14 items-center justify-center rounded-full border-4 border-blue-200 bg-gradient-to-br from-blue-400 via-sky-300 to-blue-700 shadow-[0_10px_25px_rgba(37,99,235,0.45)]">
                        <div class="absolute inset-[4px] rounded-full border-2 border-white/70"></div>
                        <div class="relative z-10 flex h-7 w-6 items-center justify-center rounded-b-xl rounded-t-md border border-white/60 bg-white/90 shadow-inner">
                            <div class="absolute top-[3px] h-2 w-2 rounded-full bg-yellow-400 shadow-sm"></div>
                            <div class="absolute bottom-[5px] h-2 w-3 rounded-sm bg-blue-700"></div>
                        </div>
                        <div class="absolute left-[6px] top-1/2 h-1.5 w-1.5 -translate-y-1/2 rounded-full bg-yellow-300"></div>
                        <div class="absolute right-[6px] top-1/2 h-1.5 w-1.5 -translate-y-1/2 rounded-full bg-yellow-300"></div>
                    </div>
                </div>
                <div class="leading-tight">
                    <h1 class="text-xl font-extrabold tracking-wide text-white">Barangay System</h1>
                    <p class="text-[11px] uppercase tracking-[0.25em] text-blue-200">Republic of the Philippines</p>
                </div>
            </a>
        </div>
    </nav>

    <aside class="fixed left-0 top-[88px] z-40 hidden h-[calc(100vh-88px)] w-64 border-r border-blue-400/10 bg-blue-950/90 px-5 py-8 text-white shadow-2xl backdrop-blur-md md:block">
        <div class="flex flex-col gap-4 text-sm font-semibold">
            <a href="{{ route('projects.index') }}"
                class="rounded-2xl px-5 py-4 text-center shadow transition duration-300 hover:-translate-y-1 hover:shadow-lg active:scale-95
            {{ request()->routeIs('projects.*') ? 'bg-blue-700 text-white hover:bg-blue-800' : 'border border-blue-400 bg-white/10 text-white hover:bg-white/20' }}">
                Projects
            </a>
            <a href="{{ route('complaints.create') }}"
                class="rounded-2xl px-5 py-4 text-center shadow transition duration-300 hover:-translate-y-1 hover:shadow-lg active:scale-95
            {{ request()->routeIs('complaints.create') ? 'bg-blue-700 text-white hover:bg-blue-800' : 'border border-blue-400 bg-white/10 text-white hover:bg-white/20' }}">
                Submit Complaint
            </a>
            <a href="{{ route('complaints.track') }}"
                class="rounded-2xl px-5 py-4 text-center shadow transition duration-300 hover:-translate-y-1 hover:shadow-lg active:scale-95
            {{ request()->routeIs('complaints.track') ? 'bg-blue-700 text-white hover:bg-blue-800' : 'border border-blue-400 bg-white/10 text-white hover:bg-white/20' }}">
                Track Complaint
            </a>
            <a href="{{ route('donations.create') }}"
                class="rounded-2xl px-5 py-4 text-center shadow transition duration-300 hover:-translate-y-1 hover:shadow-lg active:scale-95
            {{ request()->routeIs('donations.create') ? 'bg-blue-700 text-white hover:bg-blue-800' : 'border border-blue-400 bg-white/10 text-white hover:bg-white/20' }}">
                Donate Now
            </a>
            <a href="{{ route('donations.track') }}"
                class="rounded-2xl px-5 py-4 text-center shadow transition duration-300 hover:-translate-y-1 hover:shadow-lg active:scale-95
            {{ request()->routeIs('donations.track') ? 'bg-blue-700 text-white hover:bg-blue-800' : 'border border-blue-400 bg-white/10 text-white hover:bg-white/20' }}">
                Track Donation
            </a>
        </div>
    </aside>

    <div class="relative z-10 mx-auto flex max-w-7xl gap-3 overflow-x-auto px-6 pt-6 md:hidden">
        <a href="{{ route('projects.index') }}" class="min-w-[130px] rounded-full bg-blue-700 px-5 py-3 text-center text-sm font-semibold text-white shadow-lg">Projects</a>
        <a href="{{ route('complaints.create') }}" class="min-w-[170px] rounded-full border border-blue-400 bg-white/10 px-5 py-3 text-center text-sm font-semibold text-white shadow">Submit Complaint</a>
        <a href="{{ route('complaints.track') }}" class="min-w-[160px] rounded-full border border-blue-400 bg-white/10 px-5 py-3 text-center text-sm font-semibold text-white shadow">Track Complaint</a>
        <a href="{{ route('donations.create') }}" class="min-w-[140px] rounded-full border border-blue-400 bg-white/10 px-5 py-3 text-center text-sm font-semibold text-white shadow">Donate Now</a>
        <a href="{{ route('donations.track') }}" class="min-w-[160px] rounded-full border border-blue-400 bg-white/10 px-5 py-3 text-center text-sm font-semibold text-white shadow">Track Donation</a>
    </div>

    <div class="relative z-10 mx-auto max-w-7xl px-6 pt-8 md:ml-[19rem]">
        <a href="{{ route('projects.index') }}"
            class="mb-8 inline-flex items-center gap-2 rounded-full bg-white/80 px-6 py-3 text-sm font-semibold text-blue-950 shadow-lg transition duration-300 hover:-translate-y-1 hover:bg-white hover:shadow-2xl">
            ← Back to Projects
        </a>

        <div class="rounded-2xl bg-white/90 backdrop-blur-md p-6 shadow-xl mb-6">
            <div class="flex items-start justify-between mb-4">
                <div>
                    <span class="text-xs text-gray-400">{{ $project->project_code }}</span>
                    <h1 class="text-2xl font-bold text-gray-800 mt-1">{{ $project->title }}</h1>
                    @if($project->location)
                    <p class="text-sm text-gray-500 mt-1">📍 {{ $project->location }}</p>
                    @endif
                </div>
                <span class="px-3 py-1 rounded-full text-sm font-medium
                {{ $project->status === 'ongoing'   ? 'bg-yellow-100 text-yellow-700' : '' }}
                {{ $project->status === 'completed' ? 'bg-green-100 text-green-700'   : '' }}
                {{ $project->status === 'planned'   ? 'bg-blue-100 text-blue-700'     : '' }}
                {{ $project->status === 'suspended' ? 'bg-red-100 text-red-700'       : '' }}">
                    {{ ucfirst($project->status) }}
                </span>
            </div>
            <p class="text-gray-600 leading-relaxed mb-4">{{ $project->description }}</p>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-sm border-t pt-4">
                <div>
                    <p class="text-gray-400 text-xs">Category</p>
                    <p class="font-medium">{{ $project->category ?? '—' }}</p>
                </div>
                <div>
                    <p class="text-gray-400 text-xs">Contractor</p>
                    <p class="font-medium">{{ $project->contractor ?? '—' }}</p>
                </div>
                <div>
                    <p class="text-gray-400 text-xs">Start Date</p>
                    <p class="font-medium">{{ $project->start_date?->format('M d, Y') ?? '—' }}</p>
                </div>
                <div>
                    <p class="text-gray-400 text-xs">End Date</p>
                    <p class="font-medium">{{ $project->end_date?->format('M d, Y') ?? '—' }}</p>
                </div>
            </div>
            <div class="mt-4">
                <div class="flex justify-between text-sm mb-1">
                    <span class="text-gray-600 font-medium">Overall Progress</span>
                    <span class="text-gray-600">{{ $project->completion_percentage }}%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-3">
                    <div class="h-3 rounded-full {{ $project->completion_percentage >= 100 ? 'bg-green-500' : 'bg-blue-600' }}"
                        style="width: {{ $project->completion_percentage }}%"></div>
                </div>
            </div>
        </div>

        <div class="rounded-2xl bg-white/90 backdrop-blur-md p-6 shadow-xl mb-6">
            <h2 class="font-semibold text-gray-800 mb-4">Budget Information</h2>
            <div class="grid grid-cols-3 gap-4 text-center mb-4">
                <div class="bg-blue-50 rounded-lg p-4">
                    <p class="text-xs text-gray-500 mb-1">Total Budget</p>
                    <p class="text-xl font-bold text-blue-700">₱{{ number_format($project->total_budget, 2) }}</p>
                </div>
                <div class="bg-red-50 rounded-lg p-4">
                    <p class="text-xs text-gray-500 mb-1">Total Spent</p>
                    <p class="text-xl font-bold text-red-600">₱{{ number_format($project->total_spent, 2) }}</p>
                </div>
                <div class="bg-green-50 rounded-lg p-4">
                    <p class="text-xs text-gray-500 mb-1">Remaining</p>
                    <p class="text-xl font-bold text-green-600">₱{{ number_format($project->remaining_budget, 2) }}</p>
                </div>
            </div>
            @if($project->budgetAllocations->count() > 0)
            <h3 class="text-sm font-medium text-gray-700 mb-2">Fund Sources</h3>
            <div class="space-y-2">
                @foreach($project->budgetAllocations as $allocation)
                <div class="flex justify-between text-sm bg-gray-50 rounded-lg px-4 py-2">
                    <span class="text-gray-700">{{ $allocation->fund_source }} (FY {{ $allocation->fiscal_year }})</span>
                    <span class="font-medium">₱{{ number_format($allocation->total_amount, 2) }}</span>
                </div>
                @endforeach
            </div>
            @endif
        </div>

        @if($project->milestones->count() > 0)
        <div class="rounded-2xl bg-white/90 backdrop-blur-md p-6 shadow-xl mb-6">
            <h2 class="font-semibold text-gray-800 mb-4">Project Milestones</h2>
            <div class="space-y-3">
                @foreach($project->milestones as $milestone)
                <div class="flex items-center gap-3">
                    <div class="w-5 h-5 rounded-full flex items-center justify-center flex-shrink-0
                            {{ $milestone->is_completed ? 'bg-green-500' : 'bg-gray-200' }}">
                        @if($milestone->is_completed)
                        <svg class="w-3 h-3 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                        </svg>
                        @endif
                    </div>
                    <div class="flex-1">
                        <p class="text-sm {{ $milestone->is_completed ? 'line-through text-gray-400' : 'text-gray-800' }}">
                            {{ $milestone->title }}
                        </p>
                    </div>
                    @if($milestone->due_date)
                    <span class="text-xs text-gray-400">{{ $milestone->due_date->format('M d, Y') }}</span>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>

</body>

</html>