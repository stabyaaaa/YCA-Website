<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\AdminRequestController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CMSController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;

/*
|--------------------------------------------------------------------------
| Email Verification Routes
|--------------------------------------------------------------------------
| These routes handle:
| 1. Showing the verify email page
| 2. Verifying the email from the email link
| 3. Resending the verification email
|--------------------------------------------------------------------------
*/
Route::get('/login', function () {
    return redirect()->route('home')
        ->with('error', 'Please log in first, then click the verification link again.');
})->name('login');

Route::get('/', function () {
    if (auth()->check() && ! auth()->user()->hasVerifiedEmail()) {
        return redirect()->route('verification.notice');
    }

    return view('welcome');
})->name('home');

// Show verification notice page after registration
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


// Handle verification link from email
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {

    // Mark email as verified
    $request->fulfill();

    // After verification, activate the user account
    $request->user()->update([
        'status' => 'active',
    ]);

    // Redirect to homepage
    return redirect()->route('home')
        ->with('success', 'Your email has been verified successfully.');

})->middleware(['auth', 'signed'])->name('verification.verify');


// Resend verification email
Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');


/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
| These pages are visible to everyone.
|--------------------------------------------------------------------------
*/



/*
|--------------------------------------------------------------------------
| Public Pages
|--------------------------------------------------------------------------
| If logged-in user is not verified, force verify email page.
|--------------------------------------------------------------------------
*/

Route::middleware('redirect.unverified')->group(function () {
    Route::get('/', fn () => view('welcome'))->name('home');
    Route::get('/about', fn () => view('about'))->name('about');
    Route::get('/news', fn () => view('news'))->name('news');
    Route::get('/resources', fn () => view('resources'))->name('resources');
    Route::get('/partners', fn () => view('partners'))->name('partners');
    Route::get('/contact', fn () => view('contact-us'))->name('contact');
});


/*
|--------------------------------------------------------------------------
| Dashboard Route
|--------------------------------------------------------------------------
| User must be logged in AND email must be verified.
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


/*
|--------------------------------------------------------------------------
| Profile Routes
|--------------------------------------------------------------------------
| User must be logged in.
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
| Admin + Super Admin Routes
|--------------------------------------------------------------------------
| Only users with role admin or super_admin can access these routes.
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin,super_admin'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Manage Users
    |--------------------------------------------------------------------------
    */

    Route::get('/manage-users', [UserManagementController::class, 'index'])
        ->name('users.index');

    Route::put('/manage-users/{user}', [UserManagementController::class, 'update'])
        ->name('users.update');

    Route::delete('/manage-users/{user}', [UserManagementController::class, 'destroy'])
        ->name('users.destroy');


    /*
    |--------------------------------------------------------------------------
    | CMS Page Editor
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/pages/{page}/edit', [CMSController::class, 'edit'])
        ->name('cms.pages.edit');

    Route::post('/admin/pages/{page}/update', [CMSController::class, 'update'])
        ->name('cms.pages.update');

});


/*
|--------------------------------------------------------------------------
| Admin Only Routes
|--------------------------------------------------------------------------
| Only admin users can create and view their admin requests.
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
| Super Admin Only Routes
|--------------------------------------------------------------------------
| Only super_admin users can approve/reject admin requests.
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:super_admin'])->group(function () {

    Route::get('/admin/requests', [AdminRequestController::class, 'index'])
        ->name('admin.requests.index');

    Route::post('/admin/requests/{adminRequest}/approve', [AdminRequestController::class, 'approve'])
        ->name('admin.requests.approve');

    Route::post('/admin/requests/{adminRequest}/reject', [AdminRequestController::class, 'reject'])
        ->name('admin.requests.reject');

});


/*
|--------------------------------------------------------------------------
| Google OAuth Routes
|--------------------------------------------------------------------------
| IMPORTANT:
| These must be placed BEFORE the dynamic CMS route /{slug}.
|--------------------------------------------------------------------------
*/

Route::post('/auth/google/register', [GoogleController::class, 'registerWithGoogle'])
    ->name('google.register');
    
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])
    ->name('google.redirect');

Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])
    ->name('google.callback');


/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
| Laravel Breeze/Fortify/Auth routes.
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';


/*
|--------------------------------------------------------------------------
| CMS Dynamic Pages
|--------------------------------------------------------------------------
| IMPORTANT:
| This route must stay LAST.
| Otherwise it can catch routes like /auth/google, /dashboard, etc.
|--------------------------------------------------------------------------
*/

Route::get('/{slug}', [PageController::class, 'show'])
    ->name('cms.page.show');