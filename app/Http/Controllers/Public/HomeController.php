<?php
namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Project;

class HomeController extends Controller
{
    public function index()
    {
        $ongoing   = Project::where('status', 'ongoing')->latest()->take(3)->get();
        $completed = Project::where('status', 'completed')->latest()->take(3)->get();
        $planned   = Project::where('status', 'planned')->latest()->take(3)->get();
        $total_projects = Project::count();

        return view('public.home', compact('ongoing', 'completed', 'planned', 'total_projects'));
    }
}