@extends('layouts.admin')
@section('title', 'Budget Allocations')
@section('page-title', 'Budget Allocations')

@section('content')
<div class="space-y-4">
    <div class="flex items-center justify-between">
        <p class="text-sm text-gray-500">{{ $allocations->total() }} allocations</p>
        @can('create budgets')
        <a href="{{ route('admin.budgets.create') }}"
           class="bg-blue-700 hover:bg-blue-800 text-white text-sm font-medium px-4 py-2 rounded-lg">
            + Add Allocation
        </a>
        @endcan
    </div>

    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="text-left px-5 py-3 font-medium text-gray-600">Project</th>
                    <th class="text-left px-5 py-3 font-medium text-gray-600">Fund Source</th>
                    <th class="text-left px-5 py-3 font-medium text-gray-600">Total Amount</th>
                    <th class="text-left px-5 py-3 font-medium text-gray-600">Spent</th>
                    <th class="text-left px-5 py-3 font-medium text-gray-600">Remaining</th>
                    <th class="text-left px-5 py-3 font-medium text-gray-600">FY</th>
                    <th class="text-left px-5 py-3 font-medium text-gray-600">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($allocations as $allocation)
                <tr class="hover:bg-gray-50">
                    <td class="px-5 py-3">
                        <a href="{{ route('admin.projects.show', $allocation->project) }}"
                           class="text-blue-600 hover:underline font-medium">
                            {{ $allocation->project->title }}
                        </a>
                    </td>
                    <td class="px-5 py-3 text-gray-700">{{ $allocation->fund_source }}</td>
                    <td class="px-5 py-3 font-medium text-gray-800">
                        ₱{{ number_format($allocation->total_amount, 2) }}
                    </td>
                    <td class="px-5 py-3 text-red-600">
                        ₱{{ number_format($allocation->total_spent, 2) }}
                    </td>
                    <td class="px-5 py-3 text-green-600 font-medium">
                        ₱{{ number_format($allocation->remaining_amount, 2) }}
                    </td>
                    <td class="px-5 py-3 text-gray-500">{{ $allocation->fiscal_year }}</td>
                    <td class="px-5 py-3">
                        <div class="flex gap-2">
                            @can('edit budgets')
                            <a href="{{ route('admin.budgets.edit', $allocation) }}"
                               class="text-gray-600 hover:underline text-xs">Edit</a>
                            @endcan
                            @can('delete budgets')
                            <form method="POST" action="{{ route('admin.budgets.destroy', $allocation) }}"
                                  onsubmit="return confirm('Delete this allocation?')">
                                @csrf @method('DELETE')
                                <button class="text-red-500 hover:underline text-xs">Delete</button>
                            </form>
                            @endcan
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-5 py-8 text-center text-gray-400">No budget allocations yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $allocations->links() }}
</div>
@endsection