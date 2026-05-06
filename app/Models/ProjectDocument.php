<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProjectDocument extends Model {
    use HasFactory;

    protected $fillable = ['project_id','uploaded_by','title','file_path','file_name','mime_type','file_size','type'];
    protected $casts    = ['file_size' => 'integer'];

    public function project()  { return $this->belongsTo(Project::class); }
    public function uploader() { return $this->belongsTo(User::class, 'uploaded_by'); }

    public function getUrlAttribute(): string {
        return Storage::url($this->file_path);
    }
    public function getFormattedSizeAttribute(): string {
        $b = $this->file_size ?? 0;
        if ($b >= 1048576) return round($b / 1048576, 2) . ' MB';
        if ($b >= 1024)    return round($b / 1024, 2) . ' KB';
        return $b . ' B';
    }
    public function isImage(): bool {
        return str_starts_with($this->mime_type ?? '', 'image/');
    }
}