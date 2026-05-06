<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Complaint — Barangay System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen">

<nav class="bg-blue-900 text-white px-6 py-4 flex items-center justify-between">
    <a href="{{ route('home') }}" class="text-lg font-bold">Barangay System</a>
    <div class="flex gap-4 text-sm">
        <a href="{{ route('projects.index') }}" class="hover:underline">Projects</a>
        <a href="{{ route('complaints.create') }}" class="hover:underline">Submit Complaint</a>
        <a href="{{ route('complaints.track') }}" class="underline">Track Complaint</a>
    </div>
</nav>

<div class="max-w-xl mx-auto px-6 py-8 space-y-6">

    <div class="bg-white rounded-xl border border-gray-200 p-6">
        <h1 class="text-xl font-bold text-gray-800 mb-1">Track Your Complaint</h1>
        <p class="text-sm text-gray-500 mb-5">
            Enter your tracking number to check the status of your complaint.
        </p>

        {{-- Show tracking number from session after submission --}}
        @if(session('tracking_number'))
        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-5">
            <p class="text-blue-800 text-sm font-medium">Your tracking number is:</p>
            <p class="font-mono text-2xl font-bold text-blue-700 mt-1">
                {{ session('tracking_number') }}
            </p>
            <p class="text-blue-600 text-xs mt-1">Save this number to track your complaint anytime.</p>
        </div>
        @endif

        <form method="GET" action="{{ route('complaints.track') }}" class="flex gap-3">
            <input type="text" name="tracking_number"
                   value="{{ request('tracking_number') }}"
                   placeholder="e.g. BGY-202604-ABC12"
                   required
                   class="flex-1 border border-gray-300 rounded-lg px-4 py-2.5 text-sm
                          focus:outline-none focus:ring-2 focus:ring-blue-500 font-mono">
            <button type="submit"
                    class="bg-blue-700 hover:bg-blue-800 text-white font-medium
                           px-5 py-2.5 rounded-lg text-sm">
                Track
            </button>
        </form>

        @if($error)
        <div class="mt-4 bg-red-50 border border-red-200 rounded-lg p-3">
            <p class="text-red-700 text-sm">{{ $error }}</p>
        </div>
        @endif
    </div>

    {{-- Complaint Result --}}
    @if($complaint)
    <div class="bg-white rounded-xl border border-gray-200 p-6 space-y-4">

        {{-- Header --}}
        <div class="flex items-start justify-between">
            <div>
                <span class="font-mono text-xs text-blue-600 bg-blue-50 px-2 py-1 rounded">
                    {{ $complaint->tracking_number }}
                </span>
                <h2 class="text-lg font-bold text-gray-800 mt-2">{{ $complaint->subject }}</h2>
            </div>
            <span class="px-3 py-1 rounded-full text-sm font-medium
                {{ $complaint->status === 'submitted'    ? 'bg-blue-100 text-blue-700'     : '' }}
                {{ $complaint->status === 'under_review' ? 'bg-yellow-100 text-yellow-700' : '' }}
                {{ $complaint->status === 'resolved'     ? 'bg-green-100 text-green-700'   : '' }}
                {{ $complaint->status === 'dismissed'    ? 'bg-gray-100 text-gray-600'     : '' }}">
                {{ $complaint->status_label }}
            </span>
        </div>

        {{-- Timeline --}}
        <div class="space-y-3">
            <div class="flex items-center gap-3">
                <div class="w-3 h-3 rounded-full bg-blue-500 flex-shrink-0"></div>
                <div>
                    <p class="text-sm font-medium text-gray-700">Complaint Submitted</p>
                    <p class="text-xs text-gray-400">{{ $complaint->created_at->format('F d, Y h:i A') }}</p>
                </div>
            </div>

            @if(in_array($complaint->status, ['under_review', 'resolved', 'dismissed']))
            <div class="flex items-center gap-3">
                <div class="w-3 h-3 rounded-full bg-yellow-500 flex-shrink-0"></div>
                <div>
                    <p class="text-sm font-medium text-gray-700">Under Review</p>
                    <p class="text-xs text-gray-400">Being reviewed by barangay officials</p>
                </div>
            </div>
            @endif

            @if($complaint->status === 'resolved')
            <div class="flex items-center gap-3">
                <div class="w-3 h-3 rounded-full bg-green-500 flex-shrink-0"></div>
                <div>
                    <p class="text-sm font-medium text-gray-700">Resolved</p>
                    <p class="text-xs text-gray-400">
                        {{ $complaint->resolved_at?->format('F d, Y') }}
                    </p>
                </div>
            </div>
            @endif

            @if($complaint->status === 'dismissed')
            <div class="flex items-center gap-3">
                <div class="w-3 h-3 rounded-full bg-gray-400 flex-shrink-0"></div>
                <div>
                    <p class="text-sm font-medium text-gray-700">Dismissed</p>
                    <p class="text-xs text-gray-400">This complaint has been dismissed</p>
                </div>
            </div>
            @endif
        </div>

        {{-- Description --}}
        <div class="bg-gray-50 rounded-lg p-4">
            <p class="text-xs text-gray-400 mb-1">Your complaint</p>
            <p class="text-sm text-gray-700">{{ $complaint->description }}</p>
        </div>

        {{-- Admin Response --}}
        @if($complaint->admin_response)
        <div class="bg-green-50 border border-green-200 rounded-lg p-4">
            <p class="text-xs text-green-600 font-medium mb-2">
                Response from Barangay Officials
            </p>
            <p class="text-sm text-gray-700 leading-relaxed">
                {{ $complaint->admin_response }}
            </p>
        </div>
        @else
        <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
            <p class="text-sm text-yellow-700">
                No response yet. Our officials are reviewing your complaint.
                Please check back later.
            </p>
        </div>
        @endif
    </div>
    @endif

</div>
</body>
</html>