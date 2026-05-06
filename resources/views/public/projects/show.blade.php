<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $project->title }} — Barangay System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen">

<nav class="bg-blue-900 text-white px-6 py-4 flex items-center justify-between">
    <a href="{{ route('home') }}" class="text-lg font-bold">Barangay System</a>
    <div class="flex gap-4 text-sm">
        <a href="{{ route('projects.index') }}" class="hover:underline">Projects</a>
        <a href="{{ route('complaints.create') }}" class="hover:underline">Submit Complaint</a>
        <a href="{{ route('complaints.track') }}" class="hover:underline">Track Complaint</a>
    </div>
</nav>

<div class="max-w-4xl mx-auto px-6 py-8 space-y-6">

    <a href="{{ route('projects.index') }}" class="text-sm text-blue-600 hover:underline">← Back to Projects</a>

    {{-- Project Header --}}
    <div class="bg-white rounded-xl border border-gray-200 p-6">
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
            <div><p class="text-gray-400 text-xs">Category</p><p class="font-medium">{{ $project->category ?? '—' }}</p></div>
            <div><p class="text-gray-400 text-xs">Contractor</p><p class="font-medium">{{ $project->contractor ?? '—' }}</p></div>
            <div><p class="text-gray-400 text-xs">Start Date</p><p class="font-medium">{{ $project->start_date?->format('M d, Y') ?? '—' }}</p></div>
            <div><p class="text-gray-400 text-xs">End Date</p><p class="font-medium">{{ $project->end_date?->format('M d, Y') ?? '—' }}</p></div>
        </div>

        {{-- Progress --}}
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

    {{-- Budget --}}
    <div class="bg-white rounded-xl border border-gray-200 p-6">
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

    {{-- Milestones --}}
    @if($project->milestones->count() > 0)
    <div class="bg-white rounded-xl border border-gray-200 p-6">
        <h2 class="font-semibold text-gray-800 mb-4">Project Milestones</h2>
        <div class="space-y-3">
            @foreach($project->milestones as $milestone)
            <div class="flex items-center gap-3">
                <div class="w-5 h-5 rounded-full flex items-center justify-center flex-shrink-0
                            {{ $milestone->is_completed ? 'bg-green-500' : 'bg-gray-200' }}">
                    @if($milestone->is_completed)
                    <svg class="w-3 h-3 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
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