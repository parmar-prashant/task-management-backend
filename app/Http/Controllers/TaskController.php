<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

use App\Contract\TaskRepositoryInterface;
use App\Traits\ApiResponseTrait;

use Illuminate\Support\Facades\Log;

use App\Models\Task;

class TaskController extends Controller
{
    use ApiResponseTrait;

    public function __construct(private TaskRepositoryInterface $repository) {}

    /**
     * Get the list of tasks
     */
    public function list() {
        try {
            $tasks = $this->repository->list();
            return $this->success('Task list', $tasks);
        } catch(Exception $e) {
            return $this->failure($e->getMessage(), 500);
        }
    }

    /**
     * Create a new task record
     */
    public function create(Request $request) {
        try {
            $attributes = $request->only([
                'name',
                'project_id'
            ]);
            $createdTask = $this->repository->create($attributes);
            return $this->success('Task created', $createdTask->toArray());
        } catch(Exception $e) {
            $this->failure($e->getMessage(), 500);
        }
    }

    /**
     * Update a task record
     */
    public function update(Task $task, Request $request) {
        try {
            $attributes = $request->only([
                'name',
                'project_id'
            ]);
            $updatedTask = $this->repository->update($task, $attributes);
            return $this->success('Task updated', []);
        } catch(Exception $e) {
            $this->failure($e->getMessage(), 500);
        }
    }

    /**
     * Reorder the task for a given project
     */
    public function reorder(Request $request) {
        try {
            $updatedTasks = $this->repository->reorder($request->all());
            Log::info($updatedTasks);
            return $this->success('Tasks reordered', []);
        } catch(Exception $e) {
            $this->failure($e->getMessage(), 500);
        }
    }

    /**
     * Delete a task record
     */
    public function delete(Task $task) {
        try {
            $deletedTask = $this->repository->delete($task);
            return $this->success('Task updated', []);
        } catch(Exception $e) {
            $this->failure($e->getMessage(), 500);
        }
    }
}
