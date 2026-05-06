@extends('layouts.admin')
@section('title', 'Expense Details')
@section('page-title', 'Expense Details')

@section('content')
<div class="max-w-2xl space-y-4">
    <a href="{{ route('admin.expenses.index') }}" class="text-sm text-gray-500 hover:text-gray-700">← Back to Expenses</a>

    <div class="bg-white rounded-xl border border-gray-200 p-6 space-y-4">
        <div class="flex items-start justify-between">
            <h2 class="text-lg font-bold text-gray-800">{{ $expense->description }}</h2>
            <span class="px-3 py-1 rounded-full text-sm font-medium
                {{ $expense->status === 'approved' ? 'bg-green-100 text-green-700' : '' }}
                {{ $expense->status === 'pending'  ? 'bg-yellow-100 text-yellow-700' : '' }}
                {{ $expense->status === 'rejected' ? 'bg-red-100 text-red-700' : '' }}">
                {{ ucfirst($expense->status) }}
            </span>
        </div>

        <div class="grid grid-cols-2 gap-4 text-sm">
            <div><p class="text-gray-400">Project</p>
                <a href="{{ route('admin.projects.show', $expense->project) }}"
                   class="text-blue-600 hover:underline">{{ $expense->project->title }}</a>
            </div>
            <div><p class="text-gray-400">Fund Source</p>
                <p class="font-medium">{{ $expense->budgetAllocation->fund_source }}</p>
            </div>
            <div><p class="text-gray-400">Amount</p>
                <p class="text-2xl font-bold text-gray-800">₱{{ number_format($expense->amount, 2) }}</p>
            </div>
            <div><p class="text-gray-400">Date</p>
                <p class="font-medium">{{ $expense->expense_date->format('F d, Y') }}</p>
            </div>
            <div><p class="text-gray-400">Payee</p>
                <p class="font-medium">{{ $expense->payee ?? '—' }}</p>
            </div>
            <div><p class="text-gray-400">Receipt No.</p>
                <p class="font-medium">{{ $expense->receipt_number ?? '—' }}</p>
            </div>
            <div><p class="text-gray-400">Recorded by</p>
                <p class="font-medium">{{ $expense->recorder->name }}</p>
            </div>
            @if($expense->approver)
            <div><p class="text-gray-400">Approved by</p>
                <p class="font-medium">{{ $expense->approver->name }}</p>
            </div>
            @endif
        </div>

        @if($expense->remarks)
        <div class="bg-gray-50 rounded-lg p-3 text-sm text-gray-600">
            <p class="text-gray-400 text-xs mb-1">Remarks</p>
            {{ $expense->remarks }}
        </div>
        @endif

        {{-- Actions --}}
        @if($expense->status === 'pending')
        @can('approve expenses')
        <div class="flex gap-3 pt-2 border-t">
            <form method="POST" action="{{ route('admin.expenses.approve', $expense) }}">
                @csrf
                <button class="bg-green-600 hover:bg-green-700 text-white text-sm font-medium px-5 py-2 rounded-lg">
                    Approve
                </button>
            </form>
            <form method="POST" action="{{ route('admin.expenses.reject', $expense) }}"
                  class="flex gap-2">
                @csrf
                <input type="text" name="remarks" placeholder="Reason for rejection..." required
                       class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-red-400">
                <button class="bg-red-600 hover:bg-red-700 text-white text-sm font-medium px-5 py-2 rounded-lg">
                    Reject
                </button>
            </form>
        </div>
        @endcan
        @endif
    </div>
</div>
@endsection