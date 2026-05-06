<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model {
    use HasFactory;

    protected $fillable = [
        'tracking_number','submitted_by','name','email','phone',
        'subject','description','type','project_id','attachment_path',
        'status','admin_response','assigned_to','resolved_at',
    ];
    protected $casts = ['resolved_at' => 'datetime'];

    protected static function boot(): void {
        parent::boot();
        static::creating(function (Complaint $c) {
            $c->tracking_number = static::generateTrackingNumber();
        });
    }
    public static function generateTrackingNumber(): string {
        do {
            $number = 'BGY-' . now()->format('Ym') . '-' . strtoupper(substr(uniqid(), -5));
        } while (static::where('tracking_number', $number)->exists());
        return $number;
    }

    public function submitter() { return $this->belongsTo(User::class, 'submitted_by'); }
    public function project()   { return $this->belongsTo(Project::class); }
    public function assignee()  { return $this->belongsTo(User::class, 'assigned_to'); }

    public function getSubmitterNameAttribute(): string {
        return $this->submitter?->name ?? $this->name ?? 'Anonymous';
    }
    public function getStatusColorAttribute(): string {
        return match($this->status) {
            'submitted'    => 'blue',
            'under_review' => 'yellow',
            'resolved'     => 'green',
            'dismissed'    => 'gray',
            default        => 'gray',
        };
    }
    public function getStatusLabelAttribute(): string {
        return match($this->status) {
            'submitted'    => 'Submitted',
            'under_review' => 'Under Review',
            'resolved'     => 'Resolved',
            'dismissed'    => 'Dismissed',
            default        => ucfirst($this->status),
        };
    }
    public function scopePending($query)  { return $query->whereIn('status',['submitted','under_review']); }
    public function scopeResolved($query) { return $query->where('status','resolved'); }
}