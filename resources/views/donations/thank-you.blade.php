<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You - Barangay System</title>
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

    <div class="max-w-2xl mx-auto py-16 px-4 text-center">

        <!-- Thank You Card -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

            <!-- Green Header -->
            <div class="bg-green-500 px-8 py-10">
                <div class="text-7xl mb-4">🎉</div>
                <h1 class="text-white text-3xl font-bold mb-2">Thank You!</h1>
                <p class="text-green-100 text-lg">Your generous donation has been received.</p>
            </div>

            <!-- Content -->
            <div class="p-8">

                <!-- Warm Message -->
                <div class="bg-blue-50 rounded-xl p-6 mb-6 text-left">
                    <p class="text-blue-800 font-semibold text-lg mb-2">
                        Dear {{ $donation->donor_name }}, 💙
                    </p>
                    <p class="text-gray-600 leading-relaxed">
                        We are deeply grateful for your kindness and generosity.
                        Your donation of <span class="font-bold text-blue-800">₱{{ number_format($donation->amount, 2) }}</span>
                        for <span class="font-bold">{{ $donation->project_name }}</span> will make
                        a real difference in our community. Together, we are building a
                        better barangay for everyone. God bless you! 🙏
                    </p>
                </div>

                <!-- Donation Details -->
                <div class="bg-gray-50 rounded-xl p-6 mb-6 text-left">
                    <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-4">
                        Donation Receipt
                    </h3>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-500 text-sm">Reference Number</span>
                            <span class="font-bold text-blue-800 font-mono">{{ $donation->reference_number }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-500 text-sm">Donor Name</span>
                            <span class="font-semibold text-gray-800">{{ $donation->donor_name }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-500 text-sm">Email</span>
                            <span class="font-semibold text-gray-800">{{ $donation->donor_email }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-500 text-sm">Project</span>
                            <span class="font-semibold text-gray-800">{{ $donation->project_name }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-500 text-sm">Amount</span>
                            <span class="font-bold text-green-600 text-lg">₱{{ number_format($donation->amount, 2) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-500 text-sm">Payment Method</span>
                            <span class="font-semibold text-gray-800">{{ ucfirst(str_replace('_', ' ', $donation->payment_method)) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-500 text-sm">Status</span>
                            <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-xs font-semibold">
                                ⏳ Pending Verification
                            </span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-500 text-sm">Date</span>
                            <span class="font-semibold text-gray-800">{{ $donation->created_at->format('M d, Y h:i A') }}</span>
                        </div>
                    </div>
                </div>

                <!-- Important Note -->
                <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-4 mb-6 text-left">
                    <p class="text-yellow-800 text-sm font-semibold mb-1">📌 Important</p>
                    <p class="text-yellow-700 text-sm">
                        Please save your reference number <strong>{{ $donation->reference_number }}</strong>.
                        You can use it to track the status of your donation anytime.
                    </p>
                </div>

                <!-- Action Buttons -->
                <div class="flex gap-3">
                    <a href="{{ route('donations.track') }}"
                       class="flex-1 bg-blue-800 text-white py-3 rounded-xl font-semibold text-sm hover:bg-blue-900 transition text-center">
                        Track My Donation
                    </a>
                    <a href="{{ route('donations.create') }}"
                       class="flex-1 border-2 border-blue-800 text-blue-800 py-3 rounded-xl font-semibold text-sm hover:bg-blue-50 transition text-center">
                        Donate Again
                    </a>
                    <a href="{{ route('home') }}"
                       class="flex-1 border-2 border-gray-200 text-gray-600 py-3 rounded-xl font-semibold text-sm hover:bg-gray-50 transition text-center">
                        Go Home
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>