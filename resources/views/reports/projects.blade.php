<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; color: #333; margin: 0; padding: 20px; }
        .header { text-align: center; border-bottom: 2px solid #1e3a8a; padding-bottom: 15px; margin-bottom: 20px; }
        .header h1 { font-size: 18px; color: #1e3a8a; margin: 0 0 5px 0; }
        .header p { margin: 2px 0; color: #666; font-size: 11px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th { background: #1e3a8a; color: white; padding: 8px; text-align: left; font-size: 11px; }
        td { padding: 7px 8px; border-bottom: 1px solid #e5e7eb; font-size: 11px; }
        tr:nth-child(even) td { background: #f9fafb; }
        .status { padding: 2px 8px; border-radius: 10px; font-size: 10px; font-weight: bold; }
        .status-ongoing   { background: #fef3c7; color: #92400e; }
        .status-completed { background: #d1fae5; color: #065f46; }
        .status-planned   { background: #dbeafe; color: #1e40af; }
        .status-suspended { background: #fee2e2; color: #991b1b; }
        .footer { text-align: center; font-size: 10px; color: #9ca3af; border-top: 1px solid #e5e7eb; padding-top: 10px; margin-top: 20px; }
        .summary { display: flex; gap: 15px; margin-bottom: 20px; }
        .summary-box { flex: 1; border: 1px solid #e5e7eb; border-radius: 6px; padding: 10px; text-align: center; }
        .summary-box .value { font-size: 20px; font-weight: bold; color: #1e3a8a; }
        .summary-box .label { font-size: 10px; color: #6b7280; margin-top: 2px; }
    </style>
</head>
<body>

<div class="header">
    <h1>BARANGAY PROJECT STATUS REPORT</h1>
    <p>Transparency Report — Official Document</p>
    <p>Generated: {{ $generated_at->format('F d, Y h:i A') }} | By: {{ $generated_by }}</p>
</div>

<table>
    <thead>
        <tr>
            <th>Code</th>
            <th>Project Title</th>
            <th>Status</th>
            <th>Location</th>
            <th>Progress</th>
            <th>Budget (₱)</th>
            <th>Spent (₱)</th>
            <th>Remaining (₱)</th>
        </tr>
    </thead>
    <tbody>
        @forelse($projects as $project)
        <tr>
            <td>{{ $project->project_code }}</td>
            <td><strong>{{ $project->title }}</strong></td>
            <td>
                <span class="status status-{{ $project->status }}">
                    {{ ucfirst($project->status) }}
                </span>
            </td>
            <td>{{ $project->location ?? '—' }}</td>
            <td>{{ $project->completion_percentage }}%</td>
            <td>{{ number_format($project->total_budget, 2) }}</td>
            <td>{{ number_format($project->total_spent, 2) }}</td>
            <td>{{ number_format($project->remaining_budget, 2) }}</td>
        </tr>
        @empty
        <tr><td colspan="8" style="text-align:center">No projects found.</td></tr>
        @endforelse
    </tbody>
</table>

<div class="footer">
    This is an official transparency report of the Barangay. Generated on {{ $generated_at->format('F d, Y') }}.
</div>

</body>
</html>