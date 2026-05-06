<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; color: #333; margin: 0; padding: 20px; }
        .header { text-align: center; border-bottom: 2px solid #166534; padding-bottom: 15px; margin-bottom: 20px; }
        .header h1 { font-size: 18px; color: #166534; margin: 0 0 5px 0; }
        .header p { margin: 2px 0; color: #666; font-size: 11px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th { background: #166534; color: white; padding: 8px; text-align: left; font-size: 11px; }
        td { padding: 7px 8px; border-bottom: 1px solid #e5e7eb; font-size: 11px; }
        tr:nth-child(even) td { background: #f9fafb; }
        .total-row td { font-weight: bold; background: #f0fdf4; border-top: 2px solid #166534; }
        .footer { text-align: center; font-size: 10px; color: #9ca3af; border-top: 1px solid #e5e7eb; padding-top: 10px; margin-top: 20px; }
        .summary { margin-bottom: 20px; padding: 12px; background: #f0fdf4; border: 1px solid #bbf7d0; border-radius: 6px; }
        .summary h3 { margin: 0 0 8px 0; color: #166534; font-size: 13px; }
        .summary-grid { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 10px; }
        .summary-item .label { font-size: 10px; color: #6b7280; }
        .summary-item .value { font-size: 16px; font-weight: bold; color: #166534; }
    </style>
</head>
<body>

<div class="header">
    <h1>BARANGAY BUDGET UTILIZATION REPORT</h1>
    <p>Transparency Report — Official Document</p>
    <p>Generated: {{ $generated_at->format('F d, Y h:i A') }} | By: {{ $generated_by }}</p>
</div>

<div class="summary">
    <h3>Summary</h3>
    <table style="margin:0">
        <tr>
            <td><strong>Total Budget Allocated:</strong></td>
            <td>₱{{ number_format($total_budget, 2) }}</td>
            <td><strong>Total Spent:</strong></td>
            <td>₱{{ number_format($total_spent, 2) }}</td>
            <td><strong>Remaining:</strong></td>
            <td>₱{{ number_format($total_budget - $total_spent, 2) }}</td>
        </tr>
    </table>
</div>

<table>
    <thead>
        <tr>
            <th>Project</th>
            <th>Fund Source</th>
            <th>Fiscal Year</th>
            <th>Total Allocated (₱)</th>
            <th>Total Spent (₱)</th>
            <th>Remaining (₱)</th>
            <th>Utilization %</th>
        </tr>
    </thead>
    <tbody>
        @forelse($allocations as $allocation)
        <tr>
            <td>{{ $allocation->project->title }}</td>
            <td>{{ $allocation->fund_source }}</td>
            <td>{{ $allocation->fiscal_year }}</td>
            <td>{{ number_format($allocation->total_amount, 2) }}</td>
            <td>{{ number_format($allocation->total_spent, 2) }}</td>
            <td>{{ number_format($allocation->remaining_amount, 2) }}</td>
            <td>{{ $allocation->utilization_percent }}%</td>
        </tr>
        @empty
        <tr><td colspan="7" style="text-align:center">No budget allocations found.</td></tr>
        @endforelse
        <tr class="total-row">
            <td colspan="3">TOTAL</td>
            <td>₱{{ number_format($total_budget, 2) }}</td>
            <td>₱{{ number_format($total_spent, 2) }}</td>
            <td>₱{{ number_format($total_budget - $total_spent, 2) }}</td>
            <td>{{ $total_budget > 0 ? round(($total_spent / $total_budget) * 100, 1) : 0 }}%</td>
        </tr>
    </tbody>
</table>

<div class="footer">
    This is an official budget report of the Barangay. Generated on {{ $generated_at->format('F d, Y') }}.
</div>

</body>
</html>