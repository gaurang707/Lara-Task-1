<?php


use App\Http\Controllers\ProjectTaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProjectController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/ping', function (Request $request) {
    return "Hello very good";
});

Route::get('projects/{project}/tasks', [ProjectTaskController::class,'index'])->name('projects.tasks.index');
Route::get('projects', [ProjectController::class,'index'])->name('api.projects.index');
