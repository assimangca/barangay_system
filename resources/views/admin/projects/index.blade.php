@extends('layouts.admin')
@section('title', 'Projects')
@section('page-title', 'Projects')

@section('content')
<div class="space-y-4">

    {{-- Header --}}
    <div class="flex items-center justify-between">
        <p class="text-sm text-gray-500">{{ $projects->total() }} total projects</p>
        @can('create projects')
        <a href="{{ route('admin.projects.create') }}"
           class="bg-blue-700 hover:bg-blue-800 text-white text-sm font-medium px-4 py-2 rounded-lg">
            + New Project
        </a>
        @endcan
    </div>

    {{-- Table --}}
    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="text-left px-5 py-3 font-medium text-gray-600">Project</th>
                    <th class="text-left px-5 py-3 font-medium text-gray-600">Status</th>
                    <th class="text-left px-5 py-3 font-medium text-gray-600">Progress</th>
                    <th class="text-left px-5 py-3 font-medium text-gray-600">Budget</th>
                    <th class="text-left px-5 py-3 font-medium text-gray-600">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($projects as $project)
                <tr class="hover:bg-gray-50">
                    <td class="px-5 py-3">
                        <p class="font-medium text-gray-800">{{ $project->title }}</p>
                        <p class="text-xs text-gray-400">{{ $project->project_code }} · {{ $project->location }}</p>
                    </td>
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
                            <div class="w-24 bg-gray-200 rounded-full h-2">
                                <div class="bg-blue-600 h-2 rounded-full"
                                     style="width: {{ $project->completion_percentage }}%"></div>
                            </div>
                            <span class="text-xs text-gray-500">{{ $project->completion_percentage }}%</span>
                        </div>
                    </td>
                    <td class="px-5 py-3">
                        <p class="text-gray-800">₱{{ number_format($project->total_budget, 2) }}</p>
                        <p class="text-xs text-gray-400">₱{{ number_format($project->total_spent, 2) }} spent</p>
                    </td>
                    <td class="px-5 py-3">
                        <div class="flex gap-2">
                            <a href="{{ route('admin.projects.show', $project) }}"
                               class="text-blue-600 hover:underline text-xs">View</a>
                            @can('edit projects')
                            <a href="{{ route('admin.projects.edit', $project) }}"
                               class="text-gray-600 hover:underline text-xs">Edit</a>
                            @endcan
                            @can('delete projects')
                            <form method="POST" action="{{ route('admin.projects.destroy', $project) }}"
                                  onsubmit="return confirm('Delete this project?')">
                                @csrf @method('DELETE')
                                <button class="text-red-500 hover:underline text-xs">Delete</button>
                            </form>
                            @endcan
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-5 py-8 text-center text-gray-400">
                        No projects yet. <a href="{{ route('admin.projects.create') }}" class="text-blue-600 hover:underline">Create one</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $projects->links() }}
</div>
@endsection