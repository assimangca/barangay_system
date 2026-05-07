<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Barangay System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
<div class="w-full max-w-md bg-white rounded-2xl shadow-sm border border-gray-200 p-8">

    <div class="text-center mb-8">
        <h1 class="text-2xl font-bold text-blue-900">Barangay System</h1>
        <p class="text-gray-500 text-sm mt-1">Sign in to your account</p>
    </div>

    @if($errors->any())
    <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-4 text-sm">
        {{ $errors->first() }}
    </div>
    @endif

    @if(session('status'))
    <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-4 text-sm">
        {{ session('status') }}
    </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required autofocus
                   class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm
                          focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
            <input type="password" name="password" required
                   class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm
                          focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="flex items-center gap-2">
            <input type="checkbox" name="remember" id="remember" class="rounded">
            <label for="remember" class="text-sm text-gray-600">Remember me</label>
        </div>
        <button type="submit"
                class="w-full bg-blue-700 hover:bg-blue-800 text-white font-medium py-2.5 rounded-lg text-sm transition">
            Sign In
        </button>
        <div class="text-center mt-4">
    <a href="{{ route('register') }}" class="text-blue-600 hover:underline">
        Create Account
    </a>
</div>
    </form>

<div class="mt-4">
    <a href="{{ route('home') }}" 
       class="block w-full text-center bg-blue-700 hover:bg-blue-800 text-white font-medium py-2.5 rounded-lg text-sm transition">
        Back to public site
    </a>
</div>
</body>
</html>