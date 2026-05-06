@extends('layouts.admin')
@section('title', 'Expenses')
@section('page-title', 'Expenses')

@section('content')
<div class="space-y-4">
    <div class="flex items-center justify-between">
        <p class="text-sm text-gray-500">{{ $expenses->total() }} expenses</p>
        @can('create expenses')
        <a href="{{ route('admin.expenses.create') }}"
           class="bg-blue-700 hover:bg-blue-800 text-white text-sm font-medium px-4 py-2 rounded-lg">
            + Record Expense
        </a>
        @endcan
    </div>

    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="text-left px-5 py-3 font-medium text-gray-600">Description</th>
                    <th class="text-left px-5 py-3 font-medium text-gray-600">Project</th>
                    <th class="text-left px-5 py-3 font-medium text-gray-600">Amount</th>
                    <th class="text-left px-5 py-3 font-medium text-gray-600">Date</th>
                    <th class="text-left px-5 py-3 font-medium text-gray-600">Status</th>
                    <th class="text-left px-5 py-3 font-medium text-gray-600">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($expenses as $expense)
                <tr class="hover:bg-gray-50">
                    <td class="px-5 py-3">
                        <p class="font-medium text-gray-800">{{ $expense->description }}</p>
                        <p class="text-xs text-gray-400">{{ $expense->payee }}</p>
                    </td>
                    <td class="px-5 py-3">
                        <a href="{{ route('admin.projects.show', $expense->project) }}"
                           class="text-blue-600 hover:underline text-xs">
                            {{ $expense->project->title }}
                        </a>
                    </td>
                    <td class="px-5 py-3 font-medium text-gray-800">
                        ₱{{ number_format($expense->amount, 2) }}
                    </td>
                    <td class="px-5 py-3 text-gray-500">
                        {{ $expense->expense_date->format('M d, Y') }}
                    </td>
                    <td class="px-5 py-3">
                        <span class="px-2 py-1 rounded-full text-xs font-medium
                            {{ $expense->status === 'approved' ? 'bg-green-100 text-green-700' : '' }}
                            {{ $expense->status === 'pending'  ? 'bg-yellow-100 text-yellow-700' : '' }}
                            {{ $expense->status === 'rejected' ? 'bg-red-100 text-red-700' : '' }}">
                            {{ ucfirst($expense->status) }}
                        </span>
                    </td>
                    <td class="px-5 py-3">
                        <div class="flex gap-2 items-center">
                            <a href="{{ route('admin.expenses.show', $expense) }}"
                               class="text-blue-600 hover:underline text-xs">View</a>

                            @can('approve expenses')
                            @if($expense->status === 'pending')
                            <form method="POST" action="{{ route('admin.expenses.approve', $expense) }}">
                                @csrf
                                <button class="text-green-600 hover:underline text-xs">Approve</button>
                            </form>
                            @endif
                            @endcan

                            @can('delete expenses')
                            <form method="POST" action="{{ route('admin.expenses.destroy', $expense) }}"
                                  onsubmit="return confirm('Delete this expense?')">
                                @csrf @method('DELETE')
                                <button class="text-red-500 hover:underline text-xs">Delete</button>
                            </form>
                            @endcan
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-5 py-8 text-center text-gray-400">No expenses recorded yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $expenses->links() }}
</div>
@endsection