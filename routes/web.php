<?php

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

Route::get('/', function () {
    return redirect('login');
});

// Login & Logout
Route::get('login', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login_store');

Route::middleware('auth')->group(function () {
    // Home
    Route::get('home', fn () => view('backend.home', [
        'name' => 'Dashboard'
    ]))->name('dashboard');

    // Logout
    Route::post('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

    // Archive
    Route::get('archive', \App\Http\Controllers\Backend\ArchiveController::class)->name('archive');

    // Approval
    Route::resource('approval', \App\Http\Controllers\Backend\ApprovalController::class);

    // Cuti
    Route::resource('cuti', \App\Http\Controllers\Backend\CutiController::class);

    // Departemen
    Route::resource('departemen', \App\Http\Controllers\Backend\DepartemenController::class);

    // Role
    Route::resource('role', \App\Http\Controllers\Backend\GroupController::class);

    // Surat Cuti
    Route::resource('surat_cuti', \App\Http\Controllers\Backend\SuratCutiController::class);

    // User
    Route::resource('user', \App\Http\Controllers\Backend\UserController::class);
});
