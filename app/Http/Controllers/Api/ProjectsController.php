<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index() {
        $projects = Project::with('type', 'technologies')->paginate(8);
        return response()->json([
                'success' => true,
                'results' => $projects
            ]);
    }
    public function show(string $slug) {
        $projects = Project::where('slug', $slug)->with('type', 'technologies')->first();
        return response()->json($projects);
    }
}
