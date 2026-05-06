<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen">

<nav class="bg-blue-900 text-white px-6 py-4 flex items-center justify-between">
    <h1 class="text-lg font-bold">Barangay System</h1>
    <div class="flex gap-4 text-sm">
        <a href="{{ route('projects.index') }}" class="hover:underline">Projects</a>
        <a href="{{ route('complaints.create') }}" class="hover:underline">Submit Complaint</a>
        <a href="{{ route('complaints.track') }}" class="hover:underline">Track Complaint</a>
        <a href="{{ route('login') }}" class="bg-white text-blue-900 px-3 py-1 rounded font-medium hover:bg-gray-100">Admin Login</a>
    </div>
</nav>

<div class="max-w-4xl mx-auto px-6 py-16 text-center">
    <h2 class="text-4xl font-bold text-blue-900 mb-4">Welcome to Our Barangay</h2>
    <p class="text-gray-600 text-lg mb-8">Transparent governance for our community.</p>
    <div class="flex gap-4 justify-center">
        <a href="{{ route('projects.index') }}"
           class="bg-blue-700 text-white px-6 py-3 rounded-lg font-medium hover:bg-blue-800">
            View Projects
        </a>
        <a href="{{ route('complaints.create') }}"
           class="bg-white border border-blue-700 text-blue-700 px-6 py-3 rounded-lg font-medium hover:bg-blue-50">
            Submit a Complaint
        </a>
    </div>
</div>

</body>
</html>ph