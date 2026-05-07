<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Complaint — Barangay System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen">

<<<<<<< Updated upstream
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
    <div class="mb-6">
        <a href="{{ route('home') }}" 
           class="inline-flex items-center gap-2 bg-blue-700 hover:bg-blue-800 text-white px-4 py-2 rounded-lg text-sm font-medium transition shadow-sm">
            ← Back to Home
        </a>
    </div>
</div>
=======
<body class="min-h-screen bg-gradient-to-br from-blue-50 via-slate-100 to-slate-200 text-slate-900">

<nav class="sticky top-0 z-50 bg-blue-950 text-white shadow-lg">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">
        <a href="{{ route('home') }}" class="text-xl font-bold">Barangay System</a>
        <div class="flex items-center gap-6 text-sm font-medium">
            <a href="{{ route('projects.index') }}" class="transition hover:text-blue-200">Projects</a>
            <a href="{{ route('complaints.create') }}" class="transition hover:text-blue-200">Submit Complaint</a>
            <a href="{{ route('complaints.track') }}" class="text-blue-200">Track Complaint</a>
        </div>
    </div>
</nav>

<!-- MAIN CONTENT WRAPPER -->
<div class="mx-auto max-w-7xl px-6 pt-10">
    
    <!-- BOXED BACK BUTTON -->
    <div class="mb-6">
        <a href="{{ route('home') }}" class="group inline-flex items-center gap-2 rounded-2xl bg-white px-5 py-3 text-sm font-bold text-slate-700 shadow-sm ring-1 ring-slate-200 transition-all hover:bg-blue-50 hover:text-blue-700 hover:shadow-md active:scale-95">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="h-4 w-4 transition-transform group-hover:-translate-x-1">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
            </svg>
            BACK TO HOME
        </a>
    </div>

    <!-- MAIN GRID -->
    <main class="grid items-start gap-10 pb-16 lg:grid-cols-2">

        <!-- LEFT SIDE (Tracking Form) -->
        <div class="rounded-3xl bg-white/70 p-8 shadow-2xl ring-1 ring-slate-200 backdrop-blur-md">
            <p class="mb-4 inline-block rounded-full bg-blue-100 px-4 py-2 text-sm font-semibold text-blue-800">
                Complaint Tracking Portal
            </p>

            <h1 class="text-4xl font-extrabold tracking-tight text-blue-950">
                Track Your Complaint
            </h1>

            <p class="mt-3 mb-8 text-lg leading-relaxed text-slate-600">
                Enter your tracking number to check the latest status of your complaint.
            </p>

            @if(session('tracking_number'))
            <div class="mb-6 rounded-2xl border border-blue-200 bg-blue-50/80 p-5">
                <p class="text-sm font-semibold text-blue-800">Your tracking number is:</p>
                <p class="mt-1 font-mono text-2xl font-bold text-blue-700">{{ session('tracking_number') }}</p>
                <p class="mt-1 text-xs text-blue-600">Save this number to track your complaint anytime.</p>
            </div>
            @endif

            <form method="GET" action="{{ route('complaints.track') }}" class="flex flex-col gap-3 sm:flex-row">
                <input type="text" name="tracking_number" value="{{ request('tracking_number') }}" placeholder="e.g. BGY-202604-ABC12" required class="flex-1 rounded-full border border-slate-300 bg-white/70 px-5 py-3 font-mono text-sm outline-none transition focus:border-blue-600 focus:ring-4 focus:ring-blue-100">
                <button type="submit" class="rounded-full bg-blue-700 px-7 py-3 text-sm font-semibold text-white shadow-lg transition duration-300 hover:-translate-y-1 hover:bg-blue-800 hover:shadow-xl active:scale-95">
                    Track
                </button>
            </form>

            @if($error)
            <div class="mt-5 rounded-2xl border border-red-200 bg-red-50 p-4">
                <p class="text-sm text-red-700">{{ $error }}</p>
            </div>
            @endif
        </div>

        <!-- RIGHT SIDE (Visual) -->
        <div class="hidden lg:block">
            <div class="rounded-[2rem] bg-white/70 p-8 shadow-2xl ring-1 ring-slate-200 backdrop-blur-md">
                <div class="relative flex h-72 items-center justify-center overflow-hidden rounded-3xl bg-gradient-to-br from-blue-700 to-blue-950">
                    <div class="absolute h-44 w-44 animate-ping rounded-full bg-blue-300/20"></div>
                    <div class="absolute h-64 w-64 animate-pulse rounded-full bg-blue-400/20 blur-3xl"></div>
                    
                    <!-- BOUNCING ENVELOPE -->
                    <div class="relative z-10 h-40 w-56 animate-[bounce_2s_infinite] rounded-2xl bg-white shadow-2xl">
                        <div class="absolute inset-0 rounded-2xl bg-white"></div>
                        <div class="absolute left-0 top-0 h-0 w-0 border-l-[112px] border-r-[112px] border-t-[80px] border-l-transparent border-r-transparent border-t-blue-100"></div>
                        <div class="absolute bottom-0 left-0 h-0 w-0 border-b-[80px] border-r-[112px] border-b-blue-50 border-r-transparent"></div>
                        <div class="absolute bottom-0 right-0 h-0 w-0 border-b-[80px] border-l-[112px] border-b-blue-50 border-l-transparent"></div>
                        <div class="absolute bottom-0 left-0 h-0 w-0 border-b-[90px] border-l-[112px] border-r-[112px] border-b-white border-l-transparent border-r-transparent"></div>
                        <div class="absolute left-1/2 top-1/2 h-10 w-10 -translate-x-1/2 -translate-y-1/2 rounded-full bg-blue-700 shadow-lg"></div>
                        <div class="absolute bottom-6 left-1/2 h-2 w-24 -translate-x-1/2 rounded-full bg-blue-200"></div>
                    </div>
                </div>
                <div class="mt-6 text-center">
                    <h3 class="text-3xl font-extrabold tracking-wide text-blue-950">TRACK YOUR REPORT</h3>
                    <p class="mt-3 text-base leading-relaxed text-slate-500">Use your tracking number to monitor updates, responses, and complaint status.</p>
                </div>
            </div>
        </div>

        <!-- TRACKING RESULT -->
        @if($complaint)
        <div class="rounded-3xl bg-white/70 p-8 shadow-2xl ring-1 ring-slate-200 backdrop-blur-md lg:col-span-2">
            <div class="flex items-start justify-between">
                <div>
                    <span class="rounded-full bg-blue-100 px-3 py-1 font-mono text-xs font-semibold text-blue-700">
                        {{ $complaint->tracking_number }}
                    </span>
                    <h2 class="mt-3 text-2xl font-extrabold text-blue-950">
                        {{ $complaint->subject }}
                    </h2>
                </div>
                <span class="rounded-full px-4 py-2 text-sm font-semibold
                    {{ $complaint->status === 'submitted' ? 'bg-blue-100 text-blue-700' : '' }}
                    {{ $complaint->status === 'under_review' ? 'bg-yellow-100 text-yellow-700' : '' }}
                    {{ $complaint->status === 'resolved' ? 'bg-green-100 text-green-700' : '' }}
                    {{ $complaint->status === 'dismissed' ? 'bg-gray-100 text-gray-600' : '' }}">
                    {{ $complaint->status_label }}
                </span>
            </div>
        </div>
        @endif
    </main>
</div>

>>>>>>> Stashed changes
</body>
</html>