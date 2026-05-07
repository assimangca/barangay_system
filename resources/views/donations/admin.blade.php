@extends('layouts.admin')

@section('title', 'Donations')
@section('page-title', 'Donations')

@section('content')
<div class="grid grid-cols-3 gap-6 mb-8">
    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
        <p class="text-xs text-gray-400 uppercase tracking-wider font-semibold mb-1">Total Verified</p>
        <p class="text-3xl font-bold text-green-600">₱{{ number_format($totalAmount, 2) }}</p>
    </div>
    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
        <p class="text-xs text-gray-400 uppercase tracking-wider font-semibold mb-1">Total Donors</p>
        <p class="text-3xl font-bold text-blue-800">{{ $totalDonors }}</p>
    </div>
    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
        <p class="text-xs text-gray-400 uppercase tracking-wider font-semibold mb-1">Pending</p>
        <p class="text-3xl font-bold text-yellow-500">{{ $pendingCount }}</p>
    </div>
</div>

<div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
    <div class="px-8 py-5 border-b border-gray-100">
        <h2 class="font-bold text-gray-800 text-lg">All Donations</h2>
    </div>
    <table class="w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs text-gray-400 uppercase tracking-wider">Reference</th>
                <th class="px-6 py-3 text-left text-xs text-gray-400 uppercase tracking-wider">Donor</th>
                <th class="px-6 py-3 text-left text-xs text-gray-400 uppercase tracking-wider">Project</th>
                <th class="px-6 py-3 text-left text-xs text-gray-400 uppercase tracking-wider">Amount</th>
                <th class="px-6 py-3 text-left text-xs text-gray-400 uppercase tracking-wider">Method</th>
                <th class="px-6 py-3 text-left text-xs text-gray-400 uppercase tracking-wider">Status</th>
                <th class="px-6 py-3 text-left text-xs text-gray-400 uppercase tracking-wider">Date</th>
                <th class="px-6 py-3 text-left text-xs text-gray-400 uppercase tracking-wider">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($donations as $donation)
            <tr class="border-t border-gray-100 hover:bg-gray-50">
                <td class="px-6 py-4 font-mono text-xs text-blue-800 font-bold">{{ $donation->reference_number }}</td>
                <td class="px-6 py-4">
                    <p class="font-semibold text-gray-800 text-sm">{{ $donation->donor_name }}</p>
                    <p class="text-xs text-gray-400">{{ $donation->donor_email }}</p>
                </td>
                <td class="px-6 py-4 text-sm text-gray-700">{{ $donation->project_name }}</td>
                <td class="px-6 py-4 font-bold text-green-600">₱{{ number_format($donation->amount, 2) }}</td>
                <td class="px-6 py-4 text-sm text-gray-600">{{ ucfirst(str_replace('_', ' ', $donation->payment_method)) }}</td>
                <td class="px-6 py-4">
                    @if($donation->status === 'verified')
                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">✅ Verified</span>
                    @elseif($donation->status === 'rejected')
                    <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-semibold">❌ Rejected</span>
                    @else
                    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-semibold">⏳ Pending</span>
                    @endif
                </td>
                <td class="px-6 py-4 text-xs text-gray-400">{{ $donation->created_at->format('M d, Y') }}</td>
                <td class="px-6 py-4">
                    @if($donation->status === 'pending')
                    <form method="POST" action="{{ route('admin.donations.verify', $donation) }}">
                        @csrf
                        @method('PATCH')
                        <div class="flex gap-2">
                            <button name="status" value="verified"
                                class="bg-green-500 text-white px-3 py-1 rounded-lg text-xs font-semibold hover:bg-green-600">
                                Verify
                            </button>
                            <button name="status" value="rejected"
                                class="bg-red-500 text-white px-3 py-1 rounded-lg text-xs font-semibold hover:bg-red-600">
                                Reject
                            </button>
                        </div>
                    </form>
                    @else
                    <span class="text-xs text-gray-400">Done</span>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="px-6 py-12 text-center text-gray-400">No donations yet.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection