<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Official extends Model
{
    protected $fillable = [
        'name', 
        'position', 
        'committee', 
        'photo_path', 
        'rank', 
        'is_active'
    ];
}