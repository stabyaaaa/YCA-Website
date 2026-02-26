<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\AdminRequestController;

/*
|--------------------------------------------------------------------------
| Public Route
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
})->name('home');

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Admin & Super Admin - Manage Users
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin,super_admin'])->group(function () {

    Route::get('/manage-users', [UserManagementController::class, 'index'])
        ->name('users.index');

    Route::put('/manage-users/{user}', [UserManagementController::class, 'update'])
        ->name('users.update');

    Route::delete('/manage-users/{user}', [UserManagementController::class, 'destroy'])
        ->name('users.destroy');
});

/*
|--------------------------------------------------------------------------
| Admin - Create Request (Only Admin)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::post('/admin/request/store', [AdminRequestController::class, 'store'])
        ->name('admin.request.store');

    Route::get('/admin/my-requests', [AdminRequestController::class, 'myRequests'])
        ->name('admin.my.requests');
    Route::get('/admin/request/create', [AdminRequestController::class, 'create'])
    ->name('admin.create.request');
});

/*
|--------------------------------------------------------------------------
| Super Admin - Approve Requests
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:super_admin'])->group(function () {

    Route::get('/admin/requests', [AdminRequestController::class, 'index'])
        ->name('admin.requests.index');

    Route::post('/admin/requests/{adminRequest}/approve',
    [AdminRequestController::class, 'approve']
)->name('admin.requests.approve');

Route::post('/admin/requests/{adminRequest}/reject',
    [AdminRequestController::class, 'reject']
)->name('admin.requests.reject');
});

require __DIR__.'/auth.php';