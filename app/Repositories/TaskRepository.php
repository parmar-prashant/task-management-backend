<?php

namespace App\Repositories;

use App\Contract\TaskRepositoryInterface;
use App\Models\Task;

use Illuminate\Support\Facades\Log;

class TaskRepository implements TaskRepositoryInterface 
{
    public function list() {
        return Task::with('projects')
            ->select('id','project_id')
            ->orderBy('tasks.priority', 'desc')
            ->toSql();
    }

    public function get(Task $task) {
        return $task;
    }

    public function create(array $attributes) {
        $highestPriorityTask = Task::where('project_id', $attributes['project_id'])->max('priority');
        ($highestPriorityTask) ? $attributes['priority'] = $highestPriorityTask + 1 : $attributes['priority'] = 1;
        return Task::create($attributes);
    }

    public function update(Task $task, array $attributes) {
        return $task->update($attributes);
    }

    public function reorder(array $attributes) {
        Log::info($attributes);
        foreach($attributes as $index => $row) {
            Task::find($row['id'])->update(['priority' => $index+1]);
        }
    }

    public function delete(Task $task) {
        return $task->delete();
    }
}