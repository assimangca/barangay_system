@extends('layouts.admin')
@section('title', 'Record Expense')
@section('page-title', 'Record Expense')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-xl border border-gray-200 p-6">
        <form method="POST" action="{{ route('admin.expenses.store') }}"
              enctype="multipart/form-data" class="space-y-5">
            @csrf

            {{-- Project --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Project *</label>
                <select name="project_id" id="project_id" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                        onchange="loadAllocations(this.value)">
                    <option value="">Select a project...</option>
                    @foreach($projects as $project)
                    <option value="{{ $project->id }}" {{ old('project_id') == $project->id ? 'selected' : '' }}>
                        {{ $project->title }}
                    </option>
                    @endforeach
                </select>
                @error('project_id')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            {{-- Budget Allocation --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Budget Allocation *</label>
                <select name="budget_allocation_id" id="budget_allocation_id" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Select project first...</option>
                    @foreach($allocations as $allocation)
                    <option value="{{ $allocation->id }}">
                        {{ $allocation->fund_source }} — ₱{{ number_format($allocation->total_amount, 2) }} (FY {{ $allocation->fiscal_year }})
                    </option>
                    @endforeach
                </select>
                @error('budget_allocation_id')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            {{-- Description --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Description *</label>
                <input type="text" name="description" value="{{ old('description') }}" required
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('description')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="grid grid-cols-2 gap-5">
                {{-- Payee --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Payee</label>
                    <input type="text" name="payee" value="{{ old('payee') }}"
                           placeholder="Who received payment"
                           class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                {{-- Receipt Number --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Receipt Number</label>
                    <input type="text" name="receipt_number" value="{{ old('receipt_number') }}"
                           class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                {{-- Amount --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Amount (₱) *</label>
                    <input type="number" name="amount" value="{{ old('amount') }}"
                           step="0.01" min="0.01" required
                           class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('amount')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                {{-- Date --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Expense Date *</label>
                    <input type="date" name="expense_date"
                           value="{{ old('expense_date', now()->format('Y-m-d')) }}" required
                           class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('expense_date')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
            </div>

            {{-- Receipt Upload --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Receipt (optional)</label>
                <input type="file" name="receipt" accept=".jpg,.jpeg,.png,.pdf"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm">
                <p class="text-xs text-gray-400 mt-1">JPG, PNG or PDF. Max 2MB.</p>
            </div>

            {{-- Remarks --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Remarks</label>
                <textarea name="remarks" rows="2"
                          class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('remarks') }}</textarea>
            </div>

            <div class="flex gap-3 pt-2">
                <button type="submit"
                        class="bg-blue-700 hover:bg-blue-800 text-white font-medium px-6 py-2.5 rounded-lg text-sm">
                    Record Expense
                </button>
                <a href="{{ route('admin.expenses.index') }}"
                   class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium px-6 py-2.5 rounded-lg text-sm">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>

<script>
function loadAllocations(projectId) {
    const select = document.getElementById('budget_allocation_id');
    select.innerHTML = '<option value="">Loading...</option>';

    if (!projectId) {
        select.innerHTML = '<option value="">Select project first...</option>';
        return;
    }

    fetch(`{{ route('admin.expenses.allocations') }}?project_id=${projectId}`)
        .then(r => r.json())
        .then(data => {
            select.innerHTML = '<option value="">Select allocation...</option>';
            data.forEach(a => {
                select.innerHTML += `<option value="${a.id}">
                    ${a.fund_source} — ₱${Number(a.total_amount).toLocaleString()} (FY ${a.fiscal_year})
                </option>`;
            });
        });
}
</script>
@endsection