<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Complaint — Barangay System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen overflow-x-hidden bg-[#071326] text-slate-900">

<!-- BLUEPRINT BACKGROUND -->
<div class="fixed inset-0 z-0 overflow-hidden pointer-events-none">

    <!-- SMALL GRID -->
    <div class="absolute inset-0 opacity-20"
         style="
            background-image:
                linear-gradient(to right, rgba(255,255,255,0.05) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(255,255,255,0.05) 1px, transparent 1px);
            background-size: 18px 18px;
         ">
    </div>

    <!-- LARGE GRID -->
    <div class="absolute inset-0 opacity-15"
         style="
            background-image:
                linear-gradient(to right, rgba(255,255,255,0.10) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(255,255,255,0.10) 1px, transparent 1px);
            background-size: 90px 90px;
         ">
    </div>

    <!-- BLUE GLOW -->
    <div class="absolute left-[-150px] top-[120px] h-[500px] w-[500px] rounded-full bg-blue-700/20 blur-3xl"></div>

    <div class="absolute bottom-[-200px] right-[-100px] h-[600px] w-[600px] rounded-full bg-blue-500/10 blur-3xl"></div>

</div>

<!-- FLYING PAPER PLANES -->
<div class="pointer-events-none fixed inset-0 overflow-hidden">

    <div class="plane-wrapper plane-1">
        <div class="trail"></div>

        <div class="plane">
            <div class="plane-glow"></div>

            <svg viewBox="0 0 24 24"
                 fill="currentColor"
                 class="relative z-10 h-12 w-12 text-blue-400 drop-shadow-[0_8px_20px_rgba(59,130,246,0.8)]">

                <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/>
            </svg>
        </div>
    </div>

    <div class="plane-wrapper plane-2">
        <div class="trail"></div>

        <div class="plane">
            <div class="plane-glow"></div>

            <svg viewBox="0 0 24 24"
                 fill="currentColor"
                 class="relative z-10 h-14 w-14 text-blue-300 drop-shadow-[0_8px_24px_rgba(96,165,250,0.9)]">

                <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/>
            </svg>
        </div>
    </div>

    <div class="plane-wrapper plane-3">
        <div class="trail"></div>

        <div class="plane">
            <div class="plane-glow"></div>

            <svg viewBox="0 0 24 24"
                 fill="currentColor"
                 class="relative z-10 h-11 w-11 text-sky-300 drop-shadow-[0_8px_22px_rgba(125,211,252,0.9)]">

                <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/>
            </svg>
        </div>
    </div>

</div>

<!-- NAVBAR -->
<nav class="sticky top-0 z-50 bg-blue-950 text-white shadow-lg">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">

        <!-- LOGO -->
        <a href="{{ route('home') }}"
           class="flex items-center gap-3 group">

            <!-- LOGO ICON -->
            <div class="relative flex h-14 w-14 items-center justify-center">

                <!-- OUTER GLOW -->
                <div class="absolute inset-0 rounded-full bg-blue-400/20 blur-md transition duration-500 group-hover:bg-blue-300/30"></div>

                <!-- MAIN CIRCLE -->
                <div class="relative flex h-14 w-14 items-center justify-center rounded-full border-4 border-blue-200 bg-gradient-to-br from-blue-400 via-sky-300 to-blue-700 shadow-[0_10px_25px_rgba(37,99,235,0.45)]">

                    <!-- INNER RING -->
                    <div class="absolute inset-[4px] rounded-full border-2 border-white/70"></div>

                    <!-- SHIELD -->
                    <div class="relative z-10 flex h-7 w-6 items-center justify-center rounded-b-xl rounded-t-md border border-white/60 bg-white/90 shadow-inner">

                        <!-- SUN -->
                        <div class="absolute top-[3px] h-2 w-2 rounded-full bg-yellow-400 shadow-sm"></div>

                        <!-- HOUSE -->
                        <div class="absolute bottom-[5px] h-2 w-3 rounded-sm bg-blue-700"></div>

                    </div>

                    <!-- SMALL STARS -->
                    <div class="absolute left-[6px] top-1/2 h-1.5 w-1.5 -translate-y-1/2 rounded-full bg-yellow-300"></div>

                    <div class="absolute right-[6px] top-1/2 h-1.5 w-1.5 -translate-y-1/2 rounded-full bg-yellow-300"></div>

                </div>

            </div>

            <!-- TEXT -->
            <div class="leading-tight">

                <h1 class="text-xl font-extrabold tracking-wide text-white">
                    Barangay System
                </h1>

                <p class="text-[11px] uppercase tracking-[0.25em] text-blue-200">
                    Republic of the Philippines
                </p>

            </div>

        </a>

    </div>
</nav>

<!-- SIDEBAR -->
<aside class="fixed left-0 top-[88px] z-40 hidden h-[calc(100vh-88px)] w-64 border-r border-blue-400/10 bg-blue-950/90 px-5 py-8 text-white shadow-2xl backdrop-blur-md md:block">

    

    <div class="flex flex-col gap-4 text-sm font-semibold">

        <a href="{{ route('projects.index') }}"
           class="rounded-2xl bg-blue-700 px-5 py-4 text-center text-white shadow-lg transition duration-300 hover:-translate-y-1 hover:bg-blue-800 hover:shadow-xl active:scale-95">
            Projects
        </a>

        <a href="{{ route('complaints.create') }}"
           class="rounded-2xl border border-blue-400 bg-white/10 px-5 py-4 text-center text-blue-100 shadow transition duration-300 hover:-translate-y-1 hover:bg-white/20 hover:shadow-lg active:scale-95">
            Submit Complaint
        </a>

        <a href="{{ route('complaints.track') }}"
           class="rounded-2xl border border-blue-400 bg-white/10 px-5 py-4 text-center text-white shadow transition duration-300 hover:-translate-y-1 hover:bg-white/20 hover:shadow-lg active:scale-95">
            Track Complaint
        </a>

    </div>

</aside>

<!-- MOBILE SIDEBAR BUTTONS -->
<div class="relative z-10 mx-auto flex max-w-3xl gap-3 overflow-x-auto px-6 pt-6 md:hidden">

    <a href="{{ route('projects.index') }}"
       class="min-w-[130px] rounded-full bg-blue-700 px-5 py-3 text-center text-sm font-semibold text-white shadow-lg transition duration-300 hover:bg-blue-800">
        Projects
    </a>

    <a href="{{ route('complaints.create') }}"
       class="min-w-[170px] rounded-full border border-blue-400 bg-white/10 px-5 py-3 text-center text-sm font-semibold text-white shadow">
        Submit Complaint
    </a>

    <a href="{{ route('complaints.track') }}"
       class="min-w-[160px] rounded-full border border-blue-400 bg-white/10 px-5 py-3 text-center text-sm font-semibold text-white shadow">
        Track Complaint
    </a>

</div>

<!-- MAIN -->
<div class="relative z-10 mx-auto max-w-3xl px-6 py-10 md:ml-[19rem] md:mr-auto">

    <div class="rounded-3xl bg-white/75 backdrop-blur-md p-8 shadow-2xl ring-1 ring-white/10">

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
    opacity: 0.95;
    animation: floatPlane 3s ease-in-out infinite;
}

.plane-glow{
    position:absolute;
    inset:-12px;
    border-radius:9999px;
    background:radial-gradient(
        circle,
        rgba(59,130,246,0.35) 0%,
        rgba(59,130,246,0.12) 45%,
        transparent 75%
    );
    filter:blur(12px);
}

.trail {
    position: absolute;
    top: 50%;
    left: -180px;
    width: 170px;
    height: 4px;
    transform: translateY(-50%);
    border-radius:999px;

    background: linear-gradient(
        to left,
        rgba(255,255,255,0),
        rgba(59,130,246,0.95),
        rgba(147,197,253,0.75),
        rgba(255,255,255,0)
    );

    box-shadow:
        0 0 18px rgba(59,130,246,0.6),
        0 0 35px rgba(147,197,253,0.45);

    animation: trailFade 1.6s linear infinite;
}

.plane-1 {
    top: 12%;
    left: -10%;
    animation: fly1 16s linear infinite;
}

.plane-2 {
    top: 48%;
    left: -15%;
    animation: fly2 20s linear infinite;
}

.plane-3 {
    bottom: 10%;
    left: -20%;
    animation: fly3 18s linear infinite;
}

@keyframes floatPlane{
    0%,100%{
        transform:translateY(0px);
    }

    50%{
        transform:translateY(-6px);
    }
}

@keyframes fly1 {
    0% { transform: translate(0,0) rotate(8deg) scale(1); }
    25% { transform: translate(35vw,-40px) rotate(-6deg) scale(1.05); }
    50% { transform: translate(65vw,30px) rotate(8deg) scale(1.08); }
    75% { transform: translate(90vw,-20px) rotate(-5deg) scale(1.04); }
    100% { transform: translate(120vw,10px) rotate(6deg) scale(1); }
}

@keyframes fly2 {
    0% { transform: translate(0,0) rotate(-10deg) scale(1); }
    30% { transform: translate(30vw,50px) rotate(8deg) scale(1.08); }
    60% { transform: translate(75vw,-40px) rotate(-6deg) scale(1.12); }
    100% { transform: translate(120vw,20px) rotate(10deg) scale(1); }
}

@keyframes fly3 {
    0% { transform: translate(0,0) rotate(5deg) scale(1); }
    20% { transform: translate(20vw,-25px) rotate(-8deg) scale(1.04); }
    50% { transform: translate(60vw,35px) rotate(6deg) scale(1.1); }
    80% { transform: translate(95vw,-20px) rotate(-5deg) scale(1.05); }
    100% { transform: translate(120vw,15px) rotate(8deg) scale(1); }
}

@keyframes trailFade {
    0% {
        opacity: 0;
        transform: translateY(-50%) scaleX(0.4);
    }

    50% {
        opacity: 1;
        transform: translateY(-50%) scaleX(1);
    }

    100% {
        opacity: 0;
        transform: translateY(-50%) scaleX(0.15);
    }
}

</style>

</body>
</html>