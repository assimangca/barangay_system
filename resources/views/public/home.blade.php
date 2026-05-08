<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay System</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen overflow-x-hidden bg-[#071326] text-slate-900">

<!-- BLUEPRINT BACKGROUND -->
<div class="fixed inset-0 z-0 overflow-hidden pointer-events-none">

    <div class="absolute inset-0 opacity-20"
         style="
            background-image:
                linear-gradient(to right, rgba(255,255,255,0.05) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(255,255,255,0.05) 1px, transparent 1px);
            background-size: 18px 18px;
         ">
    </div>

    <div class="absolute inset-0 opacity-15"
         style="
            background-image:
                linear-gradient(to right, rgba(255,255,255,0.10) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(255,255,255,0.10) 1px, transparent 1px);
            background-size: 90px 90px;
         ">
    </div>

    <div class="absolute left-[-150px] top-[120px] h-[500px] w-[500px] rounded-full bg-blue-700/20 blur-3xl"></div>

    <div class="absolute bottom-[-200px] right-[-100px] h-[600px] w-[600px] rounded-full bg-blue-500/10 blur-3xl"></div>

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

        <div class="flex items-center gap-6 text-sm font-medium">
            <a href="{{ route('login') }}"
               class="rounded-full bg-white px-5 py-2 text-blue-950 shadow transition duration-300 hover:-translate-y-1 hover:bg-blue-100">
                Admin Login
            </a>
        </div>

    </div>

</nav>

<!-- MAIN -->
<main class="relative z-10 mx-auto flex min-h-[calc(100vh-80px)]
             max-w-[1500px] items-center justify-center px-6 py-16 overflow-hidden">

    <section class="grid w-full max-w-[1250px] items-center gap-20 md:grid-cols-2">

        <div>

            <p class="mb-8 inline-block rounded-full bg-blue-100 px-5 py-2 text-sm font-semibold text-blue-800">
                Community Transparency Portal
            </p>

            <h2 class="magic-text shine-text mb-8 pb-2 text-5xl font-extrabold leading-tight md:text-6xl">
                Welcome to Our <br>
                Barangay
            </h2>

            <p class="mb-10 max-w-xl text-lg leading-relaxed text-slate-300">
                Transparent governance for our community.
                View barangay projects, submit complaints,
                and track your concerns with ease.
            </p>

            <div class="flex flex-col gap-4 sm:flex-row">

                <a href="{{ route('projects.index') }}"
                   class="rounded-full bg-blue-700 px-8 py-4 text-center font-semibold text-white shadow-lg transition duration-300 hover:-translate-y-1 hover:bg-blue-800 hover:shadow-xl active:scale-95">
                    View Projects
                </a>

                <a href="{{ route('complaints.create') }}"
                   class="rounded-full border border-blue-400 bg-white/10 backdrop-blur-md px-8 py-4 text-center font-semibold text-white shadow transition duration-300 hover:-translate-y-1 hover:bg-white/20 hover:shadow-lg active:scale-95">
                    Submit Complaint
                </a>

                <a href="{{ route('complaints.track') }}"
                   class="rounded-full border border-blue-400 bg-white/10 backdrop-blur-md px-8 py-4 text-center font-semibold text-white shadow transition duration-300 hover:-translate-y-1 hover:bg-white/20 hover:shadow-lg active:scale-95">
                    Track Complaint
                </a>

            </div>

        </div>

        <!-- RIGHT -->
        <div class="hidden md:block">

            <div class="rounded-[2rem] bg-white/80 backdrop-blur-md p-8 shadow-2xl ring-1 ring-white/10">

                <div class="relative mb-8 flex h-72 items-center justify-center overflow-hidden rounded-2xl bg-gradient-to-br from-blue-700 to-blue-950 text-white">

                    <svg class="absolute inset-0 h-full w-full opacity-30"
                         viewBox="0 0 800 400"
                         fill="none"
                         xmlns="http://www.w3.org/2000/svg">

                        <path d="M90 150 C160 90, 230 120, 290 80 S430 100, 490 70 S650 90, 720 140"
                              stroke="white"
                              stroke-width="3"/>

                        <path d="M80 260 C180 210, 260 250, 350 190 S520 210, 710 260"
                              stroke="white"
                              stroke-width="3"/>

                        <path d="M180 40 V360 M360 40 V360 M540 40 V360 M720 40 V360"
                              stroke="white"
                              stroke-width="1.5"/>

                        <path d="M40 100 H760 M40 200 H760 M40 300 H760"
                              stroke="white"
                              stroke-width="1.5"/>

                    </svg>

                    <div class="absolute h-52 w-52 rounded-full bg-blue-400/10 blur-3xl"></div>
                    <div class="absolute h-32 w-32 animate-ping rounded-full bg-blue-300/20"></div>

                    <div class="relative z-10 animate-bounce">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 24 24"
                             fill="currentColor"
                             class="h-24 w-24 text-white drop-shadow-[0_10px_25px_rgba(0,0,0,0.45)]">

                            <path fill-rule="evenodd"
                                  d="M11.54 22.351a.75.75 0 0 0 .92 0C17.02 18.74 19.5 15.42 19.5 12.25 19.5 7.97 16.14 4.5 12 4.5S4.5 7.97 4.5 12.25c0 3.17 2.48 6.49 7.04 10.101ZM12 14.25a2.25 2.25 0 1 0 0-4.5 2.25 2.25 0 0 0 0 4.5Z"
                                  clip-rule="evenodd" />

                        </svg>
                    </div>

                </div>

                <div class="pb-2 text-center">

                    <h3 class="text-3xl font-extrabold tracking-wide leading-tight text-blue-950">
                        VISIT OUR PAGE
                    </h3>

                    <p class="mx-auto mt-4 max-w-md text-base leading-relaxed text-slate-500">
                        Stay connected and updated with our latest projects,
                        announcements, and barangay services.
                    </p>

                </div>

            </div>

        </div>

    </section>

</main>

<style>

.magic-text{
    position:relative;
    display:inline-block;
    overflow:hidden;

    background:linear-gradient(
        90deg,
        #60a5fa 0%,
        #e0f2fe 18%,
        #ffffff 30%,
        #f9a8d4 45%,
        #ec4899 58%,
        #c084fc 75%,
        #93c5fd 100%
    );

    background-size:220% 220%;

    -webkit-background-clip:text;
    background-clip:text;

    color:transparent;
    -webkit-text-fill-color:transparent;

    filter:drop-shadow(0 0 14px rgba(236,72,153,0.20))
           drop-shadow(0 0 22px rgba(96,165,250,0.18));

    animation:magicGradient 6s ease-in-out infinite;
}

.shine-text::after{
    content:"";
    position:absolute;
    top:0;
    left:-160%;

    width:35%;
    height:100%;

    transform:skewX(-25deg);

    background:linear-gradient(
        to right,
        transparent 0%,
        rgba(255,255,255,0.12) 35%,
        rgba(255,255,255,0.85) 50%,
        rgba(255,255,255,0.12) 65%,
        transparent 100%
    );

    animation:shineSwipe 3.5s ease-in-out infinite;
}

@keyframes shineSwipe{
    0%{
        left:-160%;
    }

    100%{
        left:180%;
    }
}

@keyframes magicGradient{
    0%{
        background-position:0% 50%;
    }

    50%{
        background-position:100% 50%;
    }

    100%{
        background-position:0% 50%;
    }
}

</style>

</body>
</html>