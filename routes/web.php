<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Models\Task;
use App\Models\User;
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


// TASK ROUTES
// show index
Route::get('/', [TaskController::class, 'index']);

// show create page
Route::get('/tasks/create', [TaskController::class, 'create'])->middleware('auth');

// Store new task
Route::post('/tasks/create', [TaskController::class, 'store'])->middleware('auth');

// Show edit form
Route::get('/tasks/edit/{task}', [TaskController::class, 'edit'])->middleware('auth');

// Delete task
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'] )->middleware('auth');

// Udpate task
Route::put('/tasks/update/{task}', [TaskController::class, 'update'])->middleware('auth');

// USER ROUTES
// show login page
Route::get('/user/login', [UserController::class, 'showLogin'])->name('login');

// show signup page
Route::get('/user/register', [UserController::class, 'showRegister']);

// store new user
Route::post('/user/register', [UserController::class, 'store']);

// login user
Route::post('/user/login', [UserController::class, 'authenticate']);

// logout user
Route::post('user/logout', [UserController::class, 'logout']);
