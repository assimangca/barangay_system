@extends('layouts.admin')
@section('title', 'Edit Budget Allocation')
@section('page-title', 'Edit Budget Allocation')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-xl border border-gray-200 p-6">
        <form method="POST" action="{{ route('admin.budgets.update', $budget) }}" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Project</label>
                <input type="text" value="{{ $budget->project->title }}" disabled
                       class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm bg-gray-50 text-gray-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Fund Source *</label>
                <select name="fund_source" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @foreach($fundSources as $key => $label)
                    <option value="{{ $key }}" {{ old('fund_source', $budget->fund_source) === $key ? 'selected' : '' }}>
                        {{ $label }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="grid grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Total Amount (₱) *</label>
                    <input type="number" name="total_amount"
                           value="{{ old('total_amount', $budget->total_amount) }}"
                           step="0.01" min="1" required
                           class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Fiscal Year *</label>
                    <input type="number" name="fiscal_year"
                           value="{{ old('fiscal_year', $budget->fiscal_year) }}"
                           min="2000" max="2099" required
                           class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Notes</label>
                <textarea name="notes" rows="3"
                          class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('notes', $budget->notes) }}</textarea>
            </div>

            <div class="flex gap-3 pt-2">
                <button type="submit"
                        class="bg-blue-700 hover:bg-blue-800 text-white font-medium px-6 py-2.5 rounded-lg text-sm">
                    Save Changes
                </button>
                <a href="{{ route('admin.budgets.index') }}"
                   class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium px-6 py-2.5 rounded-lg text-sm">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection