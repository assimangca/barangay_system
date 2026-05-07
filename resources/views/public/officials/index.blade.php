<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Officials — Barangay Digital Service Portal</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-50 via-slate-100 to-slate-200 text-slate-900">

    <!-- Navbar -->
    <nav class="sticky top-0 z-50 bg-blue-950 text-white shadow-lg">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">
            <a href="{{ url('/') }}" class="text-xl font-bold">Barangay Digital Service Portal</a>
            <div class="flex items-center gap-6 text-sm font-medium">
                <a href="{{ route('projects.index') }}" class="hover:text-blue-200">Projects</a>
                <a href="{{ route('officials.index') }}" class="text-blue-200">Officials</a>
                 <a href="{{ route('complaints.create') }}" class="transition hover:text-blue-200">Submit Complaint</a>
                <a href="{{ route('complaints.track') }}" class="hidden transition hover:text-blue-200 sm:block">Track Complaint</a>
            </div>
        </div>
    </nav>

    <div class="mx-auto max-w-7xl px-6 py-16">
        
        <h2 class="text-4xl font-extrabold text-blue-950 mb-12 text-center underline decoration-blue-500 decoration-4">Our Barangay Officials</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach($officials as $official)
            <div class="bg-white rounded-[2rem] p-4 shadow-xl ring-1 ring-slate-200 transition hover:-translate-y-2">
                <div class="aspect-square overflow-hidden rounded-3xl bg-slate-100 mb-6 flex items-center justify-center">
                    @if($official->photo_path)
                        <img src="{{ asset('storage/' . $official->photo_path) }}" class="w-full h-full object-cover">
                    @else
                        <!-- Default Icon -->
                        <svg class="w-20 h-20 text-blue-100" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                    @endif
                </div>
                <div class="text-center pb-4">
                    <h4 class="text-xl font-bold text-blue-950">{{ $official->name }}</h4>
                    <p class="text-blue-600 font-semibold">{{ $official->position }}</p>
                    <p class="text-xs text-slate-400 mt-2 uppercase tracking-widest">{{ $official->committee }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>