@extends('layouts.admin')
@section('title', 'Complaints')
@section('page-title', 'Complaints & Reports')

@section('content')
<div class="space-y-4">

    {{-- Filter Bar --}}
    <form method="GET" class="bg-white rounded-xl border border-gray-200 p-4 flex flex-wrap gap-3">
        <input type="text" name="search" value="{{ request('search') }}"
               placeholder="Search by subject or tracking number..."
               class="flex-1 min-w-48 border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">

        <select name="status"
                class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="">All Status</option>
            <option value="submitted"    {{ request('status') === 'submitted'    ? 'selected' : '' }}>Submitted</option>
            <option value="under_review" {{ request('status') === 'under_review' ? 'selected' : '' }}>Under Review</option>
            <option value="resolved"     {{ request('status') === 'resolved'     ? 'selected' : '' }}>Resolved</option>
            <option value="dismissed"    {{ request('status') === 'dismissed'    ? 'selected' : '' }}>Dismissed</option>
        </select>

        <select name="type"
                class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="">All Types</option>
            <option value="complaint"   {{ request('type') === 'complaint'   ? 'selected' : '' }}>Complaint</option>
            <option value="report"      {{ request('type') === 'report'      ? 'selected' : '' }}>Report</option>
            <option value="suggestion"  {{ request('type') === 'suggestion'  ? 'selected' : '' }}>Suggestion</option>
        </select>

        <button type="submit"
                class="bg-blue-700 hover:bg-blue-800 text-white text-sm font-medium px-4 py-2 rounded-lg">
            Filter
        </button>
        <a href="{{ route('admin.complaints.index') }}"
           class="bg-gray-100 hover:bg-gray-200 text-gray-600 text-sm font-medium px-4 py-2 rounded-lg">
            Clear
        </a>
    </form>

    {{-- Stats Row --}}
    <div class="grid grid-cols-4 gap-4">
        @foreach([
            ['label' => 'Submitted',    'status' => 'submitted',    'color' => 'blue'],
            ['label' => 'Under Review', 'status' => 'under_review', 'color' => 'yellow'],
            ['label' => 'Resolved',     'status' => 'resolved',     'color' => 'green'],
            ['label' => 'Dismissed',    'status' => 'dismissed',    'color' => 'gray'],
        ] as $stat)
        <div class="bg-white rounded-xl border border-gray-200 p-4 text-center">
            <p class="text-2xl font-bold text-{{ $stat['color'] }}-600">
                {{ \App\Models\Complaint::where('status', $stat['status'])->count() }}
            </p>
            <p class="text-xs text-gray-500 mt-1">{{ $stat['label'] }}</p>
        </div>
        @endforeach
    </div>

    {{-- Table --}}
    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="text-left px-5 py-3 font-medium text-gray-600">Tracking #</th>
                    <th class="text-left px-5 py-3 font-medium text-gray-600">Subject</th>
                    <th class="text-left px-5 py-3 font-medium text-gray-600">From</th>
                    <th class="text-left px-5 py-3 font-medium text-gray-600">Type</th>
                    <th class="text-left px-5 py-3 font-medium text-gray-600">Status</th>
                    <th class="text-left px-5 py-3 font-medium text-gray-600">Date</th>
                    <th class="text-left px-5 py-3 font-medium text-gray-600">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($complaints as $complaint)
                <tr class="hover:bg-gray-50">
                    <td class="px-5 py-3">
                        <span class="font-mono text-xs text-blue-600">
                            {{ $complaint->tracking_number }}
                        </span>
                    </td>
                    <td class="px-5 py-3">
                        <p class="font-medium text-gray-800">{{ $complaint->subject }}</p>
                        @if($complaint->project)
                        <p class="text-xs text-gray-400">Re: {{ $complaint->project->title }}</p>
                        @endif
                    </td>
                    <td class="px-5 py-3 text-gray-600">
                        {{ $complaint->submitter_name }}
                        @if($complaint->email)
                        <p class="text-xs text-gray-400">{{ $complaint->email }}</p>
                        @endif
                    </td>
                    <td class="px-5 py-3">
                        <span class="px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-600">
                            {{ ucfirst($complaint->type) }}
                        </span>
                    </td>
                    <td class="px-5 py-3">
                        <span class="px-2 py-1 rounded-full text-xs font-medium
                            {{ $complaint->status === 'submitted'    ? 'bg-blue-100 text-blue-700'   : '' }}
                            {{ $complaint->status === 'under_review' ? 'bg-yellow-100 text-yellow-700' : '' }}
                            {{ $complaint->status === 'resolved'     ? 'bg-green-100 text-green-700'  : '' }}
                            {{ $complaint->status === 'dismissed'    ? 'bg-gray-100 text-gray-600'    : '' }}">
                            {{ $complaint->status_label }}
                        </span>
                    </td>
                    <td class="px-5 py-3 text-gray-400 text-xs">
                        {{ $complaint->created_at->format('M d, Y') }}
                    </td>
                    <td class="px-5 py-3">
                        <div class="flex gap-2">
                            <a href="{{ route('admin.complaints.show', $complaint) }}"
                               class="text-blue-600 hover:underline text-xs">View & Respond</a>
                            @can('delete complaints')
                            <form method="POST"
                                  action="{{ route('admin.complaints.destroy', $complaint) }}"
                                  onsubmit="return confirm('Delete this complaint?')">
                                @csrf @method('DELETE')
                                <button class="text-red-500 hover:underline text-xs">Delete</button>
                            </form>
                            @endcan
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-5 py-8 text-center text-gray-400">
                        No complaints found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $complaints->links() }}
</div>
@endsection