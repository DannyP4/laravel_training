<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;

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

Route::get('/', function () {
    return view('welcome');
});

// user routes (step by step)
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
Route::get('/users/show/{user}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/update/{user}', [UserController::class, 'update'])->name('users.update');
Route::get('/users/delete/{user}', [UserController::class, 'showDeleteForm'])->name('users.deleteForm');
Route::delete('/users/destroy/{user}', [UserController::class, 'destroy'])->name('users.destroy');

// task routes
Route::resource('tasks', TaskController::class);
