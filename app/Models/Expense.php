<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model {
    use HasFactory;

    protected $fillable = [
        'project_id','budget_allocation_id','recorded_by','approved_by',
        'description','payee','amount','expense_date',
        'status','receipt_path','receipt_number','remarks','approved_at',
    ];
    protected $casts = ['amount' => 'float', 'expense_date' => 'date', 'approved_at' => 'datetime'];

    public function project()          { return $this->belongsTo(Project::class); }
    public function budgetAllocation() { return $this->belongsTo(BudgetAllocation::class); }
    public function recorder()         { return $this->belongsTo(User::class, 'recorded_by'); }
    public function approver()         { return $this->belongsTo(User::class, 'approved_by'); }

    public function approve(User $approver): void {
        $this->update(['status' => 'approved', 'approved_by' => $approver->id, 'approved_at' => now()]);
    }
    public function reject(string $remarks): void {
        $this->update(['status' => 'rejected', 'remarks' => $remarks]);
    }
    public function scopeApproved($query) { return $query->where('status','approved'); }
    public function scopePending($query)  { return $query->where('status','pending'); }
}