<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Complaint — Barangay Digital Service Portal</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-50 via-slate-100 to-slate-200 text-slate-900">

<!-- RESPONSIVE NAVBAR -->
<nav class="sticky top-0 z-50 bg-blue-950 text-white shadow-lg">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6">
        <a href="{{ url('/') }}" class="text-sm font-bold tracking-tight sm:text-lg md:text-xl hover:text-blue-200 transition">
            Barangay Digital Service Portal
        </a>

        <div class="flex items-center gap-3 text-xs font-medium sm:gap-6 sm:text-sm">
            <!-- Projects link -->
            <a href="{{ route('projects.index') }}" class="hidden transition hover:text-blue-200 md:block">Projects</a>
            
            <!-- NEW: Officials link -->
            <a href="{{ route('officials.index') }}" class="transition hover:text-blue-200">Officials</a>
            
            <!-- Complaint links -->
            <a href="{{ route('complaints.create') }}" class="transition hover:text-blue-200">Submit Complaint</a>
            <a href="{{ route('complaints.track') }}" class="hidden transition hover:text-blue-200 sm:block">Track Complaint</a>

            <!-- Login button -->
            <a href="{{ route('login') }}"
               class="rounded-full bg-white px-4 py-2 text-blue-950 shadow transition duration-300 hover:-translate-y-1 hover:bg-blue-100 sm:px-5">
                Login
            </a>
        </div>
    </div>
</nav>
<div class="relative z-10 mx-auto max-w-3xl px-6 py-10">
    <a href="{{ route('home') }}" class="group mb-6 inline-flex items-center gap-2 rounded-xl bg-white px-5 py-2.5 text-sm font-bold text-slate-700 shadow-sm ring-1 ring-slate-200 transition-all hover:bg-blue-50 hover:text-blue-700 hover:shadow-md active:scale-95">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="h-4 w-4 transition-transform group-hover:-translate-x-1"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" /></svg>
        BACK TO HOME
    </a>

    <div class="rounded-3xl bg-white/70 backdrop-blur-md p-8 shadow-2xl ring-1 ring-slate-200">
        <div class="mb-8">
            <p class="mb-4 inline-block rounded-full bg-blue-100 px-4 py-2 text-sm font-semibold text-blue-800">Community Transparency Portal</p>
            <h1 class="text-4xl font-extrabold tracking-tight text-blue-950">Submit a Complaint</h1>
            <p class="mt-3 text-lg text-slate-600">Report issues, submit concerns, or provide suggestions for your community.</p>
        </div>

        @if(session('success'))
        <div class="mb-8 rounded-2xl border border-green-200 bg-green-50/80 p-5 shadow-sm text-green-800 font-semibold">{{ session('success') }}</div>
        @endif

        <!-- YOUR FORM CODE CONTINUES HERE -->
        <form method="POST" action="{{ route('complaints.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <!-- (Paste the rest of your form here) -->
            <button type="submit" class="w-full rounded-full bg-blue-700 py-4 text-sm font-semibold text-white shadow-xl transition hover:-translate-y-1 hover:bg-blue-800 active:scale-95">Submit Complaint</button>
        </form>
    </div>
</div>
</body>
</html>