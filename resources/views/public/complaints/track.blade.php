<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Complaint — Barangay Digital Service Portal</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-50 via-slate-100 to-slate-200 text-slate-900">

<nav class="sticky top-0 z-50 bg-blue-950 text-white shadow-lg">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">
        <a href="{{ route('home') }}" class="text-xl font-bold">Barangay Digital Service Portal</a>
        <div class="flex items-center gap-6 text-sm font-medium">
            <a href="{{ route('projects.index') }}" class="transition hover:text-blue-200">Projects</a>
            <a href="{{ route('complaints.create') }}" class="transition hover:text-blue-200">Submit Complaint</a>
            <a href="{{ route('complaints.track') }}" class="text-blue-200">Track Complaint</a>
        </div>
    </div>
</nav>

<div class="mx-auto max-w-7xl px-6 pt-10">
    <div class="mb-6">
        <a href="{{ route('home') }}" class="group inline-flex items-center gap-2 rounded-2xl bg-white px-5 py-3 text-sm font-bold text-slate-700 shadow-sm ring-1 ring-slate-200 transition-all hover:bg-blue-50 hover:text-blue-700 hover:shadow-md active:scale-95">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="h-4 w-4 transition-transform group-hover:-translate-x-1"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" /></svg>
            BACK TO HOME
        </a>
    </div>

    <main class="grid items-start gap-10 pb-16 lg:grid-cols-2">
        <!-- LEFT SIDE FORM -->
        <div class="rounded-3xl bg-white/70 p-8 shadow-2xl ring-1 ring-slate-200 backdrop-blur-md">
            <h1 class="text-4xl font-extrabold tracking-tight text-blue-950">Track Your Complaint</h1>
            <p class="mt-3 mb-8 text-lg text-slate-600">Enter your tracking number below.</p>
            <!-- (Paste your tracking form here) -->
        </div>

        <!-- RIGHT SIDE ENVELOPE -->
        <div class="hidden lg:block">
            <!-- (Paste your bouncing envelope here) -->
        </div>
    </main>
</div>
</body>
</html>