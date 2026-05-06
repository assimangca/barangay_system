<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Complaint;
use App\Models\Expense;
use App\Models\BudgetAllocation;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_projects'    => Project::count(),
            'ongoing_projects'  => Project::where('status', 'ongoing')->count(),
            'completed_projects'=> Project::where('status', 'completed')->count(),
            'planned_projects'  => Project::where('status', 'planned')->count(),
            'total_budget'      => BudgetAllocation::sum('total_amount'),
            'total_spent'       => Expense::where('status', 'approved')->sum('amount'),
            'pending_complaints'=> Complaint::whereIn('status', ['submitted','under_review'])->count(),
            'resolved_complaints'=> Complaint::where('status', 'resolved')->count(),
            'pending_expenses'  => Expense::where('status', 'pending')->count(),
        ];

        $recent_projects   = Project::latest()->take(5)->get();
        $recent_complaints = Complaint::latest()->take(5)->get();
        $pending_expenses  = Expense::with(['project','recorder'])
                                ->where('status', 'pending')
                                ->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'stats', 'recent_projects', 'recent_complaints', 'pending_expenses'
        ));
    }
}