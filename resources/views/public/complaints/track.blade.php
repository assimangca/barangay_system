<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Complaint — Barangay System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gradient-to-br from-blue-50 via-slate-100 to-slate-200 text-slate-900">

<nav class="sticky top-0 z-50 bg-blue-950 text-white shadow-lg">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">

        <a href="{{ route('home') }}" class="text-xl font-bold">
            Barangay System
        </a>

        <div class="flex items-center gap-6 text-sm font-medium">

            <a href="{{ route('projects.index') }}"
               class="transition hover:text-blue-200">
                Projects
            </a>

            <a href="{{ route('complaints.create') }}"
               class="transition hover:text-blue-200">
                Submit Complaint
            </a>

            <a href="{{ route('complaints.track') }}"
               class="text-blue-200">
                Track Complaint
            </a>

        </div>
    </div>
</nav>

<main class="mx-auto grid min-h-[calc(100vh-80px)] max-w-7xl items-center gap-10 px-6 py-16 lg:grid-cols-2">

    <!-- LEFT SIDE -->
    <div class="rounded-3xl bg-white/70 p-8 shadow-2xl ring-1 ring-slate-200 backdrop-blur-md">

        <p class="mb-4 inline-block rounded-full bg-blue-100 px-4 py-2 text-sm font-semibold text-blue-800">
            Complaint Tracking Portal
        </p>

        <h1 class="text-4xl font-extrabold tracking-tight text-blue-950">
            Track Your Complaint
        </h1>

        <p class="mt-3 mb-8 text-lg leading-relaxed text-slate-600">
            Enter your tracking number to check the latest
            status of your complaint.
        </p>

        @if(session('tracking_number'))
        <div class="mb-6 rounded-2xl border border-blue-200 bg-blue-50/80 p-5">

            <p class="text-sm font-semibold text-blue-800">
                Your tracking number is:
            </p>

            <p class="mt-1 font-mono text-2xl font-bold text-blue-700">
                {{ session('tracking_number') }}
            </p>

            <p class="mt-1 text-xs text-blue-600">
                Save this number to track your complaint anytime.
            </p>

        </div>
        @endif

        <form method="GET"
              action="{{ route('complaints.track') }}"
              class="flex flex-col gap-3 sm:flex-row">

            <input type="text"
                   name="tracking_number"
                   value="{{ request('tracking_number') }}"
                   placeholder="e.g. BGY-202604-ABC12"
                   required
                   class="flex-1 rounded-full border border-slate-300 bg-white/70 px-5 py-3 font-mono text-sm outline-none transition focus:border-blue-600 focus:ring-4 focus:ring-blue-100">

            <button type="submit"
                    class="rounded-full bg-blue-700 px-7 py-3 text-sm font-semibold text-white shadow-lg transition duration-300 hover:-translate-y-1 hover:bg-blue-800 hover:shadow-xl active:scale-95">

                Track

            </button>

        </form>

        @if($error)
        <div class="mt-5 rounded-2xl border border-red-200 bg-red-50 p-4">
            <p class="text-sm text-red-700">{{ $error }}</p>
        </div>
        @endif

    </div>

    <!-- RIGHT SIDE -->
    <div class="hidden lg:block">

        <div class="rounded-[2rem] bg-white/70 p-8 shadow-2xl ring-1 ring-slate-200 backdrop-blur-md">

            <div class="relative flex h-72 items-center justify-center overflow-hidden rounded-3xl bg-gradient-to-br from-blue-700 to-blue-950">

                <!-- GLOW -->
                <div class="absolute h-44 w-44 animate-ping rounded-full bg-blue-300/20"></div>

                <div class="absolute h-64 w-64 animate-pulse rounded-full bg-blue-400/20 blur-3xl"></div>

                <!-- BOUNCING ENVELOPE -->
                <div class="relative z-10 h-40 w-56 animate-[bounce_2s_infinite] rounded-2xl bg-white shadow-2xl">

                    <!-- Envelope back -->
                    <div class="absolute inset-0 rounded-2xl bg-white"></div>

                    <!-- Envelope flap -->
                    <div class="absolute left-0 top-0 h-0 w-0 border-l-[112px] border-r-[112px] border-t-[80px] border-l-transparent border-r-transparent border-t-blue-100"></div>

                    <!-- Envelope side folds -->
                    <div class="absolute bottom-0 left-0 h-0 w-0 border-b-[80px] border-r-[112px] border-b-blue-50 border-r-transparent"></div>

                    <div class="absolute bottom-0 right-0 h-0 w-0 border-b-[80px] border-l-[112px] border-b-blue-50 border-l-transparent"></div>

                    <!-- Envelope bottom fold -->
                    <div class="absolute bottom-0 left-0 h-0 w-0 border-b-[90px] border-l-[112px] border-r-[112px] border-b-white border-l-transparent border-r-transparent"></div>

                    <!-- Seal -->
                    <div class="absolute left-1/2 top-1/2 h-10 w-10 -translate-x-1/2 -translate-y-1/2 rounded-full bg-blue-700 shadow-lg"></div>

                    <!-- Tracking line -->
                    <div class="absolute bottom-6 left-1/2 h-2 w-24 -translate-x-1/2 rounded-full bg-blue-200"></div>

                </div>

            </div>

            <div class="mt-6 text-center">

                <h3 class="text-3xl font-extrabold tracking-wide text-blue-950">
                    TRACK YOUR REPORT
                </h3>

                <p class="mt-3 text-base leading-relaxed text-slate-500">
                    Use your tracking number to monitor updates,
                    responses, and complaint status.
                </p>

            </div>

        </div>

    </div>

    <!-- RESULT -->
    @if($complaint)

    <div class="rounded-3xl bg-white/70 p-8 shadow-2xl ring-1 ring-slate-200 backdrop-blur-md lg:col-span-2">

        <div class="mb-6 flex items-start justify-between">

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

</body>
</html>