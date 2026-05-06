<?php
namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Models\Project;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function create()
    {
        $projects = Project::orderBy('title')->get();
        return view('public.complaints.create', compact('projects'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'nullable|email|max:255',
            'phone'       => 'nullable|string|max:20',
            'subject'     => 'required|string|max:255',
            'description' => 'required|string|min:10',
            'type'        => 'required|in:complaint,report,suggestion',
            'project_id'  => 'nullable|exists:projects,id',
            'attachment'  => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        if ($request->hasFile('attachment')) {
            $validated['attachment_path'] = $request->file('attachment')
                ->store('complaints', 'public');
        }

        $complaint = Complaint::create($validated);

        return redirect()->route('complaints.track')
            ->with('tracking_number', $complaint->tracking_number)
            ->with('success', 'Your complaint has been submitted successfully!');
    }

    public function track(Request $request)
    {
        $complaint = null;
        $error     = null;

        if ($request->tracking_number) {
            $complaint = Complaint::with('project')
                ->where('tracking_number', $request->tracking_number)
                ->first();
            if (!$complaint) {
                $error = 'Tracking number not found. Please check and try again.';
            }
        }

        return view('public.complaints.track', compact('complaint', 'error'));
    }
}