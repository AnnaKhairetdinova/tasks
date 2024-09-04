<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [IndexController::class, 'index'])
    ->name('index');

Route::get('/register', [RegisterController::class, 'create'])
    ->name('register.create');

Route::post('/register', [RegisterController::class, 'store'])
    ->name('register.store');

Route::get('/users', [RegisterController::class, 'index'])
    ->name('users.index');

Route::get('/users/{uuid}', [RegisterController::class, 'show'])
    ->name('users.show');

Route::get('/tasks/create', [TaskController::class, 'create'])
    ->name('task.create');

Route::post('/tasks/create', [TaskController::class, 'store'])
    ->name('task.store');

Route::get('/tasks', [TaskController::class, 'index'])
    ->name('tasks.index');

Route::get('tasks/{uuid}/status', [TaskController::class, 'edit'])
    ->name('tasks.edit');

Route::patch('tasks/{uuid}', [TaskController::class, 'update'])
    ->name('tasks.update');

Route::get('/tasks/{uuid}', [TaskController::class, 'show'])
    ->name('tasks.show');

Route::delete('/tasks/{uuid}', [TaskController::class, 'destroy'])
    ->name('tasks.destroy');

Route::get('/statuses/create', [StatusController::class, 'create'])
    ->name('status.create');

Route::post('/statuses/create', [StatusController::class, 'store'])
    ->name('status.store');

Route::get('/statuses', [StatusController::class, 'index'])
    ->name('statuses.index');

Route::get('/statuses/{uuid}', [StatusController::class, 'show'])
    ->name('statuses.show');

Route::delete('/statuses/{uuid}', [StatusController::class, 'destroy'])
    ->name('statuses.destroy');

Route::get('/tags/create', [TagController::class, 'create'])
    ->name('tag.create');

Route::post('/tags/create', [TagController::class, 'store'])
    ->name('tag.store');

Route::get('/tags', [TagController::class, 'index'])
    ->name('tags.index');

Route::get('/tags/{uuid}', [TagController::class, 'show'])
    ->name('tags.show');

Route::delete('/tags/{uuid}', [TagController::class, 'destroy'])
    ->name('tags.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
