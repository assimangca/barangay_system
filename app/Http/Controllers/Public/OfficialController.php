<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Official;
use Illuminate\Http\Request;

class OfficialController extends Controller
{
   public function index()
{
    // Fetch all officials, ordered by priority
    $officials = \App\Models\Official::orderBy('order_priority', 'asc')->get();
    
    return view('public.officials.index', compact('officials'));
}
}