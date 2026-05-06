<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectMilestone extends Model {
    use HasFactory;

    protected $fillable = ['project_id','title','description','due_date','is_completed','completed_at','sort_order'];
    protected $casts    = ['due_date' => 'date', 'is_completed' => 'boolean', 'completed_at' => 'datetime'];

    public function project() { return $this->belongsTo(Project::class); }

    public function markComplete(): void {
        $this->update(['is_completed' => true, 'completed_at' => now()]);
        $this->project->recalculateCompletion();
    }
    public function markIncomplete(): void {
        $this->update(['is_completed' => false, 'completed_at' => null]);
        $this->project->recalculateCompletion();
    }
    public function isOverdue(): bool {
        return !$this->is_completed && $this->due_date && $this->due_date->isPast();
    }
}