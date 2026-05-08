<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Complaint — Barangay Digital Service Portal</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen overflow-x-hidden bg-slate-900 text-slate-900">

    <!-- BLUEPRINT WORLD MAP BACKGROUND -->
    <div class="pointer-events-none fixed inset-0 z-0 overflow-hidden bg-slate-900">

        <!-- GRID -->
        <div class="absolute inset-0 opacity-30"
            style="
            background-image:
                linear-gradient(to right, rgba(148,163,184,0.22) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(148,163,184,0.22) 1px, transparent 1px);
            background-size: 16px 16px;
         ">
        </div>

        <div class="absolute inset-0 opacity-20"
            style="
            background-image:
                linear-gradient(to right, rgba(148,163,184,0.35) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(148,163,184,0.35) 1px, transparent 1px);
            background-size: 80px 80px;
         ">
        </div>

        <!-- WORLD MAP -->
        <svg class="absolute left-1/2 top-1/2 h-[620px] w-[1180px] -translate-x-1/2 -translate-y-1/2 opacity-80"
            viewBox="0 0 1200 620"
            fill="none"
            xmlns="http://www.w3.org/2000/svg">

            <g fill="#8FA6B8" opacity="0.75">
                <path d="M130 185L169 155L236 145L288 165L313 199L294 242L251 257L214 246L180 276L142 253L104 225Z" />
                <path d="M255 125L312 98L377 106L400 142L362 164L294 154Z" />
                <path d="M92 215L120 205L135 232L107 244Z" />
                <path d="M310 330L355 348L381 399L365 470L338 548L312 515L295 445L271 398Z" />
                <path d="M535 170L584 146L641 158L658 192L626 216L572 206L526 202Z" />
                <path d="M584 238L662 251L703 311L686 406L639 480L592 437L563 347Z" />
                <path d="M675 165L789 126L940 142L1050 185L1017 240L924 247L873 294L792 275L725 232Z" />
                <path d="M900 305L958 323L978 376L922 365Z" />
                <path d="M930 445L1010 432L1070 468L1030 516L950 503Z" />
                <path d="M1085 382L1112 390L1104 413Z" />
                <path d="M1124 430L1155 446L1130 468Z" />
                <path d="M465 122L492 112L513 125L490 136Z" />
            </g>

            <g stroke="#9FB3C4" stroke-width="1.5" opacity="0.55">
                <path d="M130 185L169 155L236 145L288 165L313 199L294 242L251 257L214 246L180 276L142 253L104 225Z" />
                <path d="M255 125L312 98L377 106L400 142L362 164L294 154Z" />
                <path d="M310 330L355 348L381 399L365 470L338 548L312 515L295 445L271 398Z" />
                <path d="M535 170L584 146L641 158L658 192L626 216L572 206L526 202Z" />
                <path d="M584 238L662 251L703 311L686 406L639 480L592 437L563 347Z" />
                <path d="M675 165L789 126L940 142L1050 185L1017 240L924 247L873 294L792 275L725 232Z" />
                <path d="M930 445L1010 432L1070 468L1030 516L950 503Z" />
            </g>

        </svg>

    </div>

    <!-- NAVBAR -->
    <nav class="sticky top-0 z-50 bg-blue-950 text-white shadow-lg">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">

            <!-- LOGO -->
            <a href="{{ route('home') }}"
                class="flex items-center gap-3 group">

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

    <!-- MOBILE SIDEBAR BUTTONS -->
    <div class="relative z-10 mx-auto flex max-w-7xl gap-3 overflow-x-auto px-6 pt-6 md:hidden">

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

    <main class="relative z-10 mx-auto grid min-h-[calc(100vh-80px)] max-w-7xl items-center gap-10 px-6 py-16 lg:grid-cols-2 md:ml-[19rem] md:mr-auto">

        <!-- LEFT SIDE -->
        <div class="rounded-3xl bg-white/85 p-8 shadow-2xl ring-1 ring-slate-200 backdrop-blur-md">

            <p class="mb-4 inline-block rounded-full bg-blue-100 px-4 py-2 text-sm font-semibold text-blue-800">
                Complaint Tracking Portal
            </p>

            <h1 class="text-4xl font-extrabold tracking-tight text-blue-950">
                Track Your Complaint
            </h1>

            <p class="mt-3 mb-8 text-lg leading-relaxed text-slate-600">
                Enter your tracking number to check the latest
                status of your complaint.
            </p>

            @if(session('tracking_number'))
            <div class="mb-6 rounded-2xl border border-blue-200 bg-blue-50/80 p-5">

                <p class="text-sm font-semibold text-blue-800">
                    Your tracking number is:
                </p>

                <p class="mt-1 font-mono text-2xl font-bold text-blue-700">
                    {{ session('tracking_number') }}
                </p>

                <p class="mt-1 text-xs text-blue-600">
                    Save this number to track your complaint anytime.
                </p>

            </div>
            @endif

            <form method="GET"
                action="{{ route('complaints.track') }}"
                class="flex flex-col gap-3 sm:flex-row">

                <input type="text"
                    name="tracking_number"
                    value="{{ request('tracking_number') }}"
                    placeholder="e.g. BGY-202604-ABC12"
                    required
                    class="flex-1 rounded-full border border-slate-300 bg-white/80 px-5 py-3 font-mono text-sm outline-none transition focus:border-blue-600 focus:ring-4 focus:ring-blue-100">

                <button type="submit"
                    class="rounded-full bg-blue-700 px-7 py-3 text-sm font-semibold text-white shadow-lg transition duration-300 hover:-translate-y-1 hover:bg-blue-800 hover:shadow-xl active:scale-95">

                    Track

                </button>

            </form>

            @if($error)
            <div class="mt-5 rounded-2xl border border-red-200 bg-red-50 p-4">
                <p class="text-sm text-red-700">{{ $error }}</p>
            </div>
            @endif

        </div>

        <!-- RIGHT SIDE -->
        <div class="hidden lg:block">

            <div class="rounded-[2rem] bg-white/85 p-8 shadow-2xl ring-1 ring-slate-200 backdrop-blur-md">

                <div class="relative flex h-72 items-center justify-center overflow-hidden rounded-3xl bg-gradient-to-br from-blue-700 to-blue-950">

                    <div class="absolute h-44 w-44 animate-ping rounded-full bg-blue-300/20"></div>
                    <div class="absolute h-64 w-64 animate-pulse rounded-full bg-blue-400/20 blur-3xl"></div>

                    <div class="relative z-10 h-40 w-56 animate-[bounce_2s_infinite] rounded-2xl bg-white shadow-2xl">

                        <div class="absolute inset-0 rounded-2xl bg-white"></div>

                        <div class="absolute left-0 top-0 h-0 w-0 border-l-[112px] border-r-[112px] border-t-[80px] border-l-transparent border-r-transparent border-t-blue-100"></div>

                        <div class="absolute bottom-0 left-0 h-0 w-0 border-b-[80px] border-r-[112px] border-b-blue-50 border-r-transparent"></div>

                        <div class="absolute bottom-0 right-0 h-0 w-0 border-b-[80px] border-l-[112px] border-b-blue-50 border-l-transparent"></div>

                        <div class="absolute bottom-0 left-0 h-0 w-0 border-b-[90px] border-l-[112px] border-r-[112px] border-b-white border-l-transparent border-r-transparent"></div>

                        <div class="absolute left-1/2 top-1/2 h-10 w-10 -translate-x-1/2 -translate-y-1/2 rounded-full bg-blue-700 shadow-lg"></div>

                        <div class="absolute bottom-6 left-1/2 h-2 w-24 -translate-x-1/2 rounded-full bg-blue-200"></div>

                    </div>

                </div>

                <div class="mt-6 text-center">

                    <h3 class="text-3xl font-extrabold tracking-wide text-blue-950">
                        TRACK YOUR REPORT
                    </h3>

                    <p class="mt-3 text-base leading-relaxed text-slate-500">
                        Use your tracking number to monitor updates,
                        responses, and complaint status.
                    </p>

                </div>

            </div>

        </div>

        @if($complaint)

        <div class="rounded-3xl bg-white/85 p-8 shadow-2xl ring-1 ring-slate-200 backdrop-blur-md lg:col-span-2">

            <div class="mb-6 flex items-start justify-between">

                <div>

                    <span class="rounded-full bg-blue-100 px-3 py-1 font-mono text-xs font-semibold text-blue-700">
                        {{ $complaint->tracking_number }}
                    </span>

                    <h2 class="mt-3 text-2xl font-extrabold text-blue-950">
                        {{ $complaint->subject }}
                    </h2>

                </div>

                <span class="rounded-full px-4 py-2 text-sm font-semibold

                {{ $complaint->status === 'submitted' ? 'bg-blue-100 text-blue-700' : '' }}

                {{ $complaint->status === 'under_review' ? 'bg-yellow-100 text-yellow-700' : '' }}

                {{ $complaint->status === 'resolved' ? 'bg-green-100 text-green-700' : '' }}

                {{ $complaint->status === 'dismissed' ? 'bg-gray-100 text-gray-600' : '' }}">

                    {{ $complaint->status_label }}

                </span>

            </div>

        </div>

        @endif

        <div class="mb-6">
            <a href="{{ route('home') }}"
                class="inline-flex items-center gap-2 bg-blue-700 hover:bg-blue-800 text-white px-4 py-2 rounded-lg text-sm font-medium transition shadow-sm">
                ← Back to Home
            </a>
        </div>
        </div>

</body>

</html>