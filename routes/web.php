<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminRequestController;
use App\Http\Controllers\SuperAdminRequestController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Public Routes
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
| Admin → Request Admin Creation
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/request/create-admin', [AdminRequestController::class, 'create']);
    Route::post('/admin/request/create-admin', [AdminRequestController::class, 'store'])
        ->name('admin.request.store');
});

/*
|--------------------------------------------------------------------------
| Super Admin → Approve / Reject Requests
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:super_admin'])->group(function () {
    Route::get('/super-admin/requests', [SuperAdminRequestController::class, 'index'])
        ->name('superadmin.requests');

    Route::post('/super-admin/requests/{id}/approve', [SuperAdminRequestController::class, 'approve'])
        ->name('superadmin.approve');

    Route::post('/super-admin/requests/{id}/reject', [SuperAdminRequestController::class, 'reject'])
        ->name('superadmin.reject');
});

/*
|--------------------------------------------------------------------------
| Super Admin → Direct Admin Creation (optional)
|--------------------------------------------------------------------------
*/


Route::middleware(['auth', 'role:super_admin'])
    ->prefix('superadmin')
    ->name('superadmin.')
    ->group(function () {

        // Show create admin form
        Route::get('/admins/create', [AdminController::class, 'create'])
            ->name('admins.create');

        // Store new admin
        Route::post('/admins/store', [AdminController::class, 'store'])
            ->name('admins.store');

        // Pending admin requests
        Route::get('/admins/pending', [AdminController::class, 'pending'])
            ->name('admins.pending');
    });


require __DIR__.'/auth.php';
