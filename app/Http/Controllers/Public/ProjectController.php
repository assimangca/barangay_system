<?php
namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::with(['budgetAllocations', 'expenses', 'milestones']);

        if ($request->status) {
            $query->where('status', $request->status);
        }
        if ($request->search) {
            $query->search($request->search);
        }

        $projects = $query->latest()->paginate(9);
        return view('public.projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        $project->load(['budgetAllocations', 'expenses', 'milestones', 'documents', 'creator']);
        return view('public.projects.show', compact('project'));
    }
}