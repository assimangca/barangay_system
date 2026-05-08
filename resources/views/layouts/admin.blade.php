<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') — Barangay System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans">

<div class="flex h-screen overflow-hidden">

    {{-- Sidebar --}}
    <aside class="w-64 bg-blue-900 text-white flex flex-col flex-shrink-0">

        {{-- Logo --}}
        <div class="px-6 py-5 border-b border-blue-800">
            <h1 class="text-lg font-bold leading-tight">Barangay System</h1>
            <p class="text-blue-300 text-xs mt-1">Admin Panel</p>
        </div>

        {{-- User Info --}}
        <div class="px-6 py-4 border-b border-blue-800">
            <p class="text-sm font-medium">{{ auth()->user()->name }}</p>
            <p class="text-blue-300 text-xs">{{ auth()->user()->display_role }}</p>
        </div>

        {{-- Navigation --}}
        <nav class="flex-1 px-4 py-4 space-y-1 overflow-y-auto">

            {{-- Dashboard --}}
            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm
                      {{ request()->routeIs('admin.dashboard') ? 'bg-blue-700 text-white' : 'text-blue-100 hover:bg-blue-800' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                Dashboard
            </a>

            {{-- Projects --}}
            <a href="{{ route('admin.projects.index') }}"
               class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm
                      {{ request()->routeIs('admin.projects.*') ? 'bg-blue-700 text-white' : 'text-blue-100 hover:bg-blue-800' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                </svg>
                Projects
           <a href="{{ route('admin.officials.index') }}" 
                class="flex items-center px-4 py-3 transition-colors duration-200 {{ request()->routeIs('admin.officials.*') ? 'bg-blue-600 text-white rounded-lg shadow-md' : 'text-blue-100 hover:bg-blue-800/50' }}">
                <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.officials.*') ? 'text-white' : 'text-blue-300' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                    <span class="font-medium">Officials</span>
                </a>
            {{-- Budget --}}
            @canany(['view budgets', 'create budgets'])
            <a href="{{ route('admin.budgets.index') }}"
               class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm
                      {{ request()->routeIs('admin.budgets.*') ? 'bg-blue-700 text-white' : 'text-blue-100 hover:bg-blue-800' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Budget
            </a>
            @endcanany

            {{-- Expenses --}}
            @canany(['view expenses', 'create expenses'])
            <a href="{{ route('admin.expenses.index') }}"
               class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm
                      {{ request()->routeIs('admin.expenses.*') ? 'bg-blue-700 text-white' : 'text-blue-100 hover:bg-blue-800' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2z"/>
                </svg>
                Expenses
            </a>
            @endcanany

            {{-- Complaints --}}
            <a href="{{ route('admin.complaints.index') }}"
               class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm
                      {{ request()->routeIs('admin.complaints.*') ? 'bg-blue-700 text-white' : 'text-blue-100 hover:bg-blue-800' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                </svg>
                Complaints
            </a>

            {{-- ✅ Donations --}}
            <a href="{{ route('admin.donations.index') }}"
               class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm
                      {{ request()->routeIs('admin.donations.*') ? 'bg-blue-700 text-white' : 'text-blue-100 hover:bg-blue-800' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                </svg>
                Donations
            </a>

            {{-- Reports --}}
            @can('view reports')
            <a href="{{ route('admin.reports.index') }}"
               class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm
                      {{ request()->routeIs('admin.reports.*') ? 'bg-blue-700 text-white' : 'text-blue-100 hover:bg-blue-800' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                Reports
            </a>
            @endcan

        </nav>

        {{-- Logout --}}
        <div class="px-4 py-4 border-t border-blue-800">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="flex items-center gap-3 w-full px-3 py-2 rounded-lg text-sm text-blue-100 hover:bg-blue-800">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    Logout
                </button>
            </form>
        </div>

    </aside>

    {{-- Main Content --}}
    <div class="flex-1 flex flex-col overflow-hidden">

        {{-- Top Bar --}}
        <header class="bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between">
            <h2 class="text-lg font-semibold text-gray-800">@yield('page-title', 'Dashboard')</h2>
            <div class="flex items-center gap-3">
                <a href="{{ route('home') }}" target="_blank"
                   class="text-sm text-blue-600 hover:underline">View Public Site</a>
                <span class="text-gray-300">|</span>
                <span class="text-sm text-gray-500">{{ now()->format('F d, Y') }}</span>
            </div>
        </header>

        {{-- Flash Messages --}}
        <div class="px-6 pt-4">
            @if(session('success'))
                <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg mb-4 text-sm">
                    ✅ {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg mb-4 text-sm">
                    ❌ {{ session('error') }}
                </div>
            @endif
            @if(session('warning'))
                <div class="bg-yellow-50 border border-yellow-200 text-yellow-800 px-4 py-3 rounded-lg mb-4 text-sm">
                    ⚠️ {{ session('warning') }}
                </div>
            @endif
        </div>

        {{-- Page Content --}}
        <main class="flex-1 overflow-y-auto px-6 py-4">
            @yield('content')
        </main>

    </div>
</div>

</body>
</html>