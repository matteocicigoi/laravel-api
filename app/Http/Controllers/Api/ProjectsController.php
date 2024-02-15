<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index() {
        $projects = Project::with('type', 'technologies')->paginate(12);
        return response()->json([
                'success' => true,
                'results' => $projects
            ]);
    }
}
