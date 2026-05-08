<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Complaint — Barangay System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen overflow-x-hidden bg-[#071326] text-white">

    <div class="fixed inset-0 z-0 overflow-hidden pointer-events-none">
        <div class="absolute inset-0 opacity-20" style="background-image:linear-gradient(to right, rgba(255,255,255,0.05) 1px, transparent 1px),linear-gradient(to bottom, rgba(255,255,255,0.05) 1px, transparent 1px);background-size: 18px 18px;"></div>
        <div class="absolute inset-0 opacity-15" style="background-image:linear-gradient(to right, rgba(255,255,255,0.10) 1px, transparent 1px),linear-gradient(to bottom, rgba(255,255,255,0.10) 1px, transparent 1px);background-size: 90px 90px;"></div>
        <div class="absolute left-[-150px] top-[120px] h-[500px] w-[500px] rounded-full bg-blue-700/20 blur-3xl"></div>
        <div class="absolute bottom-[-200px] right-[-100px] h-[600px] w-[600px] rounded-full bg-blue-500/10 blur-3xl"></div>
    </div>

    <div class="pointer-events-none fixed inset-0 overflow-hidden">
        <div class="plane-wrapper plane-1">
            <div class="trail"></div>
            <div class="plane">
                <div class="plane-glow"></div>
                <svg viewBox="0 0 24 24" fill="currentColor" class="relative z-10 h-12 w-12 text-blue-400 drop-shadow-[0_8px_20px_rgba(59,130,246,0.8)]">
                    <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z" />
                </svg>
            </div>
        </div>
        <div class="plane-wrapper plane-2">
            <div class="trail"></div>
            <div class="plane">
                <div class="plane-glow"></div>
                <svg viewBox="0 0 24 24" fill="currentColor" class="relative z-10 h-14 w-14 text-blue-300 drop-shadow-[0_8px_24px_rgba(96,165,250,0.9)]">
                    <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z" />
                </svg>
            </div>
        </div>
        <div class="plane-wrapper plane-3">
            <div class="trail"></div>
            <div class="plane">
                <div class="plane-glow"></div>
                <svg viewBox="0 0 24 24" fill="currentColor" class="relative z-10 h-11 w-11 text-sky-300 drop-shadow-[0_8px_22px_rgba(125,211,252,0.9)]">
                    <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z" />
                </svg>
            </div>
        </div>
    </div>

    <nav class="sticky top-0 z-50 bg-blue-950 text-white shadow-lg">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <div class="relative flex h-14 w-14 items-center justify-center">
                    <div class="absolute inset-0 rounded-full bg-blue-400/20 blur-md transition duration-500 group-hover:bg-blue-300/30"></div>
                    <div class="relative flex h-14 w-14 items-center justify-center rounded-full border-4 border-blue-200 bg-gradient-to-br from-blue-400 via-sky-300 to-blue-700 shadow-[0_10px_25px_rgba(37,99,235,0.45)]">
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

    <!-- STANDARDIZED SIDEBAR -->
<aside class="fixed left-0 top-[88px] z-40 hidden h-[calc(100vh-88px)] w-64 border-r border-blue-400/10 bg-blue-950/90 px-5 py-8 text-white shadow-2xl backdrop-blur-md md:block">
    <div class="flex flex-col gap-4 text-sm font-semibold">
        
        <!-- Projects -->
        <a href="{{ route('projects.index') }}"
            class="rounded-2xl px-5 py-4 text-center shadow transition duration-300 hover:-translate-y-1 hover:shadow-lg active:scale-95
            {{ request()->routeIs('projects.*') ? 'bg-blue-700 text-white hover:bg-blue-800 shadow-blue-500/20' : 'border border-blue-400 bg-white/10 text-white hover:bg-white/20' }}">
            Projects
        </a>

        <!-- Submit Complaint -->
        <a href="{{ route('complaints.create') }}"
            class="rounded-2xl px-5 py-4 text-center shadow transition duration-300 hover:-translate-y-1 hover:shadow-lg active:scale-95
            {{ request()->routeIs('complaints.create') ? 'bg-blue-700 text-white hover:bg-blue-800 shadow-blue-500/20' : 'border border-blue-400 bg-white/10 text-white hover:bg-white/20' }}">
            Submit Complaint
        </a>

        <!-- Track Complaint -->
        <a href="{{ route('complaints.track') }}"
            class="rounded-2xl px-5 py-4 text-center shadow transition duration-300 hover:-translate-y-1 hover:shadow-lg active:scale-95
            {{ request()->routeIs('complaints.track') ? 'bg-blue-700 text-white hover:bg-blue-800 shadow-blue-500/20' : 'border border-blue-400 bg-white/10 text-white hover:bg-white/20' }}">
            Track Complaint
        </a>

        <!-- Barangay Officials -->
        <a href="{{ route('officials.index') }}"
            class="rounded-2xl px-5 py-4 text-center shadow transition duration-300 hover:-translate-y-1 hover:shadow-lg active:scale-95
            {{ request()->routeIs('officials.*') ? 'bg-blue-700 text-white hover:bg-blue-800 shadow-blue-500/20' : 'border border-blue-400 bg-white/10 text-white hover:bg-white/20' }}">
            Barangay Officials
        </a>

        <!-- Donate Now -->
        <a href="{{ route('donations.create') }}"
            class="rounded-2xl px-5 py-4 text-center shadow transition duration-300 hover:-translate-y-1 hover:shadow-lg active:scale-95
            {{ request()->routeIs('donations.create') ? 'bg-blue-700 text-white hover:bg-blue-800 shadow-blue-500/20' : 'border border-blue-400 bg-white/10 text-white hover:bg-white/20' }}">
            Donate Now
        </a>

        <!-- Track Donation -->
        <a href="{{ route('donations.track') }}"
            class="rounded-2xl px-5 py-4 text-center shadow transition duration-300 hover:-translate-y-1 hover:shadow-lg active:scale-95
            {{ request()->routeIs('donations.track') ? 'bg-blue-700 text-white hover:bg-blue-800 shadow-blue-500/20' : 'border border-blue-400 bg-white/10 text-white hover:bg-white/20' }}">
            Track Donation
        </a>

    </div>
</aside>

    <div class="relative z-10 mx-auto flex max-w-7xl gap-3 overflow-x-auto px-6 pt-6 md:hidden">
        <a href="{{ route('projects.index') }}" class="min-w-[130px] rounded-full bg-blue-700 px-5 py-3 text-center text-sm font-semibold text-white shadow-lg transition duration-300 hover:bg-blue-800">Projects</a>
        
        <a href="{{ route('complaints.create') }}" class="min-w-[170px] rounded-full border border-blue-400 bg-white/10 px-5 py-3 text-center text-sm font-semibold text-white shadow">Submit Complaint</a>
        <a href="{{ route('complaints.track') }}" class="min-w-[160px] rounded-full border border-blue-400 bg-white/10 px-5 py-3 text-center text-sm font-semibold text-white shadow">Track Complaint</a>
        <a href="{{ route('donations.create') }}" class="min-w-[140px] rounded-full border border-blue-400 bg-white/10 px-5 py-3 text-center text-sm font-semibold text-white shadow">Donate Now</a>
        <a href="{{ route('donations.track') }}" class="min-w-[160px] rounded-full border border-blue-400 bg-white/10 px-5 py-3 text-center text-sm font-semibold text-white shadow">Track Donation</a>
    </div>

    <div class="relative z-10 md:ml-[19rem] flex justify-center px-8 py-12">
        <div class="w-full max-w-3xl">

            <div class="rounded-3xl bg-white/5 backdrop-blur-md p-8 shadow-2xl border border-white/10">

                <div class="mb-8">
                    <p class="mb-4 inline-block rounded-full bg-blue-100/20 px-4 py-2 text-sm font-semibold text-blue-100">
                        🛡️ Community Transparency Portal
                    </p>
                    <h1 class="text-4xl font-extrabold tracking-tight text-white">Submit a Complaint</h1>
                    <p class="mt-3 text-lg leading-relaxed text-blue-200">
                        Report issues, submit concerns, or provide suggestions for your barangay community.
                    </p>
                </div>

                @if(session('success'))
                <div class="mb-8 rounded-2xl border border-green-400/30 bg-green-500/10 p-5">
                    <p class="font-semibold text-green-300">{{ session('success') }}</p>
                    @if(session('tracking_number'))
                    <div class="mt-4 rounded-xl bg-white/5 p-4">
                        <p class="text-sm text-green-300">Your tracking number:</p>
                        <p class="mt-1 text-2xl font-bold tracking-wider text-white">{{ session('tracking_number') }}</p>
                        <p class="mt-2 text-xs text-green-400">Please save this number to track your complaint.</p>
                    </div>
                    @endif
                </div>
                @endif

                <form method="POST" action="{{ route('complaints.store') }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <div>
                            <label class="mb-2 block text-sm font-semibold text-blue-100">Your Name *</label>
                            <input type="text" name="name" value="{{ old('name') }}" required
                                class="w-full rounded-2xl border border-white/20 bg-white/10 px-5 py-3 text-sm text-white placeholder-blue-300 outline-none transition focus:border-blue-400 focus:ring-4 focus:ring-blue-400/20">
                            @error('name')<p class="mt-2 text-xs text-red-400">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-semibold text-blue-100">Type *</label>
                            <select name="type" required
                                class="w-full rounded-2xl border border-white/20 bg-white/10 px-5 py-3 text-sm text-white outline-none transition focus:border-blue-400 focus:ring-4 focus:ring-blue-400/20">
                                <option value="complaint" class="text-slate-900" {{ old('type') === 'complaint' ? 'selected' : '' }}>Complaint</option>
                                <option value="report" class="text-slate-900" {{ old('type') === 'report' ? 'selected' : '' }}>Report</option>
                                <option value="suggestion" class="text-slate-900" {{ old('type') === 'suggestion' ? 'selected' : '' }}>Suggestion</option>
                            </select>
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-semibold text-blue-100">Email <span class="text-blue-400 font-normal">(optional)</span></label>
                            <input type="email" name="email" value="{{ old('email') }}"
                                class="w-full rounded-2xl border border-white/20 bg-white/10 px-5 py-3 text-sm text-white placeholder-blue-300 outline-none transition focus:border-blue-400 focus:ring-4 focus:ring-blue-400/20">
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-semibold text-blue-100">Phone <span class="text-blue-400 font-normal">(optional)</span></label>
                            <input type="text" name="phone" value="{{ old('phone') }}"
                                class="w-full rounded-2xl border border-white/20 bg-white/10 px-5 py-3 text-sm text-white placeholder-blue-300 outline-none transition focus:border-blue-400 focus:ring-4 focus:ring-blue-400/20">
                        </div>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-semibold text-blue-100">Subject *</label>
                        <input type="text" name="subject" value="{{ old('subject') }}" required
                            placeholder="Brief description of your complaint..."
                            class="w-full rounded-2xl border border-white/20 bg-white/10 px-5 py-3 text-sm text-white placeholder-blue-300 outline-none transition focus:border-blue-400 focus:ring-4 focus:ring-blue-400/20">
                        @error('subject')<p class="mt-2 text-xs text-red-400">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-semibold text-blue-100">Related Project <span class="text-blue-400 font-normal">(optional)</span></label>
                        <select name="project_id"
                            class="w-full rounded-2xl border border-white/20 bg-white/10 px-5 py-3 text-sm text-white outline-none transition focus:border-blue-400 focus:ring-4 focus:ring-blue-400/20">
                            <option value="" class="text-slate-900">Not related to a specific project</option>
                            @foreach($projects as $project)
                            <option value="{{ $project->id }}" class="text-slate-900" {{ old('project_id') == $project->id ? 'selected' : '' }}>{{ $project->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-semibold text-blue-100">Description *</label>
                        <textarea name="description" rows="6" required
                            placeholder="Provide full details of your complaint or report..."
                            class="w-full rounded-2xl border border-white/20 bg-white/10 px-5 py-4 text-sm text-white placeholder-blue-300 outline-none transition focus:border-blue-400 focus:ring-4 focus:ring-blue-400/20">{{ old('description') }}</textarea>
                        @error('description')<p class="mt-2 text-xs text-red-400">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-semibold text-blue-100">Attachment <span class="text-blue-400 font-normal">(optional)</span></label>
                        <div class="border-2 border-dashed border-white/20 rounded-2xl p-5 text-center">
                            <div class="text-3xl mb-2">📎</div>
                            <p class="text-sm text-blue-300 mb-2">Upload photo or document</p>
                            <input type="file" name="attachment" accept=".jpg,.jpeg,.png,.pdf" class="text-sm text-blue-300">
                            <p class="text-xs text-blue-400 mt-2">JPG, PNG or PDF. Max 2MB.</p>
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full rounded-full bg-blue-700 py-4 text-sm font-semibold text-white shadow-xl transition duration-300 hover:-translate-y-1 hover:bg-blue-800 hover:shadow-2xl active:scale-95">
                        Submit Complaint ✉️
                    </button>

                    <div class="mt-4">
                        <a href="{{ route('home') }}"
                            class="w-full flex items-center justify-center gap-2 border border-white/20 bg-white/10 hover:bg-white/20 text-white font-medium py-3 rounded-full text-sm transition shadow-sm">
                            ← Back to Home
                        </a>
                    </div>

                </form>
            </div>
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

        .plane-glow {
            position: absolute;
            inset: -12px;
            border-radius: 9999px;
            background: radial-gradient(circle, rgba(59, 130, 246, 0.35) 0%, rgba(59, 130, 246, 0.12) 45%, transparent 75%);
            filter: blur(12px);
        }

        .trail {
            position: absolute;
            top: 50%;
            left: -180px;
            width: 170px;
            height: 4px;
            transform: translateY(-50%);
            border-radius: 999px;
            background: linear-gradient(to left, rgba(255, 255, 255, 0), rgba(59, 130, 246, 0.95), rgba(147, 197, 253, 0.75), rgba(255, 255, 255, 0));
            box-shadow: 0 0 18px rgba(59, 130, 246, 0.6), 0 0 35px rgba(147, 197, 253, 0.45);
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

        @keyframes floatPlane {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-6px);
            }
        }

        @keyframes fly1 {
            0% {
                transform: translate(0, 0) rotate(8deg) scale(1);
            }

            25% {
                transform: translate(35vw, -40px) rotate(-6deg) scale(1.05);
            }

            50% {
                transform: translate(65vw, 30px) rotate(8deg) scale(1.08);
            }

            75% {
                transform: translate(90vw, -20px) rotate(-5deg) scale(1.04);
            }

            100% {
                transform: translate(120vw, 10px) rotate(6deg) scale(1);
            }
        }

        @keyframes fly2 {
            0% {
                transform: translate(0, 0) rotate(-10deg) scale(1);
            }

            30% {
                transform: translate(30vw, 50px) rotate(8deg) scale(1.08);
            }

            60% {
                transform: translate(75vw, -40px) rotate(-6deg) scale(1.12);
            }

            100% {
                transform: translate(120vw, 20px) rotate(10deg) scale(1);
            }
        }

        @keyframes fly3 {
            0% {
                transform: translate(0, 0) rotate(5deg) scale(1);
            }

            20% {
                transform: translate(20vw, -25px) rotate(-8deg) scale(1.04);
            }

            50% {
                transform: translate(60vw, 35px) rotate(6deg) scale(1.1);
            }

            80% {
                transform: translate(95vw, -20px) rotate(-5deg) scale(1.05);
            }

            100% {
                transform: translate(120vw, 15px) rotate(8deg) scale(1);
            }
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