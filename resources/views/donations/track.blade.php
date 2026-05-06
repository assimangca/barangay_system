<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Donation - Barangay System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">

    <!-- Header -->
    <nav class="bg-blue-800 text-white px-6 py-4 flex justify-between items-center">
        <a href="{{ route('home') }}" class="text-xl font-bold">Barangay System</a>
        <div class="flex gap-6">
            <a href="{{ route('projects.index') }}" class="hover:underline">Projects</a>
            <a href="{{ route('donations.create') }}" class="hover:underline">Donate</a>
            <a href="{{ route('donations.track') }}" class="hover:underline">Track Donation</a>
        </div>
    </nav>

    <div class="max-w-2xl mx-auto py-12 px-4">

        <!-- Header -->
        <div class="text-center mb-8">
            <div class="text-5xl mb-3">🔍</div>
            <h1 class="text-3xl font-bold text-blue-800 mb-2">Track Your Donation</h1>
            <p class="text-gray-500">Enter your reference number to check your donation status</p>
        </div>

        <!-- Search Form -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 mb-6">
            <form method="GET" action="{{ route('donations.track') }}">
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Reference Number
                </label>
                <div class="flex gap-3">
                    <input type="text" name="reference_number"
                           value="{{ request('reference_number') }}"
                           class="flex-1 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 font-mono"
                           placeholder="DON-XXXXXXXX" required>
                    <button type="submit"
                            class="bg-blue-800 text-white px-6 py-3 rounded-xl font-semibold text-sm hover:bg-blue-900 transition">
                        Track
                    </button>
                </div>
            </form>
        </div>

        <!-- Result -->
        @if(request('reference_number'))
            @if($donation)
                <!-- Found -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <!-- Status Banner -->
                    <div class="px-8 py-5
                        @if($donation->status === 'verified') bg-green-500
                        @elseif($donation->status === 'rejected') bg-red-500
                        @else bg-yellow-500
                        @endif">
                        <div class="flex items-center gap-3">
                            <span class="text-3xl">
                                @if($donation->status === 'verified') ✅
                                @elseif($donation->status === 'rejected') ❌
                                @else ⏳
                                @endif
                            </span>
                            <div>
                                <p class="text-white font-bold text-lg">
                                    @if($donation->status === 'verified') Donation Verified!
                                    @elseif($donation->status === 'rejected') Donation Rejected
                                    @else Pending Verification
                                    @endif
                                </p>
                                <p class="text-white text-opacity-80 text-sm">
                                    @if($donation->status === 'verified')
                                        Verified on {{ $donation->verified_at->format('M d, Y h:i A') }}
                                    @elseif($donation->status === 'rejected')
                                        Please contact the barangay office
                                    @else
                                        Your donation is being reviewed by admin
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Details -->
                    <div class="p-8">
                        <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-4">
                            Donation Details
                        </h3>
                        <div class="space-y-4">
                            <div class="flex justify-between border-b border-gray-100 pb-3">
                                <span class="text-gray-500 text-sm">Reference Number</span>
                                <span class="font-bold text-blue-800 font-mono">{{ $donation->reference_number }}</span>
                            </div>
                            <div class="flex justify-between border-b border-gray-100 pb-3">
                                <span class="text-gray-500 text-sm">Donor Name</span>
                                <span class="font-semibold text-gray-800">{{ $donation->donor_name }}</span>
                            </div>
                            <div class="flex justify-between border-b border-gray-100 pb-3">
                                <span class="text-gray-500 text-sm">Project</span>
                                <span class="font-semibold text-gray-800">{{ $donation->project_name }}</span>
                            </div>
                            <div class="flex justify-between border-b border-gray-100 pb-3">
                                <span class="text-gray-500 text-sm">Purpose</span>
                                <span class="font-semibold text-gray-800 text-right max-w-xs">{{ $donation->purpose }}</span>
                            </div>
                            <div class="flex justify-between border-b border-gray-100 pb-3">
                                <span class="text-gray-500 text-sm">Amount</span>
                                <span class="font-bold text-green-600 text-lg">₱{{ number_format($donation->amount, 2) }}</span>
                            </div>
                            <div class="flex justify-between border-b border-gray-100 pb-3">
                                <span class="text-gray-500 text-sm">Payment Method</span>
                                <span class="font-semibold text-gray-800">{{ ucfirst(str_replace('_', ' ', $donation->payment_method)) }}</span>
                            </div>
                            <div class="flex justify-between border-b border-gray-100 pb-3">
                                <span class="text-gray-500 text-sm">Date Submitted</span>
                                <span class="font-semibold text-gray-800">{{ $donation->created_at->format('M d, Y h:i A') }}</span>
                            </div>
                            @if($donation->message)
                            <div class="flex justify-between border-b border-gray-100 pb-3">
                                <span class="text-gray-500 text-sm">Your Message</span>
                                <span class="font-semibold text-gray-800 text-right max-w-xs">{{ $donation->message }}</span>
                            </div>
                            @endif
                            @if($donation->admin_notes)
                            <div class="flex justify-between pb-3">
                                <span class="text-gray-500 text-sm">Admin Notes</span>
                                <span class="font-semibold text-gray-800 text-right max-w-xs">{{ $donation->admin_notes }}</span>
                            </div>
                            @endif
                        </div>

                        <!-- Timeline -->
                        <div class="mt-6 border-t border-gray-100 pt-6">
                            <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-4">
                                Timeline
                            </h3>
                            <div class="space-y-3">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center text-sm">📝</div>
                                    <div>
                                        <p class="text-sm font-semibold text-gray-700">Donation Submitted</p>
                                        <p class="text-xs text-gray-400">{{ $donation->created_at->format('M d, Y h:i A') }}</p>
                                    </div>
                                </div>
                                @if($donation->status === 'verified')
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center text-sm">✅</div>
                                    <div>
                                        <p class="text-sm font-semibold text-gray-700">Donation Verified</p>
                                        <p class="text-xs text-gray-400">{{ $donation->verified_at->format('M d, Y h:i A') }}</p>
                                    </div>
                                </div>
                                @elseif($donation->status === 'rejected')
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center text-sm">❌</div>
                                    <div>
                                        <p class="text-sm font-semibold text-gray-700">Donation Rejected</p>
                                        <p class="text-xs text-gray-400">{{ $donation->updated_at->format('M d, Y h:i A') }}</p>
                                    </div>
                                </div>
                                @else
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 bg-yellow-100 rounded-full flex items-center justify-center text-sm">⏳</div>
                                    <div>
                                        <p class="text-sm font-semibold text-gray-700">Pending Verification</p>
                                        <p class="text-xs text-gray-400">Being reviewed by admin</p>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <!-- Not Found -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 text-center">
                    <div class="text-5xl mb-4">😕</div>
                    <h3 class="font-bold text-gray-800 text-lg mb-2">No Donation Found</h3>
                    <p class="text-gray-500 text-sm mb-4">
                        We couldn't find a donation with reference number
                        <strong>{{ request('reference_number') }}</strong>.
                        Please check and try again.
                    </p>
                    <a href="{{ route('donations.create') }}"
                       class="inline-block bg-blue-800 text-white px-6 py-3 rounded-xl font-semibold text-sm hover:bg-blue-900 transition">
                        Make a Donation
                    </a>
                </div>
            @endif
        @endif

        <!-- Quick Links -->
        <div class="mt-6 flex gap-3">
            <a href="{{ route('donations.create') }}"
               class="flex-1 bg-blue-800 text-white py-3 rounded-xl font-semibold text-sm hover:bg-blue-900 transition text-center">
                ❤️ Donate Now
            </a>
            <a href="{{ route('home') }}"
               class="flex-1 border-2 border-gray-200 text-gray-600 py-3 rounded-xl font-semibold text-sm hover:bg-gray-50 transition text-center">
                🏠 Go Home
            </a>
        </div>
    </div>
</body>
</html>