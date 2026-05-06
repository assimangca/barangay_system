<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\BudgetAllocation;
use App\Models\Expense;
use App\Models\Complaint;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function index()
    {
        $stats = [
            'total_projects'     => Project::count(),
            'ongoing_projects'   => Project::where('status', 'ongoing')->count(),
            'completed_projects' => Project::where('status', 'completed')->count(),
            'planned_projects'   => Project::where('status', 'planned')->count(),
            'total_budget'       => BudgetAllocation::sum('total_amount'),
            'total_spent'        => Expense::where('status', 'approved')->sum('amount'),
            'total_complaints'   => Complaint::count(),
            'resolved_complaints'=> Complaint::where('status', 'resolved')->count(),
        ];

        $projects = Project::with(['budgetAllocations', 'expenses'])
            ->latest()->get();

        return view('admin.reports.index', compact('stats', 'projects'));
    }

    public function generate(string $type)
    {
        $filename = 'barangay-' . $type . '-report-' . now()->format('Y-m-d') . '.pdf';

        switch ($type) {
            case 'projects':
                $data = [
                    'projects'      => Project::with(['budgetAllocations', 'expenses', 'milestones', 'creator'])->get(),
                    'generated_at'  => now(),
                    'generated_by'  => auth()->user()->name,
                ];
                $view = 'reports.projects';
                break;

            case 'budget':
                $data = [
                    'allocations'  => BudgetAllocation::with(['project', 'expenses', 'creator'])->get(),
                    'total_budget' => BudgetAllocation::sum('total_amount'),
                    'total_spent'  => Expense::where('status', 'approved')->sum('amount'),
                    'generated_at' => now(),
                    'generated_by' => auth()->user()->name,
                ];
                $view = 'reports.budget';
                break;

            case 'complaints':
                $data = [
                    'complaints'   => Complaint::with(['project', 'assignee'])->latest()->get(),
                    'generated_at' => now(),
                    'generated_by' => auth()->user()->name,
                ];
                $view = 'reports.complaints';
                break;

            default:
                return redirect()->route('admin.reports.index')
                    ->with('error', 'Invalid report type.');
        }

        $pdf = Pdf::loadView($view, $data)
            ->setPaper('a4', 'portrait');

        return $pdf->download($filename);
    }
}