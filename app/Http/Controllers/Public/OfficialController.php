<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Official;

class OfficialController extends Controller
{
    public function index()
    {
        $officials = Official::where('is_active', true)->orderBy('rank', 'asc')->get();
        
        return view('public.officials.index', compact('officials'));
    }
}