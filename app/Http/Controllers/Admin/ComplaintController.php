<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Models\User;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function index(Request $request)
    {
        $query = Complaint::with(['project', 'submitter', 'assignee'])->latest();

        if ($request->status) {
            $query->where('status', $request->status);
        }
        if ($request->type) {
            $query->where('type', $request->type);
        }
        if ($request->search) {
            $query->where(function($q) use ($request) {
                $q->where('subject', 'like', '%'.$request->search.'%')
                  ->orWhere('tracking_number', 'like', '%'.$request->search.'%')
                  ->orWhere('name', 'like', '%'.$request->search.'%');
            });
        }

        $complaints = $query->paginate(15);
        $officials  = User::role(['captain', 'treasurer', 'secretary'])->get();

        return view('admin.complaints.index', compact('complaints', 'officials'));
    }

    public function show(Complaint $complaint)
    {
        $complaint->load(['project', 'submitter', 'assignee']);
        $officials = User::role(['captain', 'treasurer', 'secretary'])->get();
        return view('admin.complaints.show', compact('complaint', 'officials'));
    }

    public function respond(Request $request, Complaint $complaint)
    {
        $request->validate([
            'admin_response' => 'required|string|min:5',
            'status'         => 'required|in:submitted,under_review,resolved,dismissed',
            'assigned_to'    => 'nullable|exists:users,id',
        ]);

        $complaint->update([
            'admin_response' => $request->admin_response,
            'status'         => $request->status,
            'assigned_to'    => $request->assigned_to,
            'resolved_at'    => $request->status === 'resolved' ? now() : null,
        ]);

        return back()->with('success', 'Response submitted successfully!');
    }

    public function destroy(Complaint $complaint)
    {
        $complaint->delete();
        return redirect()
            ->route('admin.complaints.index')
            ->with('success', 'Complaint deleted.');
    }

    // Required by resource but not used
    public function create()  { return redirect()->route('admin.complaints.index'); }
    public function store()   { return redirect()->route('admin.complaints.index'); }
    public function edit()    { return redirect()->route('admin.complaints.index'); }
    public function update()  { return redirect()->route('admin.complaints.index'); }
}