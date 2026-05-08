<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen overflow-x-hidden bg-[#071326] text-white antialiased">

    <!-- BLUEPRINT BACKGROUND -->
    <div class="fixed inset-0 z-0 overflow-hidden pointer-events-none">
        <div class="absolute inset-0 opacity-20" style="background-image:linear-gradient(to right, rgba(255,255,255,0.05) 1px, transparent 1px),linear-gradient(to bottom, rgba(255,255,255,0.05) 1px, transparent 1px);background-size: 18px 18px;"></div>
        <div class="absolute inset-0 opacity-15" style="background-image:linear-gradient(to right, rgba(255,255,255,0.10) 1px, transparent 1px),linear-gradient(to bottom, rgba(255,255,255,0.10) 1px, transparent 1px);background-size: 90px 90px;"></div>
        <div class="absolute left-[-150px] top-[120px] h-[500px] w-[500px] rounded-full bg-blue-700/20 blur-3xl"></div>
        <div class="absolute bottom-[-200px] right-[-100px] h-[600px] w-[600px] rounded-full bg-blue-500/10 blur-3xl"></div>
    </div>

    <!-- NAVBAR (MATCHING PHOTO 2) -->
    <nav class="sticky top-0 z-[100] bg-blue-950 text-white shadow-lg border-b border-white/5">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <!-- HIGH QUALITY LOGO -->
                <div class="relative flex h-14 w-14 items-center justify-center">
                    <div class="absolute inset-0 rounded-full bg-blue-400/20 blur-md transition duration-500 group-hover:bg-blue-300/30"></div>
                    <div class="relative flex h-14 w-14 items-center justify-center rounded-full border-4 border-blue-200 bg-gradient-to-br from-blue-400 via-sky-300 to-blue-700 shadow-lg">
                        <div class="absolute inset-[4px] rounded-full border-2 border-white/70"></div>
                        <div class="relative z-10 flex h-7 w-6 items-center justify-center rounded-b-xl rounded-t-md border border-white/60 bg-white/90 shadow-inner">
                            <div class="absolute top-[3px] h-2 w-2 rounded-full bg-yellow-400 shadow-sm"></div>
                            <div class="absolute bottom-[5px] h-2 w-3 rounded-sm bg-blue-700"></div>
                        </div>
                        <div class="absolute left-[6px] top-1/2 h-1.5 w-1.5 -translate-y-1/2 rounded-full bg-yellow-300"></div>
                        <div class="absolute right-[6px] top-1/2 h-1.5 w-1.5 -translate-y-1/2 rounded-full bg-yellow-300"></div>
                    </div>
                </div>
                <div class="leading-tight">
                    <h1 class="text-xl font-extrabold tracking-wide text-white">Barangay System</h1>
                    <p class="text-[11px] uppercase tracking-[0.25em] text-blue-200">Republic of the Philippines</p>
                </div>
            </a>
        </div>
    </nav>

    <!-- SIDEBAR -->
    <aside class="fixed left-0 top-[88px] z-40 hidden h-[calc(100vh-88px)] w-64 border-r border-blue-400/10 bg-blue-950/90 px-5 py-8 text-white backdrop-blur-md md:block">
        <div class="flex flex-col gap-4 text-sm font-semibold">
            <a href="{{ route('projects.index') }}" class="sidebar-link {{ request()->routeIs('projects.*') ? 'active' : '' }}">Projects</a>
            <a href="{{ route('complaints.create') }}" class="sidebar-link {{ request()->routeIs('complaints.create') ? 'active' : '' }}">Submit Complaint</a>
            <a href="{{ route('complaints.track') }}" class="sidebar-link {{ request()->routeIs('complaints.track') ? 'active' : '' }}">Track Complaint</a>
            <a href="{{ route('officials.index') }}" class="sidebar-link {{ request()->routeIs('officials.*') ? 'active' : '' }}">Barangay Officials</a>
            <a href="{{ route('donations.create') }}" class="sidebar-link {{ request()->routeIs('donations.create') ? 'active' : '' }}">Donate Now</a>
            <a href="{{ route('donations.track') }}" class="sidebar-link {{ request()->routeIs('donations.track') ? 'active' : '' }}">Track Donation</a>
        </div>
    </aside>

    <!-- MAIN CONTENT (PUSHED BY SIDEBAR) -->
    <main class="relative z-10 md:ml-64 px-8 py-10 min-h-[calc(100vh-88px)] flex flex-col items-center">
        @yield('content')
    </main>

    <style>
        .sidebar-link { display: block; padding: 1rem; border-radius: 1rem; text-align: center; border: 1px solid rgba(255, 255, 255, 0.08); background: rgba(255, 255, 255, 0.03); color: #cbd5e1; transition: all 0.3s; }
        .sidebar-link:hover { background: rgba(255, 255, 255, 0.1); transform: translateY(-2px); color: white; }
        .sidebar-link.active { background: #2563eb; color: white; border-color: #3b82f6; box-shadow: 0 10px 15px -3px rgba(37, 99, 235, 0.3); }
    </style>

</body>
</html>