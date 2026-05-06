<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetAllocation extends Model {
    use HasFactory;

    protected $fillable = ['project_id','fund_source','total_amount','fiscal_year','notes','created_by'];
    protected $casts    = ['total_amount' => 'float', 'fiscal_year' => 'integer'];

    public function project()  { return $this->belongsTo(Project::class); }
    public function expenses() { return $this->hasMany(Expense::class); }
    public function creator()  { return $this->belongsTo(User::class, 'created_by'); }

    public function getTotalSpentAttribute(): float {
        return (float) $this->expenses->where('status','approved')->sum('amount');
    }
    public function getRemainingAmountAttribute(): float {
        return $this->total_amount - $this->total_spent;
    }
    public function getUtilizationPercentAttribute(): float {
        if ($this->total_amount <= 0) return 0;
        return round(($this->total_spent / $this->total_amount) * 100, 2);
    }
    public static function fundSources(): array {
        return [
            'IRA'          => 'Internal Revenue Allotment (IRA)',
            'SEF'          => 'Special Education Fund (SEF)',
            'LGSF'         => 'Local Government Support Fund (LGSF)',
            'GAD'          => 'Gender and Development Fund (GAD)',
            'DRRMF'        => 'Disaster Risk Reduction Fund',
            'Donation'     => 'Donation / Grant',
            'Special Fund' => 'Special Fund',
            'Others'       => 'Others',
        ];
    }
}