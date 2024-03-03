<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

use App\Contract\ProjectRepositoryInterface;
use App\Traits\ApiResponseTrait;

use App\Models\Project;

use Illuminate\Support\Facades\Log;

class ProjectController extends Controller
{
    use ApiResponseTrait;

    public function __construct(private ProjectRepositoryInterface $repository) {}

    /**
     * Get the list of projects
     */
    public function list() {
        try {
            $projects = $this->repository->list();
            return $this->success('Project list', $projects);
        } catch(Exception $e) {
            return $this->failure($e->getMessage(), 500);
        }
    }

    /**
     * Create a new project record
     */
    public function create(Request $request) {
        try {
            $attributes = $request->only([
                'name',
                'description'
            ]);
            $createdProject = $this->repository->create($attributes);
            return $this->success('Project created', $createdProject->toArray());
        } catch(Exception $e) {
            $this->failure($e->getMessage(), 500);
        }
    }

    /**
     * Get the tasks associated with a given project
     */
    public function tasks(Project $project) {
        try {
            $projectTasks = $this->repository->tasks($project);
            return $this->success('Project task list', $projectTasks->toArray());
        } catch(Exception $e) {
            $this->failure($e->getMessage(), 500);
        }
    }
}
