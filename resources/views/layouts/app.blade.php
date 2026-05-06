<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100">

    <nav class="bg-white border-b border-gray-100 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">

                <div class="flex items-center gap-6">
                    <a href="{{ route('home') }}" class="font-bold text-gray-800">
                        {{ config('app.name', 'Laravel') }}
                    </a>

                    @auth
                        @if(auth()->user()->hasAnyRole(['captain', 'treasurer', 'secretary']))
                            <a href="{{ route('admin.dashboard') }}" class="text-gray-700 hover:text-blue-600">
                                Dashboard
                            </a>

                            <a href="{{ route('admin.password.edit') }}" class="text-gray-700 hover:text-blue-600">
                                Change Password
                            </a>
                        @endif
                    @endauth
                </div>

                <div class="flex items-center gap-4">
                    @auth
                        <span class="text-sm text-gray-600">
                            {{ auth()->user()->name }}
                        </span>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit" class="text-red-600 hover:text-red-800">
                                Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600">
                            Login
                        </a>

                        <a href="{{ route('register') }}" class="text-gray-700 hover:text-blue-600">
                            Register
                        </a>
                    @endauth
                </div>

            </div>
        </div>
    </nav>

    @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

    <main>
        @isset($slot)
            {{ $slot }}
        @else
            @yield('content')
        @endisset
    </main>

</div>
</body>
</html>