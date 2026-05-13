<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\AdminRequestController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CMSController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ContactMessageController;


// ======================================================
// USER-TO-USER CHAT ROUTES
// ======================================================
//
// Features:
// - Friends list
// - Start private conversation
// - Open chat window
// - Send messages
// - Live polling for latest messages
//
// Access:
// - Only authenticated users
// - Only verified users
//
// ======================================================


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/messages', [MessageController::class, 'index'])
        ->name('messages.index');

    Route::post('/messages/start/{user}', [MessageController::class, 'start'])
        ->name('messages.start');

    Route::post('/messages/start-ajax/{user}', [MessageController::class, 'startAjax'])
        ->name('messages.start.ajax');

    Route::get('/messages/{conversation}', [MessageController::class, 'show'])
        ->name('messages.show');

    Route::post('/messages/{conversation}/send', [MessageController::class, 'send'])
        ->name('messages.send');

    Route::get('/messages/{conversation}/latest', [MessageController::class, 'latest'])
        ->name('messages.latest');
});





/*
|--------------------------------------------------------------------------
| Contact Form Route
|--------------------------------------------------------------------------
*/
Route::post('/contact/message', [ContactMessageController::class, 'store'])
    ->name('contact.message.store');

Route::middleware(['auth', 'verified', 'role:admin,super_admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/contact-messages', [ContactMessageController::class, 'index'])
            ->name('contact-messages.index');

        Route::get('/contact-messages/{contactMessage}', [ContactMessageController::class, 'show'])
            ->name('contact-messages.show');

        Route::patch('/contact-messages/{contactMessage}/status', [ContactMessageController::class, 'updateStatus'])
            ->name('contact-messages.update-status');

        Route::delete('/contact-messages/{contactMessage}', [ContactMessageController::class, 'destroy'])
            ->name('contact-messages.destroy');
    });
/*
|--------------------------------------------------------------------------
| Email Verification Routes
|--------------------------------------------------------------------------
*/

// Route::get('/email/verify', function () {
//     return view('auth.verify-email');
// })->middleware('auth')->name('verification.notice');

// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//     $request->fulfill();

//     $request->user()->update([
//         'status' => 'active',
//     ]);

//     return redirect()->route('home')
//         ->with('success', 'Your email has been verified successfully.');
// })->middleware(['auth', 'signed'])->name('verification.verify');

// Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
//     ->middleware(['auth', 'throttle:6,1'])
//     ->name('verification.send');


/*
|--------------------------------------------------------------------------
| Google OAuth Routes
|--------------------------------------------------------------------------
| Must stay before /{slug}.
|--------------------------------------------------------------------------
*/

Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])
    ->name('google.redirect');

Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])
    ->name('google.callback');

Route::post('/auth/google/register', [GoogleController::class, 'registerWithGoogle'])
    ->name('google.register');


/*
|--------------------------------------------------------------------------
| Public Pages
|--------------------------------------------------------------------------
| Public pages, but logged-in unverified users are forced to verify email.
|--------------------------------------------------------------------------
*/

Route::middleware('redirect.unverified')->group(function () {

    Route::get('/', [HomeController::class, 'index'])
        ->name('home');


    Route::get('/about', [HomeController::class, 'about'])->name('about');

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

});


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
| Profile Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});

/*
|--------------------------------------------------------------------------
| Admin + Super Admin Routes + CMS Controller
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified', 'role:admin,super_admin'])->group(function () {

    Route::get('/manage-users', [UserManagementController::class, 'index'])
        ->name('users.index');

    Route::put('/manage-users/{user}', [UserManagementController::class, 'update'])
        ->name('users.update');

    Route::delete('/manage-users/{user}', [UserManagementController::class, 'destroy'])
        ->name('users.destroy');

    Route::get('/admin/pages/{page}/edit', [CMSController::class, 'edit'])
        ->name('cms.pages.edit');

    Route::put('/admin/pages/{page}/update', [CMSController::class, 'update'])
        ->name('cms.pages.update');

    Route::post('/admin/cms/inline-update', [CMSController::class, 'inlineUpdate'])
        ->name('cms.inline.update');

    Route::post('/admin/cms/inline-image-update', [CMSController::class, 'inlineImageUpdate'])
    ->name('cms.inline.image.update');

    Route::post('/admin/cms/inline/file-update', [CmsController::class, 'inlineFileUpdate'])
    ->name('cms.inline.file.update');

});


/*
|--------------------------------------------------------------------------
| Admin Only Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {

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
*/

Route::middleware(['auth', 'verified', 'role:super_admin'])->group(function () {

    Route::get('/admin/requests', [AdminRequestController::class, 'index'])
        ->name('admin.requests.index');

    Route::post('/admin/requests/{adminRequest}/approve', [AdminRequestController::class, 'approve'])
        ->name('admin.requests.approve');

    Route::post('/admin/requests/{adminRequest}/reject', [AdminRequestController::class, 'reject'])
        ->name('admin.requests.reject');

});


/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
| Keep this. Do not duplicate /login, /forgot-password, /reset-password here.
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';


/*
|--------------------------------------------------------------------------
| CMS Dynamic Pages
|--------------------------------------------------------------------------
| Must always stay last.
|--------------------------------------------------------------------------
*/

Route::get('/{slug}', [PageController::class, 'show'])
    ->name('cms.page.show');