<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectMilestone;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::withCount('complaints')
            ->with(['budgetAllocations', 'expenses'])
            ->latest()
            ->paginate(10);

        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'                  => 'required|string|max:255',
            'description'            => 'required|string',
            'status'                 => 'required|in:planned,ongoing,completed,suspended',
            'location'               => 'nullable|string|max:255',
            'category'               => 'nullable|string|max:255',
            'start_date'             => 'nullable|date',
            'end_date'               => 'nullable|date|after_or_equal:start_date',
            'contractor'             => 'nullable|string|max:255',
            'completion_percentage'  => 'nullable|integer|min:0|max:100',
        ]);

        $validated['created_by']    = auth()->id();
        $validated['project_code']  = Project::generateProjectCode();

        $project = Project::create($validated);

        return redirect()
            ->route('admin.projects.show', $project)
            ->with('success', 'Project created successfully!');
    }

    public function show(Project $project)
    {
        $project->load([
            'budgetAllocations.expenses',
            'milestones',
            'documents',
            'complaints',
            'creator',
        ]);

        return view('admin.projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title'                 => 'required|string|max:255',
            'description'           => 'required|string',
            'status'                => 'required|in:planned,ongoing,completed,suspended',
            'location'              => 'nullable|string|max:255',
            'category'              => 'nullable|string|max:255',
            'start_date'            => 'nullable|date',
            'end_date'              => 'nullable|date|after_or_equal:start_date',
            'contractor'            => 'nullable|string|max:255',
            'completion_percentage' => 'nullable|integer|min:0|max:100',
        ]);

        $project->update($validated);

        return redirect()
            ->route('admin.projects.show', $project)
            ->with('success', 'Project updated successfully!');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project deleted successfully!');
    }

    // ── Milestones ─────────────────────────────────────────────────────────

    public function storeMilestone(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date'    => 'nullable|date',
        ]);

        $validated['sort_order'] = $project->milestones()->count() + 1;
        $project->milestones()->create($validated);
        $project->recalculateCompletion();

        return back()->with('success', 'Milestone added!');
    }

    public function toggleMilestone(ProjectMilestone $milestone)
    {
        if ($milestone->is_completed) {
            $milestone->markIncomplete();
        } else {
            $milestone->markComplete();
        }

        return back()->with('success', 'Milestone updated!');
    }

    public function destroyMilestone(ProjectMilestone $milestone)
    {
        $project = $milestone->project;
        $milestone->delete();
        $project->recalculateCompletion();

        return back()->with('success', 'Milestone deleted!');
    }
}