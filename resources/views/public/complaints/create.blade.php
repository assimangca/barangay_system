<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Complaint — Barangay System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gradient-to-br from-blue-50 via-slate-100 to-slate-200 text-slate-900">

<!-- FLYING PAPER PLANES -->
<div class="pointer-events-none fixed inset-0 overflow-hidden">
    <div class="plane-wrapper plane-1">
        <div class="trail"></div>
        <div class="plane">
            <svg viewBox="0 0 24 24" fill="currentColor" class="h-8 w-8 text-blue-700">
                <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/>
            </svg>
        </div>
    </div>

    <div class="plane-wrapper plane-2">
        <div class="trail"></div>
        <div class="plane">
            <svg viewBox="0 0 24 24" fill="currentColor" class="h-10 w-10 text-blue-500">
                <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/>
            </svg>
        </div>
    </div>

    <div class="plane-wrapper plane-3">
        <div class="trail"></div>
        <div class="plane">
            <svg viewBox="0 0 24 24" fill="currentColor" class="h-7 w-7 text-blue-400">
                <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/>
            </svg>
        </div>
    </div>
</div>

<!-- NAVBAR -->
<nav class="sticky top-0 z-50 bg-blue-950 text-white shadow-lg">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">
        <a href="{{ route('home') }}" class="text-xl font-bold">
            Barangay System
        </a>

        <div class="flex items-center gap-6 text-sm font-medium">
            <a href="{{ route('projects.index') }}" class="transition hover:text-blue-200">
                Projects
            </a>

            <a href="{{ route('complaints.create') }}" class="text-blue-200">
                Submit Complaint
            </a>

            <a href="{{ route('complaints.track') }}" class="transition hover:text-blue-200">
                Track Complaint
            </a>
        </div>
    </div>
</nav>

<!-- MAIN -->
<div class="relative z-10 mx-auto max-w-3xl px-6 py-10">

    <div class="rounded-3xl bg-white/70 backdrop-blur-md p-8 shadow-2xl ring-1 ring-slate-200">

        <div class="mb-8">
            <p class="mb-4 inline-block rounded-full bg-blue-100 px-4 py-2 text-sm font-semibold text-blue-800">
                Community Transparency Portal
            </p>

            <h1 class="text-4xl font-extrabold tracking-tight text-blue-950">
                Submit a Complaint
            </h1>

            <p class="mt-3 text-lg leading-relaxed text-slate-600">
                Report issues, submit concerns, or provide suggestions
                for your barangay community.
            </p>
        </div>

        @if(session('success'))
        <div class="mb-8 rounded-2xl border border-green-200 bg-green-50/80 p-5 shadow-sm">
            <p class="font-semibold text-green-800">
                {{ session('success') }}
            </p>

            @if(session('tracking_number'))
            <div class="mt-4 rounded-xl bg-white/70 p-4">
                <p class="text-sm text-green-700">
                    Your tracking number:
                </p>

                <p class="mt-1 text-2xl font-bold tracking-wider text-green-800">
                    {{ session('tracking_number') }}
                </p>

                <p class="mt-2 text-xs text-green-600">
                    Please save this number to track your complaint.
                </p>
            </div>
            @endif
        </div>
        @endif

        <form method="POST"
              action="{{ route('complaints.store') }}"
              enctype="multipart/form-data"
              class="space-y-6">

            @csrf

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">
                        Your Name *
                    </label>

                    <input type="text"
                           name="name"
                           value="{{ old('name') }}"
                           required
                           class="w-full rounded-2xl border border-slate-300 bg-white/70 px-5 py-3 text-sm outline-none transition focus:border-blue-600 focus:ring-4 focus:ring-blue-100">

                    @error('name')
                        <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">
                        Type *
                    </label>

                    <select name="type"
                            required
                            class="w-full rounded-2xl border border-slate-300 bg-white/70 px-5 py-3 text-sm outline-none transition focus:border-blue-600 focus:ring-4 focus:ring-blue-100">
                        <option value="complaint" {{ old('type') === 'complaint' ? 'selected' : '' }}>Complaint</option>
                        <option value="report" {{ old('type') === 'report' ? 'selected' : '' }}>Report</option>
                        <option value="suggestion" {{ old('type') === 'suggestion' ? 'selected' : '' }}>Suggestion</option>
                    </select>
                </div>

                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">
                        Email <span class="text-slate-400">(optional)</span>
                    </label>

                    <input type="email"
                           name="email"
                           value="{{ old('email') }}"
                           class="w-full rounded-2xl border border-slate-300 bg-white/70 px-5 py-3 text-sm outline-none transition focus:border-blue-600 focus:ring-4 focus:ring-blue-100">
                </div>

                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">
                        Phone <span class="text-slate-400">(optional)</span>
                    </label>

                    <input type="text"
                           name="phone"
                           value="{{ old('phone') }}"
                           class="w-full rounded-2xl border border-slate-300 bg-white/70 px-5 py-3 text-sm outline-none transition focus:border-blue-600 focus:ring-4 focus:ring-blue-100">
                </div>

            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-slate-700">
                    Subject *
                </label>

                <input type="text"
                       name="subject"
                       value="{{ old('subject') }}"
                       required
                       placeholder="Brief description of your complaint..."
                       class="w-full rounded-2xl border border-slate-300 bg-white/70 px-5 py-3 text-sm outline-none transition focus:border-blue-600 focus:ring-4 focus:ring-blue-100">

                @error('subject')
                    <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-slate-700">
                    Related Project <span class="text-slate-400">(optional)</span>
                </label>

                <select name="project_id"
                        class="w-full rounded-2xl border border-slate-300 bg-white/70 px-5 py-3 text-sm outline-none transition focus:border-blue-600 focus:ring-4 focus:ring-blue-100">
                    <option value="">Not related to a specific project</option>

                    @foreach($projects as $project)
                    <option value="{{ $project->id }}"
                        {{ old('project_id') == $project->id ? 'selected' : '' }}>
                        {{ $project->title }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-slate-700">
                    Description *
                </label>

                <textarea name="description"
                          rows="6"
                          required
                          placeholder="Provide full details of your complaint or report..."
                          class="w-full rounded-2xl border border-slate-300 bg-white/70 px-5 py-4 text-sm outline-none transition focus:border-blue-600 focus:ring-4 focus:ring-blue-100">{{ old('description') }}</textarea>

                @error('description')
                    <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-slate-700">
                    Attachment <span class="text-slate-400">(optional)</span>
                </label>

                <input type="file"
                       name="attachment"
                       accept=".jpg,.jpeg,.png,.pdf"
                       class="w-full rounded-2xl border border-slate-300 bg-white/70 px-5 py-3 text-sm">

                <p class="mt-2 text-xs text-slate-400">
                    JPG, PNG or PDF. Max 2MB.
                </p>
            </div>

            <button type="submit"
                    class="w-full rounded-full bg-blue-700 py-4 text-sm font-semibold text-white shadow-xl transition duration-300 hover:-translate-y-1 hover:bg-blue-800 hover:shadow-2xl active:scale-95">
                Submit Complaint
            </button>

        </form>

    </div>

</div>

<style>
.plane-wrapper {
    position: absolute;
    z-index: 0;
}

.plane {
    position: relative;
    opacity: 0.18;
}

.trail {
    position: absolute;
    top: 50%;
    left: -140px;
    width: 120px;
    height: 2px;
    transform: translateY(-50%);
    background: linear-gradient(
        to left,
        rgba(59,130,246,0),
        rgba(59,130,246,0.5),
        rgba(59,130,246,0)
    );
    animation: trailFade 1.5s linear infinite;
}

.plane-1 {
    top: 15%;
    left: -10%;
    animation: fly1 18s ease-in-out infinite;
}

.plane-2 {
    top: 50%;
    left: -15%;
    animation: fly2 24s ease-in-out infinite;
}

.plane-3 {
    bottom: 15%;
    left: -20%;
    animation: fly3 20s ease-in-out infinite;
}

@keyframes fly1 {
    0% { transform: translate(0,0) rotate(8deg); }
    25% { transform: translate(35vw,-40px) rotate(-6deg); }
    50% { transform: translate(65vw,30px) rotate(8deg); }
    75% { transform: translate(90vw,-20px) rotate(-5deg); }
    100% { transform: translate(120vw,10px) rotate(6deg); }
}

@keyframes fly2 {
    0% { transform: translate(0,0) rotate(-10deg); }
    30% { transform: translate(30vw,50px) rotate(8deg); }
    60% { transform: translate(75vw,-40px) rotate(-6deg); }
    100% { transform: translate(120vw,20px) rotate(10deg); }
}

@keyframes fly3 {
    0% { transform: translate(0,0) rotate(5deg); }
    20% { transform: translate(20vw,-25px) rotate(-8deg); }
    50% { transform: translate(60vw,35px) rotate(6deg); }
    80% { transform: translate(95vw,-20px) rotate(-5deg); }
    100% { transform: translate(120vw,15px) rotate(8deg); }
}

@keyframes trailFade {
    0% {
        opacity: 0;
        transform: translateY(-50%) scaleX(0.5);
    }

    50% {
        opacity: 1;
        transform: translateY(-50%) scaleX(1);
    }

    100% {
        opacity: 0;
        transform: translateY(-50%) scaleX(0.2);
    }
}
</style>

</body>
</html>