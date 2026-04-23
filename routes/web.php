<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\AdminRequestController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CMSController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/news', function () {
    return view('news');
})->name('news');

Route::get('/resources', function () {
    return view('resources');
})->name('resources');

Route::get('/partners', function () {
    return view('partners');
})->name('partners');

Route::get('/contact', function () {
    return view('contact-us');
})->name('contact');

/*
|--------------------------------------------------------------------------
| Google OAuth Routes
|--------------------------------------------------------------------------
*/
Route::get('/auth/google', [App\Http\Controllers\Auth\GoogleController::class, 'redirectToGoogle'])
     ->name('google.redirect');

Route::get('/auth/google/callback', [App\Http\Controllers\Auth\GoogleController::class, 'handleGoogleCallback'])
     ->name('google.callback');

/*
|--------------------------------------------------------------------------
| Password Reset Routes (Custom - Redirect to Home after success)
|--------------------------------------------------------------------------
*/
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

// Custom Reset Password Route - Redirects to home with success message
Route::put('/reset-password', function (Illuminate\Http\Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password),
                'remember_token' => Str::random(60),
            ])->save();

            event(new Illuminate\Auth\Events\PasswordReset($user));
        }
    );

    if ($status === Password::PASSWORD_RESET) {
        return redirect('/')
                         ->with('status', 'Your password has been reset successfully! Please click "Sign in" to login.');
    }

    return back()->withErrors(['email' => __($status)]);

})->middleware('guest')->name('password.update');

/*
|--------------------------------------------------------------------------
| Dashboard & Protected Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

/*
|--------------------------------------------------------------------------
| Profile Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth','role:admin,super_admin'])->group(function () {
    Route::get('/manage-users', [UserManagementController::class, 'index'])
        ->name('users.index');

    Route::put('/manage-users/{user}', [UserManagementController::class, 'update'])
        ->name('users.update');

    Route::delete('/manage-users/{user}', [UserManagementController::class, 'destroy'])
        ->name('users.destroy');

    Route::get('/admin/pages/{page}/edit', [CMSController::class,'edit'])
        ->name('cms.pages.edit');

    Route::post('/admin/pages/{page}/update', [CMSController::class,'update'])
        ->name('cms.pages.update');
});

Route::middleware(['auth','role:admin'])->group(function () {
    Route::post('/admin/request/store', [AdminRequestController::class, 'store'])
        ->name('admin.request.store');

    Route::get('/admin/my-requests', [AdminRequestController::class, 'myRequests'])
        ->name('admin.my.requests');

    Route::get('/admin/request/create', [AdminRequestController::class, 'create'])
        ->name('admin.create.request');
});

Route::middleware(['auth','role:super_admin'])->group(function () {
    Route::get('/admin/requests', [AdminRequestController::class, 'index'])
        ->name('admin.requests.index');

    Route::post('/admin/requests/{adminRequest}/approve', [AdminRequestController::class, 'approve'])
        ->name('admin.requests.approve');

    Route::post('/admin/requests/{adminRequest}/reject', [AdminRequestController::class, 'reject'])
        ->name('admin.requests.reject');
});

/*
|--------------------------------------------------------------------------
| CMS Dynamic Pages - MUST STAY LAST
|--------------------------------------------------------------------------
*/
Route::get('/{slug}', [PageController::class, 'show']);

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';