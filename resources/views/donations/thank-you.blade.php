<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You - Barangay System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen overflow-x-hidden bg-[#071326] text-white">

    <div class="fixed inset-0 z-0 overflow-hidden pointer-events-none">
        <div class="absolute left-[-150px] top-[120px] h-[500px] w-[500px] rounded-full bg-blue-700/20 blur-3xl"></div>
        <div class="absolute bottom-[-200px] right-[-100px] h-[600px] w-[600px] rounded-full bg-blue-500/10 blur-3xl"></div>
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

    <aside class="fixed left-0 top-[88px] z-40 hidden h-[calc(100vh-88px)] w-64 border-r border-blue-400/10 bg-blue-950/90 px-5 py-8 text-white shadow-2xl backdrop-blur-md md:block">
        <div class="flex flex-col gap-4 text-sm font-semibold">
            <a href="{{ route('projects.index') }}"
                class="rounded-2xl px-5 py-4 text-center shadow transition duration-300 hover:-translate-y-1 hover:shadow-lg active:scale-95
            {{ request()->routeIs('projects.*') ? 'bg-blue-700 text-white hover:bg-blue-800' : 'border border-blue-400 bg-white/10 text-white hover:bg-white/20' }}">
                Projects
            </a>
            <a href="{{ route('complaints.create') }}"
                class="rounded-2xl px-5 py-4 text-center shadow transition duration-300 hover:-translate-y-1 hover:shadow-lg active:scale-95
            {{ request()->routeIs('complaints.create') ? 'bg-blue-700 text-white hover:bg-blue-800' : 'border border-blue-400 bg-white/10 text-white hover:bg-white/20' }}">
                Submit Complaint
            </a>
            <a href="{{ route('complaints.track') }}"
                class="rounded-2xl px-5 py-4 text-center shadow transition duration-300 hover:-translate-y-1 hover:shadow-lg active:scale-95
            {{ request()->routeIs('complaints.track') ? 'bg-blue-700 text-white hover:bg-blue-800' : 'border border-blue-400 bg-white/10 text-white hover:bg-white/20' }}">
                Track Complaint
            </a>
            <a href="{{ route('donations.create') }}"
                class="rounded-2xl px-5 py-4 text-center shadow transition duration-300 hover:-translate-y-1 hover:shadow-lg active:scale-95
            {{ request()->routeIs('donations.create') ? 'bg-blue-700 text-white hover:bg-blue-800' : 'border border-blue-400 bg-white/10 text-white hover:bg-white/20' }}">
                Donate Now
            </a>
            <a href="{{ route('donations.track') }}"
                class="rounded-2xl px-5 py-4 text-center shadow transition duration-300 hover:-translate-y-1 hover:shadow-lg active:scale-95
            {{ request()->routeIs('donations.track') ? 'bg-blue-700 text-white hover:bg-blue-800' : 'border border-blue-400 bg-white/10 text-white hover:bg-white/20' }}">
                Track Donation
            </a>
        </div>
    </aside>

    <div class="relative z-10 mx-auto flex max-w-7xl gap-3 overflow-x-auto px-6 pt-6 md:hidden">
        <a href="{{ route('projects.index') }}" class="min-w-[130px] rounded-full bg-blue-700 px-5 py-3 text-center text-sm font-semibold text-white shadow-lg">Projects</a>
        <a href="{{ route('complaints.create') }}" class="min-w-[170px] rounded-full border border-blue-400 bg-white/10 px-5 py-3 text-center text-sm font-semibold text-white shadow">Submit Complaint</a>
        <a href="{{ route('complaints.track') }}" class="min-w-[160px] rounded-full border border-blue-400 bg-white/10 px-5 py-3 text-center text-sm font-semibold text-white shadow">Track Complaint</a>
        <a href="{{ route('donations.create') }}" class="min-w-[140px] rounded-full border border-blue-400 bg-white/10 px-5 py-3 text-center text-sm font-semibold text-white shadow">Donate Now</a>
        <a href="{{ route('donations.track') }}" class="min-w-[160px] rounded-full border border-blue-400 bg-white/10 px-5 py-3 text-center text-sm font-semibold text-white shadow">Track Donation</a>
    </div>

    <div class="relative z-10 md:ml-[19rem] px-8 py-12">
        <div class="max-w-2xl mx-auto">

            <div class="bg-white/5 backdrop-blur-md rounded-2xl border border-white/10 overflow-hidden shadow-2xl">

                <div class="bg-green-600 px-8 py-10 text-center">
                    <div class="text-7xl mb-4">🎉</div>
                    <h1 class="text-white text-3xl font-bold mb-2">Thank You!</h1>
                    <p class="text-green-100 text-lg">Your generous donation has been received.</p>
                </div>

                <div class="p-8">

                    <div class="bg-blue-500/10 border border-blue-400/20 rounded-xl p-6 mb-6">
                        <p class="text-blue-200 font-semibold text-lg mb-2">
                            Dear {{ $donation->donor_name }}, 💙
                        </p>
                        <p class="text-blue-100 leading-relaxed">
                            We are deeply grateful for your kindness and generosity.
                            Your donation of <span class="font-bold text-white">₱{{ number_format($donation->amount, 2) }}</span>
                            for <span class="font-bold text-white">{{ $donation->project_name }}</span> will make
                            a real difference in our community. Together, we are building a
                            better barangay for everyone. God bless you! 🙏
                        </p>
                    </div>

                    <div class="bg-white/5 border border-white/10 rounded-xl p-6 mb-6">
                        <h3 class="text-sm font-semibold text-blue-300 uppercase tracking-wider mb-4">Donation Receipt</h3>
                        <div class="space-y-3">
                            <div class="flex justify-between border-b border-white/10 pb-3">
                                <span class="text-blue-200 text-sm">Reference Number</span>
                                <span class="font-bold text-white font-mono">{{ $donation->reference_number }}</span>
                            </div>
                            <div class="flex justify-between border-b border-white/10 pb-3">
                                <span class="text-blue-200 text-sm">Donor Name</span>
                                <span class="font-semibold text-white">{{ $donation->donor_name }}</span>
                            </div>
                            <div class="flex justify-between border-b border-white/10 pb-3">
                                <span class="text-blue-200 text-sm">Email</span>
                                <span class="font-semibold text-white">{{ $donation->donor_email }}</span>
                            </div>
                            <div class="flex justify-between border-b border-white/10 pb-3">
                                <span class="text-blue-200 text-sm">Project</span>
                                <span class="font-semibold text-white">{{ $donation->project_name }}</span>
                            </div>
                            <div class="flex justify-between border-b border-white/10 pb-3">
                                <span class="text-blue-200 text-sm">Amount</span>
                                <span class="font-bold text-green-400 text-lg">₱{{ number_format($donation->amount, 2) }}</span>
                            </div>
                            <div class="flex justify-between border-b border-white/10 pb-3">
                                <span class="text-blue-200 text-sm">Payment Method</span>
                                <span class="font-semibold text-white">{{ ucfirst(str_replace('_', ' ', $donation->payment_method)) }}</span>
                            </div>
                            <div class="flex justify-between border-b border-white/10 pb-3">
                                <span class="text-blue-200 text-sm">Status</span>
                                <span class="bg-yellow-400/20 text-yellow-300 px-3 py-1 rounded-full text-xs font-semibold">
                                    ⏳ Pending Verification
                                </span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-blue-200 text-sm">Date</span>
                                <span class="font-semibold text-white">{{ $donation->created_at->format('M d, Y h:i A') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-yellow-400/10 border border-yellow-400/20 rounded-xl p-4 mb-6">
                        <p class="text-yellow-300 text-sm font-semibold mb-1">📌 Important</p>
                        <p class="text-yellow-200 text-sm">
                            Please save your reference number <strong>{{ $donation->reference_number }}</strong>.
                            You can use it to track the status of your donation anytime.
                        </p>
                    </div>

                    <div class="flex gap-3">
                        <a href="{{ route('donations.track') }}"
                            class="flex-1 bg-blue-700 text-white py-3 rounded-xl font-semibold text-sm hover:bg-blue-600 transition text-center">
                            Track My Donation
                        </a>
                        <a href="{{ route('donations.create') }}"
                            class="flex-1 border border-blue-400 bg-white/10 text-white py-3 rounded-xl font-semibold text-sm hover:bg-white/20 transition text-center">
                            Donate Again
                        </a>
                        <a href="{{ route('home') }}"
                            class="flex-1 border border-white/20 bg-white/5 text-white py-3 rounded-xl font-semibold text-sm hover:bg-white/10 transition text-center">
                            Go Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>