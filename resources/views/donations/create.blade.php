<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donate - Barangay System</title>
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
        <a href="{{ route('projects.index') }}" class="min-w-[130px] rounded-full bg-blue-700 px-5 py-3 text-center text-sm font-semibold text-white shadow-lg">Projects</a>
        <a href="{{ route('complaints.create') }}" class="min-w-[170px] rounded-full border border-blue-400 bg-white/10 px-5 py-3 text-center text-sm font-semibold text-white shadow">Submit Complaint</a>
        <a href="{{ route('complaints.track') }}" class="min-w-[160px] rounded-full border border-blue-400 bg-white/10 px-5 py-3 text-center text-sm font-semibold text-white shadow">Track Complaint</a>
        <a href="{{ route('donations.create') }}" class="min-w-[140px] rounded-full border border-blue-400 bg-white/10 px-5 py-3 text-center text-sm font-semibold text-white shadow">Donate Now</a>
        <a href="{{ route('donations.track') }}" class="min-w-[160px] rounded-full border border-blue-400 bg-white/10 px-5 py-3 text-center text-sm font-semibold text-white shadow">Track Donation</a>
    </div>

    <div class="relative z-10 md:ml-[19rem] flex justify-center px-8 py-12">
        <div class="w-full max-w-3xl">
       <!-- 1. Back Button (Styled like your Projects screenshot) -->
        <div class="mb-6">
            <a href="{{ route('home') }}"
                class="inline-flex items-center gap-2 bg-white/20 hover:bg-white/30 backdrop-blur-md text-white px-5 py-2.5 rounded-full text-sm font-medium transition shadow-sm border border-white/10">
                ← Back to Homepage
            </a>
        </div>

            <div class="bg-white/5 backdrop-blur-md rounded-2xl border border-white/10 overflow-hidden shadow-2xl">
                <div class="bg-blue-800 px-8 py-5">
                    <h2 class="text-white font-semibold text-lg">Donation Form</h2>
                    <p class="text-blue-200 text-sm mt-1">Fill in your details to proceed with your donation</p>
                </div>

                <form method="POST" action="{{ route('donations.store') }}" enctype="multipart/form-data" class="p-8">
                    @csrf
                    <div class="mb-6">
                        <h3 class="text-sm font-semibold text-blue-300 uppercase tracking-wider mb-4">Your Information</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold text-blue-100 mb-2">Full Name <span class="text-red-400">*</span></label>
                                <input type="text" name="donor_name" value="{{ old('donor_name') }}"
                                    class="w-full bg-white/10 border border-white/20 rounded-xl px-4 py-3 text-sm text-white placeholder-blue-300 focus:outline-none focus:ring-2 focus:ring-blue-400"
                                    placeholder="Juan Dela Cruz" required>
                                @error('donor_name')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-blue-100 mb-2">Email Address <span class="text-red-400">*</span></label>
                                <input type="email" name="donor_email" value="{{ old('donor_email') }}"
                                    class="w-full bg-white/10 border border-white/20 rounded-xl px-4 py-3 text-sm text-white placeholder-blue-300 focus:outline-none focus:ring-2 focus:ring-blue-400"
                                    placeholder="juan@email.com" required>
                                @error('donor_email')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-blue-100 mb-2">Phone Number</label>
                                <input type="text" name="donor_phone" value="{{ old('donor_phone') }}"
                                    class="w-full bg-white/10 border border-white/20 rounded-xl px-4 py-3 text-sm text-white placeholder-blue-300 focus:outline-none focus:ring-2 focus:ring-blue-400"
                                    placeholder="09XX XXX XXXX">
                            </div>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-sm font-semibold text-blue-300 uppercase tracking-wider mb-4">Donation Details</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold text-blue-100 mb-2">Project / Campaign <span class="text-red-400">*</span></label>
                                <input type="text" name="project_name" value="{{ old('project_name') }}"
                                    class="w-full bg-white/10 border border-white/20 rounded-xl px-4 py-3 text-sm text-white placeholder-blue-300 focus:outline-none focus:ring-2 focus:ring-blue-400"
                                    placeholder="e.g. Road Infrastructure" required>
                                @error('project_name')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-blue-100 mb-2">Donation Amount (PHP) <span class="text-red-400">*</span></label>
                                <input type="number" name="amount" value="{{ old('amount') }}"
                                    class="w-full bg-white/10 border border-white/20 rounded-xl px-4 py-3 text-sm text-white placeholder-blue-300 focus:outline-none focus:ring-2 focus:ring-blue-400"
                                    placeholder="500" min="1" required>
                                @error('amount')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm font-semibold text-blue-100 mb-2">Purpose <span class="text-red-400">*</span></label>
                                <textarea name="purpose" rows="3"
                                    class="w-full bg-white/10 border border-white/20 rounded-xl px-4 py-3 text-sm text-white placeholder-blue-300 focus:outline-none focus:ring-2 focus:ring-blue-400"
                                    placeholder="Describe what this donation is for..." required>{{ old('purpose') }}</textarea>
                                @error('purpose')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-sm font-semibold text-blue-300 uppercase tracking-wider mb-4">Payment Method</h3>
                        <div class="grid grid-cols-3 gap-3 mb-4">
                            <label class="cursor-pointer">
                                <input type="radio" name="payment_method" value="gcash" class="hidden peer" {{ old('payment_method') == 'gcash' ? 'checked' : '' }}>
                                <div class="border-2 border-white/20 rounded-xl p-4 text-center peer-checked:border-blue-400 peer-checked:bg-blue-500/20 transition">
                                    <div class="text-2xl mb-1">📱</div>
                                    <p class="text-sm font-semibold text-white">GCash</p>
                                </div>
                            </label>
                            <label class="cursor-pointer">
                                <input type="radio" name="payment_method" value="bank_transfer" class="hidden peer" {{ old('payment_method') == 'bank_transfer' ? 'checked' : '' }}>
                                <div class="border-2 border-white/20 rounded-xl p-4 text-center peer-checked:border-blue-400 peer-checked:bg-blue-500/20 transition">
                                    <div class="text-2xl mb-1">🏦</div>
                                    <p class="text-sm font-semibold text-white">Bank Transfer</p>
                                </div>
                            </label>
                            <label class="cursor-pointer">
                                <input type="radio" name="payment_method" value="cash" class="hidden peer" {{ old('payment_method', 'cash') == 'cash' ? 'checked' : '' }}>
                                <div class="border-2 border-white/20 rounded-xl p-4 text-center peer-checked:border-blue-400 peer-checked:bg-blue-500/20 transition">
                                    <div class="text-2xl mb-1">💵</div>
                                    <p class="text-sm font-semibold text-white">Cash</p>
                                </div>
                            </label>
                        </div>
                        @error('payment_method')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
                        <div>
                            <label class="block text-sm font-semibold text-blue-100 mb-2">Proof of Payment <span class="text-blue-300 font-normal">(optional)</span></label>
                            <div class="border-2 border-dashed border-white/20 rounded-xl p-6 text-center">
                                <div class="text-3xl mb-2">📎</div>
                                <p class="text-sm text-blue-300 mb-2">Upload screenshot or receipt</p>
                                <input type="file" name="proof_of_payment" accept=".jpg,.png,.pdf" class="text-sm text-blue-300">
                                <p class="text-xs text-blue-400 mt-2">JPG, PNG, PDF (max 2MB)</p>
                            </div>
                        </div>
                    </div>

                    <div class="mb-8">
                        <label class="block text-sm font-semibold text-blue-100 mb-2">Message <span class="text-blue-300 font-normal">(optional)</span></label>
                        <textarea name="message" rows="3"
                            class="w-full bg-white/10 border border-white/20 rounded-xl px-4 py-3 text-sm text-white placeholder-blue-300 focus:outline-none focus:ring-2 focus:ring-blue-400"
                            placeholder="Leave a message of support...">{{ old('message') }}</textarea>
                    </div>

                    <button type="submit" class="w-full bg-blue-700 text-white py-4 rounded-xl font-semibold text-base hover:bg-blue-600 transition hover:-translate-y-1 shadow-lg">
                        Submit Donation ❤️
                    </button>
                </form>
            </div>
        </div>

</body>

</html>