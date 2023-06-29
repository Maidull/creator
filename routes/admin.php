<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CreatorController;
use App\Http\Controllers\Admin\DashboardController;;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\UserController;
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
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('projects', ProjectController::class);
    Route::group(['prefix' => 'projects', 'as' => 'projects.'], function(){
        Route::get('assignment/{project}', [ProjectController::class, 'assignment'])->name('assignment');
        Route::post('assignment', [ProjectController::class, 'assign'])->name('assign');
        Route::get('show/{id}', [ProjectController::class, 'show'])->name('show');
    });
    Route::resource('users', UserController::class);
    Route::get('users/delete/{id}', [UserController::class, 'destroy'])->name('users.delete');
    Route::resource('creators', CreatorController::class);
    
});
