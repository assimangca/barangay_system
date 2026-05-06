<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donate - Barangay System</title>
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

    <div class="max-w-3xl mx-auto py-12 px-4">

        <!-- Header -->
        <div class="text-center mb-10">
            <div class="text-6xl mb-4">❤️</div>
            <h1 class="text-3xl font-bold text-blue-800 mb-3">Make a Donation</h1>
            <p class="text-gray-600">Your contribution helps build a better barangay for everyone.</p>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="bg-blue-800 px-8 py-5">
                <h2 class="text-white font-semibold text-lg">Donation Form</h2>
                <p class="text-blue-200 text-sm mt-1">Fill in your details to proceed with your donation</p>
            </div>

            <form method="POST" action="{{ route('donations.store') }}"
                  enctype="multipart/form-data" class="p-8">
                @csrf

                <!-- Donor Info -->
                <div class="mb-6">
                    <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-4">
                        Your Information
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Full Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="donor_name"
                                   value="{{ old('donor_name') }}"
                                   class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                                   placeholder="Juan Dela Cruz" required>
                            @error('donor_name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Email Address <span class="text-red-500">*</span>
                            </label>
                            <input type="email" name="donor_email"
                                   value="{{ old('donor_email') }}"
                                   class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                                   placeholder="juan@email.com" required>
                            @error('donor_email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Phone Number
                            </label>
                            <input type="text" name="donor_phone"
                                   value="{{ old('donor_phone') }}"
                                   class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                                   placeholder="09XX XXX XXXX">
                        </div>
                    </div>
                </div>

                <!-- Donation Info -->
                <div class="mb-6">
                    <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-4">
                        Donation Details
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Project / Campaign <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="project_name"
                                   value="{{ old('project_name') }}"
                                   class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                                   placeholder="e.g. Road Infrastructure" required>
                            @error('project_name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Donation Amount (PHP) <span class="text-red-500">*</span>
                            </label>
                            <input type="number" name="amount"
                                   value="{{ old('amount') }}"
                                   class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                                   placeholder="500" min="1" required>
                            @error('amount')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Purpose <span class="text-red-500">*</span>
                            </label>
                            <textarea name="purpose" rows="3"
                                      class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                                      placeholder="Describe what this donation is for..." required>{{ old('purpose') }}</textarea>
                            @error('purpose')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Payment -->
                <div class="mb-6">
                    <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-4">
                        Payment Method
                    </h3>
                    <div class="grid grid-cols-3 gap-3 mb-4">
                        <label class="cursor-pointer">
                            <input type="radio" name="payment_method" value="gcash"
                                   class="hidden peer" {{ old('payment_method') == 'gcash' ? 'checked' : '' }}>
                            <div class="border-2 border-gray-200 rounded-xl p-4 text-center peer-checked:border-blue-500 peer-checked:bg-blue-50 transition">
                                <div class="text-2xl mb-1">📱</div>
                                <p class="text-sm font-semibold text-gray-700">GCash</p>
                            </div>
                        </label>
                        <label class="cursor-pointer">
                            <input type="radio" name="payment_method" value="bank_transfer"
                                   class="hidden peer" {{ old('payment_method') == 'bank_transfer' ? 'checked' : '' }}>
                            <div class="border-2 border-gray-200 rounded-xl p-4 text-center peer-checked:border-blue-500 peer-checked:bg-blue-50 transition">
                                <div class="text-2xl mb-1">🏦</div>
                                <p class="text-sm font-semibold text-gray-700">Bank Transfer</p>
                            </div>
                        </label>
                        <label class="cursor-pointer">
                            <input type="radio" name="payment_method" value="cash"
                                   class="hidden peer" {{ old('payment_method', 'cash') == 'cash' ? 'checked' : '' }}>
                            <div class="border-2 border-gray-200 rounded-xl p-4 text-center peer-checked:border-blue-500 peer-checked:bg-blue-50 transition">
                                <div class="text-2xl mb-1">💵</div>
                                <p class="text-sm font-semibold text-gray-700">Cash</p>
                            </div>
                        </label>
                    </div>
                    @error('payment_method')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror

                    <!-- Proof of Payment -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Proof of Payment <span class="text-gray-400 font-normal">(optional)</span>
                        </label>
                        <div class="border-2 border-dashed border-gray-200 rounded-xl p-6 text-center">
                            <div class="text-3xl mb-2">📎</div>
                            <p class="text-sm text-gray-500 mb-2">Upload screenshot or receipt</p>
                            <input type="file" name="proof_of_payment"
                                   accept=".jpg,.png,.pdf"
                                   class="text-sm text-gray-500">
                            <p class="text-xs text-gray-400 mt-2">JPG, PNG, PDF (max 2MB)</p>
                        </div>
                    </div>
                </div>

                <!-- Message -->
                <div class="mb-8">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Message <span class="text-gray-400 font-normal">(optional)</span>
                    </label>
                    <textarea name="message" rows="3"
                              class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                              placeholder="Leave a message of support...">{{ old('message') }}</textarea>
                </div>

                <!-- Submit -->
                <button type="submit"
                        class="w-full bg-blue-800 text-white py-4 rounded-xl font-semibold text-base hover:bg-blue-900 transition">
                    Submit Donation ❤️
                </button>
            </form>
        </div>
    </div>
</body>
</html>