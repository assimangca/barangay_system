<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; color: #333; margin: 0; padding: 20px; }
        .header { text-align: center; border-bottom: 2px solid #c2410c; padding-bottom: 15px; margin-bottom: 20px; }
        .header h1 { font-size: 18px; color: #c2410c; margin: 0 0 5px 0; }
        .header p { margin: 2px 0; color: #666; font-size: 11px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th { background: #c2410c; color: white; padding: 8px; text-align: left; font-size: 11px; }
        td { padding: 7px 8px; border-bottom: 1px solid #e5e7eb; font-size: 11px; }
        tr:nth-child(even) td { background: #f9fafb; }
        .status { padding: 2px 8px; border-radius: 10px; font-size: 10px; font-weight: bold; }
        .status-submitted    { background: #dbeafe; color: #1e40af; }
        .status-under_review { background: #fef3c7; color: #92400e; }
        .status-resolved     { background: #d1fae5; color: #065f46; }
        .status-dismissed    { background: #f3f4f6; color: #374151; }
        .footer { text-align: center; font-size: 10px; color: #9ca3af; border-top: 1px solid #e5e7eb; padding-top: 10px; margin-top: 20px; }
    </style>
</head>
<body>

<div class="header">
    <h1>BARANGAY COMPLAINTS & REPORTS SUMMARY</h1>
    <p>Transparency Report — Official Document</p>
    <p>Generated: {{ $generated_at->format('F d, Y h:i A') }} | By: {{ $generated_by }}</p>
</div>

<table>
    <thead>
        <tr>
            <th>Tracking #</th>
            <th>Subject</th>
            <th>Type</th>
            <th>Submitted By</th>
            <th>Status</th>
            <th>Date</th>
            <th>Resolved</th>
        </tr>
    </thead>
    <tbody>
        @forelse($complaints as $complaint)
        <tr>
            <td><strong>{{ $complaint->tracking_number }}</strong></td>
            <td>{{ $complaint->subject }}</td>
            <td>{{ ucfirst($complaint->type) }}</td>
            <td>{{ $complaint->submitter_name }}</td>
            <td>
                <span class="status status-{{ $complaint->status }}">
                    {{ $complaint->status_label }}
                </span>
            </td>
            <td>{{ $complaint->created_at->format('M d, Y') }}</td>
            <td>{{ $complaint->resolved_at?->format('M d, Y') ?? '—' }}</td>
        </tr>
        @empty
        <tr><td colspan="7" style="text-align:center">No complaints found.</td></tr>
        @endforelse
    </tbody>
</table>

<div class="footer">
    This is an official complaints report of the Barangay. Generated on {{ $generated_at->format('F d, Y') }}.
</div>

</body>
</html>