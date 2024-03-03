<?php

namespace App\Contract;

use App\Models\Project;

interface ProjectRepositoryInterface 
{
    public function list();
    public function get(Project $project);
    public function tasks(Project $project);
    public function delete(Project $project);
    public function create(array $attributes);
    public function update(Project $project, array $attributes);
}