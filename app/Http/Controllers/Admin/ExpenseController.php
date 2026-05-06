<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use App\Models\Project;
use App\Models\BudgetAllocation;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::with(['project', 'budgetAllocation', 'recorder', 'approver'])
            ->latest()
            ->paginate(15);

        return view('admin.expenses.index', compact('expenses'));
    }

    public function create(Request $request)
    {
        $projects    = Project::orderBy('title')->get();
        $allocations = collect();

        if ($request->project_id) {
            $allocations = BudgetAllocation::where('project_id', $request->project_id)->get();
        }

        return view('admin.expenses.create', compact('projects', 'allocations'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'project_id'           => 'required|exists:projects,id',
            'budget_allocation_id' => 'required|exists:budget_allocations,id',
            'description'          => 'required|string|max:255',
            'payee'                => 'nullable|string|max:255',
            'amount'               => 'required|numeric|min:0.01',
            'expense_date'         => 'required|date',
            'receipt_number'       => 'nullable|string|max:255',
            'remarks'              => 'nullable|string',
            'receipt'              => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        if ($request->hasFile('receipt')) {
            $validated['receipt_path'] = $request->file('receipt')
                ->store('receipts', 'public');
        }

        $validated['recorded_by'] = auth()->id();
        unset($validated['receipt']);

        Expense::create($validated);

        return redirect()
            ->route('admin.expenses.index')
            ->with('success', 'Expense recorded successfully!');
    }

    public function show(Expense $expense)
    {
        $expense->load(['project', 'budgetAllocation', 'recorder', 'approver']);
        return view('admin.expenses.show', compact('expense'));
    }

    public function edit(Expense $expense)
    {
        $projects    = Project::orderBy('title')->get();
        $allocations = BudgetAllocation::where('project_id', $expense->project_id)->get();
        return view('admin.expenses.edit', compact('expense', 'projects', 'allocations'));
    }

    public function update(Request $request, Expense $expense)
    {
        $validated = $request->validate([
            'description'    => 'required|string|max:255',
            'payee'          => 'nullable|string|max:255',
            'amount'         => 'required|numeric|min:0.01',
            'expense_date'   => 'required|date',
            'receipt_number' => 'nullable|string|max:255',
            'remarks'        => 'nullable|string',
        ]);

        $expense->update($validated);

        return redirect()
            ->route('admin.expenses.index')
            ->with('success', 'Expense updated successfully!');
    }

    public function destroy(Expense $expense)
    {
        $expense->delete();
        return redirect()
            ->route('admin.expenses.index')
            ->with('success', 'Expense deleted.');
    }

    public function approve(Expense $expense)
    {
        $expense->approve(auth()->user());
        return back()->with('success', 'Expense approved!');
    }

    public function reject(Request $request, Expense $expense)
    {
        $request->validate(['remarks' => 'required|string']);
        $expense->reject($request->remarks);
        return back()->with('success', 'Expense rejected.');
    }

    // Get allocations for a project (AJAX)
    public function getAllocations(Request $request)
    {
        $allocations = BudgetAllocation::where('project_id', $request->project_id)
            ->get(['id', 'fund_source', 'total_amount', 'fiscal_year']);
        return response()->json($allocations);
    }
}