<?php

namespace App\Contract;

use App\Models\Task;

interface TaskRepositoryInterface 
{
    public function list();
    public function get(Task $task);
    public function delete(Task $task);
    public function create(array $attributes);
    public function update(Task $task, array $attributes);
    public function reorder(array $attributes);
}