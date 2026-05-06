@extends('layouts.admin')
@section('title', 'Complaint Details')
@section('page-title', 'Complaint Details')

@section('content')
<div class="max-w-3xl space-y-6">

    <a href="{{ route('admin.complaints.index') }}"
       class="text-sm text-gray-500 hover:text-gray-700">← Back to Complaints</a>

    {{-- Complaint Info --}}
    <div class="bg-white rounded-xl border border-gray-200 p-6 space-y-4">
        <div class="flex items-start justify-between">
            <div>
                <span class="font-mono text-xs text-blue-600 bg-blue-50 px-2 py-1 rounded">
                    {{ $complaint->tracking_number }}
                </span>
                <h2 class="text-xl font-bold text-gray-800 mt-2">{{ $complaint->subject }}</h2>
            </div>
            <span class="px-3 py-1 rounded-full text-sm font-medium
                {{ $complaint->status === 'submitted'    ? 'bg-blue-100 text-blue-700'     : '' }}
                {{ $complaint->status === 'under_review' ? 'bg-yellow-100 text-yellow-700' : '' }}
                {{ $complaint->status === 'resolved'     ? 'bg-green-100 text-green-700'   : '' }}
                {{ $complaint->status === 'dismissed'    ? 'bg-gray-100 text-gray-600'     : '' }}">
                {{ $complaint->status_label }}
            </span>
        </div>

        {{-- Details Grid --}}
        <div class="grid grid-cols-2 gap-4 text-sm border-t pt-4">
            <div>
                <p class="text-gray-400 text-xs">Submitted by</p>
                <p class="font-medium">{{ $complaint->submitter_name }}</p>
            </div>
            <div>
                <p class="text-gray-400 text-xs">Type</p>
                <p class="font-medium">{{ ucfirst($complaint->type) }}</p>
            </div>
            @if($complaint->email)
            <div>
                <p class="text-gray-400 text-xs">Email</p>
                <p class="font-medium">{{ $complaint->email }}</p>
            </div>
            @endif
            @if($complaint->phone)
            <div>
                <p class="text-gray-400 text-xs">Phone</p>
                <p class="font-medium">{{ $complaint->phone }}</p>
            </div>
            @endif
            @if($complaint->project)
            <div>
                <p class="text-gray-400 text-xs">Related Project</p>
                <a href="{{ route('admin.projects.show', $complaint->project) }}"
                   class="text-blue-600 hover:underline">{{ $complaint->project->title }}</a>
            </div>
            @endif
            <div>
                <p class="text-gray-400 text-xs">Date Submitted</p>
                <p class="font-medium">{{ $complaint->created_at->format('F d, Y h:i A') }}</p>
            </div>
            @if($complaint->assignee)
            <div>
                <p class="text-gray-400 text-xs">Assigned to</p>
                <p class="font-medium">{{ $complaint->assignee->name }}</p>
            </div>
            @endif
            @if($complaint->resolved_at)
            <div>
                <p class="text-gray-400 text-xs">Resolved at</p>
                <p class="font-medium text-green-600">{{ $complaint->resolved_at->format('F d, Y') }}</p>
            </div>
            @endif
        </div>

        {{-- Description --}}
        <div class="bg-gray-50 rounded-lg p-4">
            <p class="text-xs text-gray-400 mb-2">Description</p>
            <p class="text-gray-700 text-sm leading-relaxed">{{ $complaint->description }}</p>
        </div>

        {{-- Attachment --}}
        @if($complaint->attachment_path)
        <div>
            <p class="text-xs text-gray-400 mb-1">Attachment</p>
            <a href="{{ Storage::url($complaint->attachment_path) }}"
               target="_blank"
               class="text-blue-600 hover:underline text-sm">View Attachment</a>
        </div>
        @endif
    </div>

    {{-- Previous Response --}}
    @if($complaint->admin_response)
    <div class="bg-green-50 border border-green-200 rounded-xl p-5">
        <p class="text-xs text-green-600 font-medium mb-2">Admin Response</p>
        <p class="text-gray-700 text-sm leading-relaxed">{{ $complaint->admin_response }}</p>
    </div>
    @endif

    {{-- Response Form --}}
    @can('respond complaints')
    <div class="bg-white rounded-xl border border-gray-200 p-6">
        <h3 class="font-semibold text-gray-800 mb-4">
            {{ $complaint->admin_response ? 'Update Response' : 'Write a Response' }}
        </h3>
        <form method="POST"
              action="{{ route('admin.complaints.respond', $complaint) }}"
              class="space-y-4">
            @csrf

            {{-- Response Text --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Response *
                </label>
                <textarea name="admin_response" rows="4" required
                          class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm
                                 focus:outline-none focus:ring-2 focus:ring-blue-500"
                          placeholder="Write your response to the resident...">{{ old('admin_response', $complaint->admin_response) }}</textarea>
                @error('admin_response')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-2 gap-4">
                {{-- Status --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Update Status *
                    </label>
                    <select name="status" required
                            class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm
                                   focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="submitted"
                            {{ old('status', $complaint->status) === 'submitted' ? 'selected' : '' }}>
                            Submitted
                        </option>
                        <option value="under_review"
                            {{ old('status', $complaint->status) === 'under_review' ? 'selected' : '' }}>
                            Under Review
                        </option>
                        <option value="resolved"
                            {{ old('status', $complaint->status) === 'resolved' ? 'selected' : '' }}>
                            Resolved
                        </option>
                        <option value="dismissed"
                            {{ old('status', $complaint->status) === 'dismissed' ? 'selected' : '' }}>
                            Dismissed
                        </option>
                    </select>
                </div>

                {{-- Assign To --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Assign To
                    </label>
                    <select name="assigned_to"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm
                                   focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Not assigned</option>
                        @foreach($officials as $official)
                        <option value="{{ $official->id }}"
                            {{ old('assigned_to', $complaint->assigned_to) == $official->id ? 'selected' : '' }}>
                            {{ $official->name }} ({{ $official->display_role }})
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <button type="submit"
                    class="bg-blue-700 hover:bg-blue-800 text-white font-medium
                           px-6 py-2.5 rounded-lg text-sm">
                Submit Response
            </button>
        </form>
    </div>
    @endcan

</div>
@endsection