<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable {
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = ['name','email','password','phone','is_active'];
    protected $hidden   = ['password','remember_token'];
    protected $casts    = [
        'email_verified_at' => 'datetime',
        'password'          => 'hashed',
        'is_active'         => 'boolean',
    ];

    public function projects()          { return $this->hasMany(Project::class, 'created_by'); }
    public function expenses()          { return $this->hasMany(Expense::class, 'recorded_by'); }
    public function complaints()        { return $this->hasMany(Complaint::class, 'submitted_by'); }
    public function assignedComplaints(){ return $this->hasMany(Complaint::class, 'assigned_to'); }
    public function auditLogs()         { return $this->hasMany(AuditLog::class); }

    public function isAdmin(): bool     { return $this->hasAnyRole(['captain','treasurer','secretary']); }
    public function isCaptain(): bool   { return $this->hasRole('captain'); }
    public function isTreasurer(): bool { return $this->hasRole('treasurer'); }
    public function isSecretary(): bool { return $this->hasRole('secretary'); }

    public function getDisplayRoleAttribute(): string {
        $role = $this->roles->first();
        return $role ? ucfirst($role->name) : 'Resident';
    }
}