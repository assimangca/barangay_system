@extends('layouts.admin')
@section('title', $project->title)
@section('page-title', $project->title)

@section('content')
<div class="space-y-6">

    {{-- Top Actions --}}
    <div class="flex gap-3">
        <a href="{{ route('admin.projects.index') }}"
           class="text-sm text-gray-500 hover:text-gray-700">← Back to Projects</a>
        @can('edit projects')
        <a href="{{ route('admin.projects.edit', $project) }}"
           class="ml-auto bg-blue-700 hover:bg-blue-800 text-white text-sm font-medium px-4 py-2 rounded-lg">
            Edit Project
        </a>
        @endcan
    </div>

    {{-- Project Info + Budget --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Info --}}
        <div class="lg:col-span-2 bg-white rounded-xl border border-gray-200 p-6 space-y-4">
            <div class="flex items-start justify-between">
                <div>
                    <span class="text-xs text-gray-400">{{ $project->project_code }}</span>
                    <h2 class="text-xl font-bold text-gray-800 mt-1">{{ $project->title }}</h2>
                </div>
                <span class="px-3 py-1 rounded-full text-sm font-medium
                    {{ $project->status === 'ongoing'   ? 'bg-yellow-100 text-yellow-700' : '' }}
                    {{ $project->status === 'completed' ? 'bg-green-100 text-green-700'   : '' }}
                    {{ $project->status === 'planned'   ? 'bg-blue-100 text-blue-700'     : '' }}
                    {{ $project->status === 'suspended' ? 'bg-red-100 text-red-700'       : '' }}">
                    {{ ucfirst($project->status) }}
                </span>
            </div>

            <p class="text-gray-600 text-sm leading-relaxed">{{ $project->description }}</p>

            <div class="grid grid-cols-2 gap-4 text-sm">
                <div><span class="text-gray-400">Location:</span> <span class="text-gray-700">{{ $project->location ?? '—' }}</span></div>
                <div><span class="text-gray-400">Category:</span> <span class="text-gray-700">{{ $project->category ?? '—' }}</span></div>
                <div><span class="text-gray-400">Contractor:</span> <span class="text-gray-700">{{ $project->contractor ?? '—' }}</span></div>
                <div><span class="text-gray-400">Created by:</span> <span class="text-gray-700">{{ $project->creator->name }}</span></div>
                <div><span class="text-gray-400">Start:</span> <span class="text-gray-700">{{ $project->start_date?->format('M d, Y') ?? '—' }}</span></div>
                <div><span class="text-gray-400">End:</span> <span class="text-gray-700">{{ $project->end_date?->format('M d, Y') ?? '—' }}</span></div>
            </div>

            {{-- Progress Bar --}}
            <div>
                <div class="flex justify-between text-sm mb-1">
                    <span class="text-gray-600 font-medium">Progress</span>
                    <span class="text-gray-600">{{ $project->completion_percentage }}%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-3">
                    <div class="h-3 rounded-full transition-all
                        {{ $project->completion_percentage >= 100 ? 'bg-green-500' : 'bg-blue-600' }}"
                         style="width: {{ $project->completion_percentage }}%"></div>
                </div>
            </div>
        </div>

        {{-- Budget Summary --}}
        <div class="bg-white rounded-xl border border-gray-200 p-6 space-y-4">
            <h3 class="font-semibold text-gray-800">Budget Summary</h3>

            <div class="space-y-3">
                <div class="flex justify-between text-sm">
                    <span class="text-gray-500">Total Budget</span>
                    <span class="font-medium text-gray-800">₱{{ number_format($project->total_budget, 2) }}</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-500">Total Spent</span>
                    <span class="font-medium text-red-600">₱{{ number_format($project->total_spent, 2) }}</span>
                </div>
                <div class="border-t pt-3 flex justify-between text-sm">
                    <span class="text-gray-500">Remaining</span>
                    <span class="font-semibold text-green-600">₱{{ number_format($project->remaining_budget, 2) }}</span>
                </div>
            </div>

            {{-- Budget Bar --}}
            <div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="h-2 rounded-full
                        {{ $project->budget_status === 'over_budget' ? 'bg-red-500' : '' }}
                        {{ $project->budget_status === 'critical'    ? 'bg-orange-500' : '' }}
                        {{ $project->budget_status === 'warning'     ? 'bg-yellow-500' : '' }}
                        {{ $project->budget_status === 'ok'          ? 'bg-green-500' : '' }}"
                         style="width: {{ min($project->budget_utilization, 100) }}%"></div>
                </div>
                <p class="text-xs text-gray-400 mt-1">{{ $project->budget_utilization }}% utilized</p>
            </div>

            @can('create budgets')
            <a href="{{ route('admin.budgets.create', ['project_id' => $project->id]) }}"
               class="block text-center text-sm bg-green-50 hover:bg-green-100 text-green-700 font-medium py-2 rounded-lg">
                + Add Budget Allocation
            </a>
            @endcan
        </div>
    </div>

    {{-- Milestones --}}
    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
            <h3 class="font-semibold text-gray-800">Milestones</h3>
            <span class="text-xs text-gray-400">
                {{ $project->milestones->where('is_completed', true)->count() }}
                / {{ $project->milestones->count() }} completed
            </span>
        </div>

        {{-- Add Milestone Form --}}
        @can('edit projects')
        <div class="px-6 py-4 bg-gray-50 border-b border-gray-100">
            <form method="POST" action="{{ route('admin.projects.milestones.store', $project) }}"
                  class="flex gap-3">
                @csrf
                <input type="text" name="title" placeholder="Milestone title..." required
                       class="flex-1 border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                <input type="date" name="due_date"
                       class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="submit"
                        class="bg-blue-700 hover:bg-blue-800 text-white text-sm font-medium px-4 py-2 rounded-lg">
                    Add
                </button>
            </form>
        </div>
        @endcan

        {{-- Milestones List --}}
        <div class="divide-y divide-gray-50">
            @forelse($project->milestones as $milestone)
            <div class="px-6 py-3 flex items-center gap-4">
                <form method="POST" action="{{ route('admin.milestones.toggle', $milestone) }}">
                    @csrf
                    <button type="submit"
                            class="w-5 h-5 rounded-full border-2 flex items-center justify-center
                                   {{ $milestone->is_completed ? 'bg-green-500 border-green-500' : 'border-gray-300' }}">
                        @if($milestone->is_completed)
                        <svg class="w-3 h-3 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                        </svg>
                        @endif
                    </button>
                </form>

                <div class="flex-1">
                    <p class="text-sm {{ $milestone->is_completed ? 'line-through text-gray-400' : 'text-gray-800' }}">
                        {{ $milestone->title }}
                    </p>
                    @if($milestone->due_date)
                    <p class="text-xs {{ $milestone->isOverdue() ? 'text-red-500' : 'text-gray-400' }}">
                        Due: {{ $milestone->due_date->format('M d, Y') }}
                        @if($milestone->isOverdue()) (Overdue) @endif
                    </p>
                    @endif
                </div>

                @if($milestone->is_completed)
                <span class="text-xs text-green-600">
                    Done {{ $milestone->completed_at?->format('M d') }}
                </span>
                @endif

                @can('edit projects')
                <form method="POST" action="{{ route('admin.milestones.destroy', $milestone) }}"
                      onsubmit="return confirm('Delete this milestone?')">
                    @csrf @method('DELETE')
                    <button class="text-gray-300 hover:text-red-400 text-xs">✕</button>
                </form>
                @endcan
            </div>
            @empty
            <p class="px-6 py-4 text-sm text-gray-400">No milestones yet. Add one above.</p>
            @endforelse
        </div>
    </div>

</div>
@endsection