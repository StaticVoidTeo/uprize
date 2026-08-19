<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\View\View;

class PortfolioController extends Controller
{
    public function index(): View
    {
        $projects = Project::query()->published()->latest('published_at')->get();

        return view('portfolio.index', compact('projects'));
    }

    public function show(Project $project): View
    {
        abort_unless($project->isPublished(), 404);

        return view('portfolio.show', compact('project'));
    }
}
