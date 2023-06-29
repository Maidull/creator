<?php

use App\Http\Controllers\Creator\AssignmentController;
use App\Http\Controllers\Creator\AssignmentDetailController;
use App\Http\Controllers\Creator\AuthController;
use App\Http\Controllers\Creator\CreatorController;
use App\Http\Controllers\Creator\DashboardController;
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
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/verify/{id}', [AuthController::class, 'verify'])->name('verify');


Route::middleware('check.login')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::get('/edit/profile', [AuthController::class, 'EditProfile'])->name('edit.profile');
    Route::post('/store/profile', [CreatorController::class, 'StoreProfile'])->name('store.profile');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('assignments', AssignmentController::class)->except('edit');
    Route::get('assignments/{assignment}/settime', [AssignmentController::class, 'setTime'])->name('assignments.settime');
    Route::post('assignments/{assignment}/set', [AssignmentController::class, 'set'])->name('assignments.set');
});