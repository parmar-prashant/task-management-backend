<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/**
 * Project routes
 */
Route::get('/projects', [ProjectController::class, 'list']);
Route::get('/projects/{project}/tasks', [ProjectController::class, 'tasks']);
Route::post('/projects', [ProjectController::class, 'create']);

/**
 * Task routes
 */
Route::put('/tasks/reorder', [TaskController::class, 'reorder']);
Route::get('/tasks', [TaskController::class, 'list']);
Route::post('/tasks', [TaskController::class, 'create']);
Route::put('/tasks/{task}', [TaskController::class, 'update']);
Route::delete('/tasks/{task}', [TaskController::class, 'delete']);

/**
 * User routes
 */
Route::post('/authenticate', [UserController::class, 'authenticate']);
