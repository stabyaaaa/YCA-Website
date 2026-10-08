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
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\CommunityNotificationController;
use App\Http\Controllers\Partners\CommunityPostController as PartnerCommunityPostController;
use App\Http\Controllers\Admin\CommunityPostModerationController;
use App\Http\Controllers\Admin\CommunityCategoryController;


/*
|--------------------------------------------------------------------------
| PUBLIC COMMUNITY ROUTES
|--------------------------------------------------------------------------
|
| Accessible to everyone.
| Includes the public community feed, individual posts,
| organization pages and share tracking.
|
*/

Route::get('/community', [CommunityController::class, 'index'])
    ->name('community.index');

Route::get('/community/posts/{post}', [CommunityController::class, 'show'])
    ->name('community.show');

Route::get('/community/organizations/{organization}', [CommunityController::class, 'organization'])
    ->name('community.organization');

Route::post('/community/posts/{post}/share', [CommunityController::class, 'share'])
    ->name('community.share');


/*
|--------------------------------------------------------------------------
| AUTHENTICATED COMMUNITY USER ROUTES
|--------------------------------------------------------------------------
|
| Requires login.
| Used for liking posts, saving/bookmarking posts,
| viewing saved posts and viewing community notifications.
|
*/

Route::middleware('auth')->group(function () {

    Route::post('/community/posts/{post}/like', [CommunityController::class, 'toggleLike'])
        ->name('community.like');

    Route::post('/community/posts/{post}/bookmark', [CommunityController::class, 'toggleBookmark'])
        ->name('community.bookmark');

    Route::get('/community/saved', [CommunityController::class, 'bookmarks'])
        ->name('community.bookmarks');


    /*
    |--------------------------------------------------------------------------
    | COMMUNITY NOTIFICATION ROUTES
    |--------------------------------------------------------------------------
    |
    | Used for post approval, rejection and change-request notifications.
    |
    */

    Route::get('/community/notifications', [CommunityNotificationController::class, 'index'])
        ->name('community.notifications.index');

    Route::post('/community/notifications/read-all', [CommunityNotificationController::class, 'readAll'])
        ->name('community.notifications.readAll');

    Route::get('/community/notifications/{notification}', [CommunityNotificationController::class, 'read'])
        ->name('community.notifications.read');

});


/*
|--------------------------------------------------------------------------
| COMMUNITY CONTRIBUTOR ROUTES
|--------------------------------------------------------------------------
|
| Accessible to:
| - Partner
| - Admin
| - Super Admin
|
| Used for creating and managing the logged-in user's own posts.
| Role authorization is handled inside CommunityPostController.
|
*/

Route::middleware('auth')
    ->prefix('community/manage')
    ->name('partner.community.')
    ->group(function () {

        Route::get('/posts', [PartnerCommunityPostController::class, 'index'])
            ->name('posts.index');

        Route::get('/posts/create', [PartnerCommunityPostController::class, 'create'])
            ->name('posts.create');

        Route::post('/posts', [PartnerCommunityPostController::class, 'store'])
            ->name('posts.store');

        Route::get('/posts/{post}', [PartnerCommunityPostController::class, 'show'])
            ->name('posts.show');

        Route::get('/posts/{post}/edit', [PartnerCommunityPostController::class, 'edit'])
            ->name('posts.edit');

        Route::put('/posts/{post}', [PartnerCommunityPostController::class, 'update'])
            ->name('posts.update');

        Route::post('/posts/{post}/submit', [PartnerCommunityPostController::class, 'submit'])
            ->name('posts.submit');

        Route::delete('/posts/{post}', [PartnerCommunityPostController::class, 'destroy'])
            ->name('posts.destroy');

        Route::delete(
            '/posts/{post}/media/{media}',
            [PartnerCommunityPostController::class, 'deleteMedia']
        )->name('posts.media.delete');

    });


/*
|--------------------------------------------------------------------------
| COMMUNITY MODERATION ROUTES
|--------------------------------------------------------------------------
|
| Accessible to:
| - Admin
| - Super Admin
|
| Used for reviewing submitted posts and:
| - Approving
| - Rejecting
| - Requesting changes
|
| Super Admin additionally has access to:
| - Scheduling
| - Featuring / unfeaturing posts
|
| Authorization is handled inside CommunityPostModerationController.
|
*/

Route::middleware('auth')
    ->prefix('admin/community')
    ->name('admin.community.')
    ->group(function () {

        Route::get('/posts', [CommunityPostModerationController::class, 'index'])
            ->name('posts.index');

        Route::get('/posts/{post}', [CommunityPostModerationController::class, 'show'])
            ->name('posts.show');

        Route::post('/posts/{post}/approve', [CommunityPostModerationController::class, 'approve'])
            ->name('posts.approve');

        Route::post('/posts/{post}/changes', [CommunityPostModerationController::class, 'requestChanges'])
            ->name('posts.changes');

        Route::post('/posts/{post}/reject', [CommunityPostModerationController::class, 'reject'])
            ->name('posts.reject');

        Route::post('/posts/{post}/schedule', [CommunityPostModerationController::class, 'schedule'])
            ->name('posts.schedule');

        Route::post('/posts/{post}/feature', [CommunityPostModerationController::class, 'feature'])
            ->name('posts.feature');

        Route::post('/posts/{post}/unfeature', [CommunityPostModerationController::class, 'unfeature'])
            ->name('posts.unfeature');


        /*
        |--------------------------------------------------------------------------
        | COMMUNITY CATEGORY MANAGEMENT ROUTES
        |--------------------------------------------------------------------------
        |
        | Super Admin only.
        | Used to create, enable, disable and delete community categories.
        |
        */

        Route::get('/categories', [CommunityCategoryController::class, 'index'])
            ->name('categories.index');

        Route::post('/categories', [CommunityCategoryController::class, 'store'])
            ->name('categories.store');

        Route::post('/categories/{category}/toggle', [CommunityCategoryController::class, 'toggle'])
            ->name('categories.toggle');

        Route::delete('/categories/{category}', [CommunityCategoryController::class, 'destroy'])
            ->name('categories.destroy');

    });



// ======================================================
// AI CHATBOT ROUTES - only verfied users can use this feature
// ======================================================
//

Route::middleware(['auth', 'verified'])->group(function () {
    Route::post('/chatbot/message', [ChatbotController::class, 'message'])
        ->name('chatbot.message');
});
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
| Admin + Super Admin Routes + CMS Controll
er
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