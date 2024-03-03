<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Contract\ProjectRepositoryInterface;
use App\Contract\UserRepositoryInterface;
use App\Contract\TaskRepositoryInterface;


use App\Repositories\ProjectRepository;
use App\Repositories\UserRepository;
use App\Repositories\TaskRepository;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ProjectRepositoryInterface::class, ProjectRepository::class);
        $this->app->bind(TaskRepositoryInterface::class, TaskRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
