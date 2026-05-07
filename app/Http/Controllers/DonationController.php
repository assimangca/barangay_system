<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DonationController extends Controller
{
    public function index()
    {
        $donations = Donation::latest()->get();
        $totalDonations = Donation::where('status', 'verified')->sum('amount');
        $totalDonors = Donation::where('status', 'verified')->count();
        $pendingDonations = Donation::where('status', 'pending')->count();
        return view('donations.index', compact(
            'donations',
            'totalDonations',
            'totalDonors',
            'pendingDonations'
        ));
    }

    public function create()
    {
        return view('donations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'donor_name'     => 'required|string|max:255',
            'donor_email'    => 'required|email|max:255',
            'donor_phone'    => 'nullable|string|max:20',
            'project_name'   => 'required|string|max:255',
            'purpose'        => 'required|string',
            'amount'         => 'required|numeric|min:1',
            'payment_method' => 'required|in:gcash,bank_transfer,cash',
            'proof_of_payment' => 'nullable|file|mimes:jpg,png,pdf|max:2048',
            'message'        => 'nullable|string',
        ]);

        $path = null;
        if ($request->hasFile('proof_of_payment')) {
            $path = $request->file('proof_of_payment')
                            ->store('donation_proofs', 'public');
        }

        $donation = Donation::create([
            'donor_name'       => $request->donor_name,
            'donor_email'      => $request->donor_email,
            'donor_phone'      => $request->donor_phone,
            'project_name'     => $request->project_name,
            'purpose'          => $request->purpose,
            'amount'           => $request->amount,
            'reference_number' => 'DON-' . strtoupper(Str::random(8)),
            'payment_method'   => $request->payment_method,
            'status'           => 'pending',
            'proof_of_payment' => $path,
            'message'          => $request->message,
        ]);

        return redirect()->route('donations.thank-you', $donation)
                         ->with('success', 'Donation submitted successfully!');
    }

    public function show(Donation $donation)
    {
        return view('donations.show', compact('donation'));
    }

    public function thankYou(Donation $donation)
    {
        return view('donations.thank-you', compact('donation'));
    }

    public function track(Request $request)
    {
        $donation = null;
        if ($request->has('reference_number')) {
            $donation = Donation::where('reference_number', $request->reference_number)->first();
        }
        return view('donations.track', compact('donation'));
    }

    public function adminIndex()
    {
        $donations = Donation::latest()->get();
        $totalAmount = Donation::where('status', 'verified')->sum('amount');
        $totalDonors = Donation::where('status', 'verified')->count();
        $pendingCount = Donation::where('status', 'pending')->count();
        return view('donations.admin', compact(
            'donations',
            'totalAmount',
            'totalDonors',
            'pendingCount'
        ));
    }

    public function verify(Request $request, Donation $donation)
    {
        $request->validate([
            'status'      => 'required|in:verified,rejected',
            'admin_notes' => 'nullable|string',
        ]);

        $donation->update([
            'status'      => $request->status,
            'admin_notes' => $request->admin_notes,
            'verified_at' => $request->status === 'verified' ? now() : null,
        ]);

        return redirect()->route('admin.donations.index')
                         ->with('success', 'Donation status updated successfully!');
    }
}