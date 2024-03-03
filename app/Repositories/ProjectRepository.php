<?php

namespace App\Repositories;

use App\Contract\ProjectRepositoryInterface;
use App\Models\Project;

use Illuminate\Support\Facades\Log;

class ProjectRepository implements ProjectRepositoryInterface 
{
    public function list() {
        return Project::all()->select('id','name')->toArray();
    }

    public function get(Project $project) {
        return $project;
    }

    public function tasks(Project $project) {
        return $project->tasks()->orderBy('priority')->get();
    }

    public function create(array $attributes) {
        return Project::create($attributes);
    }

    public function update(Project $project, array $attributes) {
        return $project->update($attributes);
    }

    public function delete(Project $project) {
        return $project->delete();
    }
}