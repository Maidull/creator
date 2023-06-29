<?php

use App\Http\Controllers\Customer\ProjectController;
use App\Http\Controllers\Customer\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware('check.login')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
    Route::get('/projects/show/{id}', [ProjectController::class, 'show'])->name('projects.show');
    Route::get('/projects/search', [ProjectController::class, 'search'])->name('projects.search');
});
