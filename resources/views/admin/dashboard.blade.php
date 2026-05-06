@extends('layouts.admin')
@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="space-y-6">

    {{-- Stats Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-white rounded-xl p-5 border border-gray-200">
            <p class="text-sm text-gray-500">Total Projects</p>
            <p class="text-3xl font-bold text-blue-600 mt-1">{{ $stats['total_projects'] }}</p>
            <div class="flex gap-3 mt-2 text-xs text-gray-400">
                <span class="text-yellow-600">{{ $stats['ongoing_projects'] }} ongoing</span>
                <span class="text-green-600">{{ $stats['completed_projects'] }} done</span>
            </div>
        </div>

        <div class="bg-white rounded-xl p-5 border border-gray-200">
            <p class="text-sm text-gray-500">Total Budget</p>
            <p class="text-3xl font-bold text-green-600 mt-1">
                ₱{{ number_format($stats['total_budget'], 2) }}
            </p>
            <p class="text-xs text-gray-400 mt-2">
                ₱{{ number_format($stats['total_spent'], 2) }} spent
            </p>
        </div>

        <div class="bg-white rounded-xl p-5 border border-gray-200">
            <p class="text-sm text-gray-500">Pending Complaints</p>
            <p class="text-3xl font-bold text-orange-500 mt-1">{{ $stats['pending_complaints'] }}</p>
            <p class="text-xs text-gray-400 mt-2">{{ $stats['resolved_complaints'] }} resolved</p>
        </div>

        <div class="bg-white rounded-xl p-5 border border-gray-200">
            <p class="text-sm text-gray-500">Pending Expenses</p>
            <p class="text-3xl font-bold text-red-500 mt-1">{{ $stats['pending_expenses'] }}</p>
            <p class="text-xs text-gray-400 mt-2">Awaiting approval</p>
        </div>
    </div>

    {{-- Recent Projects + Complaints --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        {{-- Recent Projects --}}
        <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
            <div class="px-5 py-4 border-b border-gray-100 flex items-center justify-between">
                <h3 class="font-semibold text-gray-800">Recent Projects</h3>
                <a href="{{ route('admin.projects.index') }}" class="text-xs text-blue-600 hover:underline">View all</a>
            </div>
            <div class="divide-y divide-gray-50">
                @forelse($recent_projects as $project)
                <div class="px-5 py-3 flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-800">{{ $project->title }}</p>
                        <p class="text-xs text-gray-400">{{ $project->location }}</p>
                    </div>
                    <span class="text-xs px-2 py-1 rounded-full font-medium
                        {{ $project->status === 'ongoing' ? 'bg-yellow-100 text-yellow-700' : '' }}
                        {{ $project->status === 'completed' ? 'bg-green-100 text-green-700' : '' }}
                        {{ $project->status === 'planned' ? 'bg-blue-100 text-blue-700' : '' }}
                        {{ $project->status === 'suspended' ? 'bg-red-100 text-red-700' : '' }}">
                        {{ ucfirst($project->status) }}
                    </span>
                </div>
                @empty
                <p class="px-5 py-4 text-sm text-gray-400">No projects yet.</p>
                @endforelse
            </div>
        </div>

        {{-- Recent Complaints --}}
        <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
            <div class="px-5 py-4 border-b border-gray-100 flex items-center justify-between">
                <h3 class="font-semibold text-gray-800">Recent Complaints</h3>
                <a href="{{ route('admin.complaints.index') }}" class="text-xs text-blue-600 hover:underline">View all</a>
            </div>
            <div class="divide-y divide-gray-50">
                @forelse($recent_complaints as $complaint)
                <div class="px-5 py-3 flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-800">{{ $complaint->subject }}</p>
                        <p class="text-xs text-gray-400">{{ $complaint->tracking_number }}</p>
                    </div>
                    <span class="text-xs px-2 py-1 rounded-full font-medium
                        {{ $complaint->status === 'submitted' ? 'bg-blue-100 text-blue-700' : '' }}
                        {{ $complaint->status === 'under_review' ? 'bg-yellow-100 text-yellow-700' : '' }}
                        {{ $complaint->status === 'resolved' ? 'bg-green-100 text-green-700' : '' }}
                        {{ $complaint->status === 'dismissed' ? 'bg-gray-100 text-gray-600' : '' }}">
                        {{ $complaint->status_label }}
                    </span>
                </div>
                @empty
                <p class="px-5 py-4 text-sm text-gray-400">No complaints yet.</p>
                @endforelse
            </div>
        </div>
    </div>

</div>
@endsection