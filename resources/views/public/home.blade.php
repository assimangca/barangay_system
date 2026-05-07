<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay System</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen text-slate-900"
      style="
        background-color: #f1f5f9;
        background-image:
            linear-gradient(to right, rgba(0,0,0,0.16) 1px, transparent 1px),
            linear-gradient(to bottom, rgba(0,0,0,0.16) 1px, transparent 1px);
        background-size: 50px 50px;
      ">

<nav class="sticky top-0 z-50 bg-blue-950 text-white shadow-lg">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">
        <h1 class="text-xl font-bold">Barangay System</h1>

        <div class="flex items-center gap-6 text-sm font-medium">
            <a href="{{ route('projects.index') }}" class="transition hover:text-blue-200">Projects</a>
            <a href="{{ route('complaints.create') }}" class="transition hover:text-blue-200">Submit Complaint</a>
            <a href="{{ route('complaints.track') }}" class="transition hover:text-blue-200">Track Complaint</a>

            <a href="{{ route('login') }}"
               class="rounded-full bg-white px-5 py-2 text-blue-950 shadow transition duration-300 hover:-translate-y-1 hover:bg-blue-100">
                Admin Login
            </a>
        </div>
    </div>
</nav>

<main class="relative mx-auto flex min-h-[calc(100vh-80px)] max-w-[1500px] items-center justify-center px-6 py-12">
    <section class="grid w-full max-w-[1250px] items-center gap-20 md:grid-cols-2">

        <div>
            <p class="mb-8 inline-block rounded-full bg-blue-100 px-5 py-2 text-sm font-semibold text-blue-800">
                Community Transparency Portal
            </p>

            <h2 class="shine-text mb-8 text-5xl font-extrabold leading-tight md:text-6xl">
                Welcome to Our <br>
                Barangay
            </h2>

            <p class="mb-10 max-w-xl text-lg leading-relaxed text-slate-600">
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
                   class="rounded-full border border-blue-700 bg-white px-8 py-4 text-center font-semibold text-blue-700 shadow transition duration-300 hover:-translate-y-1 hover:bg-blue-50 hover:shadow-lg active:scale-95">
                    Submit a Complaint
                </a>
            </div>
        </div>

        <div class="hidden md:block">
            <div class="rounded-[2rem] bg-white p-8 shadow-2xl ring-1 ring-slate-200">

                <div class="relative mb-8 flex h-64 items-center justify-center overflow-hidden rounded-2xl bg-gradient-to-br from-blue-700 to-blue-950 text-white">

                    <svg class="absolute inset-0 h-full w-full opacity-30"
                         viewBox="0 0 800 400"
                         fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M90 150 C160 90, 230 120, 290 80 S430 100, 490 70 S650 90, 720 140"
                              stroke="white" stroke-width="3"/>
                        <path d="M80 260 C180 210, 260 250, 350 190 S520 210, 710 260"
                              stroke="white" stroke-width="3"/>
                        <path d="M180 40 V360 M360 40 V360 M540 40 V360 M720 40 V360"
                              stroke="white" stroke-width="1.5"/>
                        <path d="M40 100 H760 M40 200 H760 M40 300 H760"
                              stroke="white" stroke-width="1.5"/>
                    </svg>

                    <div class="absolute h-44 w-44 rounded-full bg-blue-300/10"></div>
                    <div class="absolute h-28 w-28 animate-ping rounded-full bg-blue-300/25"></div>

                    <svg xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 24 24"
                         fill="currentColor"
                         class="relative z-10 h-24 w-24 animate-bounce text-white drop-shadow-lg">
                        <path fill-rule="evenodd"
                              d="M11.54 22.351a.75.75 0 0 0 .92 0C17.02 18.74 19.5 15.42 19.5 12.25 19.5 7.97 16.14 4.5 12 4.5S4.5 7.97 4.5 12.25c0 3.17 2.48 6.49 7.04 10.101ZM12 14.25a2.25 2.25 0 1 0 0-4.5 2.25 2.25 0 0 0 0 4.5Z"
                              clip-rule="evenodd" />
                    </svg>
                </div>

                <div class="text-center">
                    <h3 class="text-3xl font-extrabold tracking-wide text-blue-950">
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
.shine-text {
    color: #172554;
    position: relative;
    display: inline-block;
    overflow: hidden;
}

.shine-text::after {
    content: "";
    position: absolute;
    top: 0;
    left: -150%;
    width: 40%;
    height: 100%;
    transform: skewX(-25deg);
    background: linear-gradient(
        to right,
        transparent 0%,
        rgba(255,255,255,0.15) 40%,
        rgba(255,255,255,0.9) 50%,
        rgba(255,255,255,0.15) 60%,
        transparent 100%
    );
    animation: shineSwipe 3s ease-in-out infinite;
}

@keyframes shineSwipe {
    0% {
        left: -150%;
    }

    100% {
        left: 150%;
    }
}
</style>

</body>
</html>