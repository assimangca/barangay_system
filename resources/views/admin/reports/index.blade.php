@extends('layouts.admin')
@section('title', 'Reports')
@section('page-title', 'Transparency Reports')

@section('content')
<div class="space-y-6">

    {{-- Stats Overview --}}
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-white rounded-xl border border-gray-200 p-5">
            <p class="text-sm text-gray-500">Total Projects</p>
            <p class="text-3xl font-bold text-blue-600 mt-1">{{ $stats['total_projects'] }}</p>
            <div class="flex gap-3 mt-2 text-xs">
                <span class="text-yellow-600">{{ $stats['ongoing_projects'] }} ongoing</span>
                <span class="text-green-600">{{ $stats['completed_projects'] }} done</span>
                <span class="text-blue-600">{{ $stats['planned_projects'] }} planned</span>
            </div>
        </div>
        <div class="bg-white rounded-xl border border-gray-200 p-5">
            <p class="text-sm text-gray-500">Total Budget</p>
            <p class="text-3xl font-bold text-green-600 mt-1">
                ₱{{ number_format($stats['total_budget'], 0) }}
            </p>
            <p class="text-xs text-gray-400 mt-2">
                ₱{{ number_format($stats['total_spent'], 0) }} spent
            </p>
        </div>
        <div class="bg-white rounded-xl border border-gray-200 p-5">
            <p class="text-sm text-gray-500">Budget Remaining</p>
            <p class="text-3xl font-bold text-blue-600 mt-1">
                ₱{{ number_format($stats['total_budget'] - $stats['total_spent'], 0) }}
            </p>
            <p class="text-xs text-gray-400 mt-2">
                {{ $stats['total_budget'] > 0 ? round(($stats['total_spent'] / $stats['total_budget']) * 100, 1) : 0 }}% utilized
            </p>
        </div>
        <div class="bg-white rounded-xl border border-gray-200 p-5">
            <p class="text-sm text-gray-500">Complaints</p>
            <p class="text-3xl font-bold text-orange-500 mt-1">{{ $stats['total_complaints'] }}</p>
            <p class="text-xs text-gray-400 mt-2">
                {{ $stats['resolved_complaints'] }} resolved
            </p>
        </div>
    </div>

    {{-- Generate Reports --}}
    <div class="bg-white rounded-xl border border-gray-200 p-6">
        <h3 class="font-semibold text-gray-800 mb-4">Generate PDF Reports</h3>
        <p class="text-sm text-gray-500 mb-5">
            Download official transparency reports as PDF documents.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            {{-- Projects Report --}}
            <div class="border border-gray-200 rounded-xl p-5">
                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mb-3">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
                <h4 class="font-semibold text-gray-800 mb-1">Projects Report</h4>
                <p class="text-sm text-gray-500 mb-4">
                    All projects with status, progress, budget and milestones.
                </p>
                <a href="{{ route('admin.reports.generate', 'projects') }}"
                   class="block text-center bg-blue-700 hover:bg-blue-800 text-white
                          text-sm font-medium py-2 rounded-lg">
                    Download PDF
                </a>
            </div>

            {{-- Budget Report --}}
            <div class="border border-gray-200 rounded-xl p-5">
                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mb-3">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h4 class="font-semibold text-gray-800 mb-1">Budget Report</h4>
                <p class="text-sm text-gray-500 mb-4">
                    Budget allocations, expenses and fund utilization.
                </p>
                <a href="{{ route('admin.reports.generate', 'budget') }}"
                   class="block text-center bg-green-700 hover:bg-green-800 text-white
                          text-sm font-medium py-2 rounded-lg">
                    Download PDF
                </a>
            </div>

            {{-- Complaints Report --}}
            <div class="border border-gray-200 rounded-xl p-5">
                <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center mb-3">
                    <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                    </svg>
                </div>
                <h4 class="font-semibold text-gray-800 mb-1">Complaints Report</h4>
                <p class="text-sm text-gray-500 mb-4">
                    All complaints and reports with status and responses.
                </p>
                <a href="{{ route('admin.reports.generate', 'complaints') }}"
                   class="block text-center bg-orange-600 hover:bg-orange-700 text-white
                          text-sm font-medium py-2 rounded-lg">
                    Download PDF
                </a>
            </div>
        </div>
    </div>

    {{-- Projects Summary Table --}}
    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100">
            <h3 class="font-semibold text-gray-800">Projects Summary</h3>
        </div>
        <table class="w-full text-sm">
            <thead class="bg-gray-50 border-b border-gray-100">
                <tr>
                    <th class="text-left px-5 py-3 font-medium text-gray-600">Project</th>
                    <th class="text-left px-5 py-3 font-medium text-gray-600">Status</th>
                    <th class="text-left px-5 py-3 font-medium text-gray-600">Progress</th>
                    <th class="text-left px-5 py-3 font-medium text-gray-600">Budget</th>
                    <th class="text-left px-5 py-3 font-medium text-gray-600">Spent</th>
                    <th class="text-left px-5 py-3 font-medium text-gray-600">Remaining</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($projects as $project)
                <tr>
                    <td class="px-5 py-3 font-medium text-gray-800">{{ $project->title }}</td>
                    <td class="px-5 py-3">
                        <span class="px-2 py-1 rounded-full text-xs font-medium
                            {{ $project->status === 'ongoing'   ? 'bg-yellow-100 text-yellow-700' : '' }}
                            {{ $project->status === 'completed' ? 'bg-green-100 text-green-700'   : '' }}
                            {{ $project->status === 'planned'   ? 'bg-blue-100 text-blue-700'     : '' }}
                            {{ $project->status === 'suspended' ? 'bg-red-100 text-red-700'       : '' }}">
                            {{ ucfirst($project->status) }}
                        </span>
                    </td>
                    <td class="px-5 py-3">
                        <div class="flex items-center gap-2">
                            <div class="w-20 bg-gray-200 rounded-full h-2">
                                <div class="bg-blue-600 h-2 rounded-full"
                                     style="width: {{ $project->completion_percentage }}%"></div>
                            </div>
                            <span class="text-xs text-gray-500">{{ $project->completion_percentage }}%</span>
                        </div>
                    </td>
                    <td class="px-5 py-3 text-gray-700">₱{{ number_format($project->total_budget, 2) }}</td>
                    <td class="px-5 py-3 text-red-600">₱{{ number_format($project->total_spent, 2) }}</td>
                    <td class="px-5 py-3 text-green-600 font-medium">₱{{ number_format($project->remaining_budget, 2) }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-5 py-6 text-center text-gray-400">No projects yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection