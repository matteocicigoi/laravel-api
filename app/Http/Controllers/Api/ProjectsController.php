<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index() {

        request()->validate(['key' => ['nullable', 'string', 'min:3']]);

        if(request()->key) {
            $projects = Project::where('name', 'LIKE', '%' . request()->key . '%')->with('type', 'technologies')->paginate(8);
        }else{
            $projects = Project::with('type', 'technologies')->paginate(8);
        }
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
