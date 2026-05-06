<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model {
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title','description','status','location','category',
        'completion_percentage','start_date','end_date',
        'contractor','project_code','created_by',
    ];
    protected $casts = [
        'start_date'            => 'date',
        'end_date'              => 'date',
        'completion_percentage' => 'integer',
    ];

    public function creator()           { return $this->belongsTo(User::class, 'created_by'); }
    public function budgetAllocations() { return $this->hasMany(BudgetAllocation::class); }
    public function expenses()          { return $this->hasMany(Expense::class); }
    public function milestones()        { return $this->hasMany(ProjectMilestone::class)->orderBy('sort_order'); }
    public function documents()         { return $this->hasMany(ProjectDocument::class); }
    public function complaints()        { return $this->hasMany(Complaint::class); }

    public function getTotalBudgetAttribute(): float {
        return (float) $this->budgetAllocations->sum('total_amount');
    }
    public function getTotalSpentAttribute(): float {
        return (float) $this->expenses->where('status','approved')->sum('amount');
    }
    public function getRemainingBudgetAttribute(): float {
        return $this->total_budget - $this->total_spent;
    }
    public function getBudgetUtilizationAttribute(): float {
        if ($this->total_budget <= 0) return 0;
        return round(($this->total_spent / $this->total_budget) * 100, 2);
    }
    public function getBudgetStatusAttribute(): string {
        $p = $this->budget_utilization;
        if ($p >= 100) return 'over_budget';
        if ($p >= 90)  return 'critical';
        if ($p >= 75)  return 'warning';
        return 'ok';
    }
    public function getStatusColorAttribute(): string {
        return match($this->status) {
            'planned'   => 'blue',
            'ongoing'   => 'yellow',
            'completed' => 'green',
            'suspended' => 'red',
            default     => 'gray',
        };
    }
    public function recalculateCompletion(): void {
        $total = $this->milestones()->count();
        if ($total === 0) return;
        $done = $this->milestones()->where('is_completed', true)->count();
        $this->update(['completion_percentage' => (int) round(($done / $total) * 100)]);
    }
    public static function generateProjectCode(): string {
        $year  = now()->year;
        $count = static::whereYear('created_at', $year)->count() + 1;
        return 'BGY-' . $year . '-' . str_pad($count, 3, '0', STR_PAD_LEFT);
    }
    public function scopeSearch($query, string $term) {
        return $query->where(function($q) use ($term) {
            $q->where('title','like',"%{$term}%")
              ->orWhere('description','like',"%{$term}%")
              ->orWhere('location','like',"%{$term}%")
              ->orWhere('project_code','like',"%{$term}%");
        });
    }
}