<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BudgetAllocation;
use App\Models\Project;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    public function index()
    {
        $allocations = BudgetAllocation::with(['project', 'expenses', 'creator'])
            ->latest()
            ->paginate(10);

        return view('admin.budgets.index', compact('allocations'));
    }

    public function create(Request $request)
    {
        $projects = Project::orderBy('title')->get();
        $selectedProject = $request->project_id
            ? Project::find($request->project_id)
            : null;
        $fundSources = BudgetAllocation::fundSources();

        return view('admin.budgets.create', compact('projects', 'selectedProject', 'fundSources'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'project_id'   => 'required|exists:projects,id',
            'fund_source'  => 'required|string|max:255',
            'total_amount' => 'required|numeric|min:1',
            'fiscal_year'  => 'required|integer|min:2000|max:2099',
            'notes'        => 'nullable|string',
        ]);

        $validated['created_by'] = auth()->id();
        BudgetAllocation::create($validated);

        return redirect()
            ->route('admin.projects.show', $validated['project_id'])
            ->with('success', 'Budget allocation added successfully!');
    }

    public function show(BudgetAllocation $budget)
    {
        $budget->load(['project', 'expenses.recorder', 'creator']);
        return view('admin.budgets.show', compact('budget'));
    }

    public function edit(BudgetAllocation $budget)
    {
        $projects    = Project::orderBy('title')->get();
        $fundSources = BudgetAllocation::fundSources();
        return view('admin.budgets.edit', compact('budget', 'projects', 'fundSources'));
    }

    public function update(Request $request, BudgetAllocation $budget)
    {
        $validated = $request->validate([
            'fund_source'  => 'required|string|max:255',
            'total_amount' => 'required|numeric|min:1',
            'fiscal_year'  => 'required|integer|min:2000|max:2099',
            'notes'        => 'nullable|string',
        ]);

        $budget->update($validated);

        return redirect()
            ->route('admin.projects.show', $budget->project_id)
            ->with('success', 'Budget updated successfully!');
    }

    public function destroy(BudgetAllocation $budget)
    {
        $projectId = $budget->project_id;
        $budget->delete();

        return redirect()
            ->route('admin.projects.show', $projectId)
            ->with('success', 'Budget allocation deleted.');
    }
}