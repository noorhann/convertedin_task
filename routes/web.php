<?php

use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthController;

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


Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('admin.login');


Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware('auth:admin')->group(function () {
    

    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');

    Route::get('/statistics', [StatisticsController::class, 'index'])->name('statistics.index');

    Route::post('logout', [AuthController::class, 'logout']);

});
Route::get('/', function () {
})->middleware('redirectIfAuthenticated');

