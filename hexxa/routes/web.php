<?php

use App\Http\Controllers\GitHubAuthController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\VerificationController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\sessionsController;
use App\Http\Controllers\SubCommentController;
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

Route::prefix('')->group(function () {
    Route::get('', [PostController::class, 'home'])->name('home');
    Route::get('travel', [PostController::class, 'travel']);

    Route::get('pricing', [PostController::class, 'pricing']);
    Route::get('team', [PostController::class, 'team']);

    Route::get('shop', [PostController::class, 'shop']);
    Route::get('contact-us', [PostController::class, 'contact_us']);

    Route::get('team-details', [PostController::class, 'team_details']);

    Route::get('/posts/{post:slug}', [PostController::class, 'blog_details'])->name('post-detail');

    Route::get('all-post/{page?}', [PostController::class, 'index'])->where('page', '[0-9]+')
        ->name('posts.index');
});

Route::get('/posts/payments/{post:slug}', [PostController::class, 'model'])->name('payment-page');

Route::get('success-stripe' , [StripeController::class, 'success'])->name('success-stripe');


Route::get('register' , [RegisterController::class , 'create'])->middleware('guest');
Route::post('register' , [RegisterController::class , 'store'])->middleware('guest');

Route::get('login' , [SessionsController::class , 'create'])->middleware('guest')->name('login');
Route::post('login' , [SessionsController::class , 'store'])->middleware('guest');

Route::post('logout' , [SessionsController::class , 'destroy'])->middleware('auth');


Route::post('posts/{post:slug}/comments' , [CommentController::class , 'store']);
Route::post('comments/{comment:id}/sub-comments', [SubCommentController::class, 'store']);

Route::get('/auth/redirect', [GitHubAuthController::class, 'redirectToGitHub']);
Route::get('/auth/callback', [GitHubAuthController::class, 'handleGitHubCallback']);


Route::get('/auth/google/redirect', [GoogleAuthController::class, 'redirectToGoogle']);
Route::get('/auth/google/call-back', [GoogleAuthController::class, 'handleGoogleCallback']);


Route::post('/session', [StripeController::class , 'session'])->name('session');
Route::get('/success-stripe', [StripeController::class , 'successStripe'])->name('success-stripe');


Route::post('paypal' , [PayPalController::class , 'paypal'])->name('paypal');
Route::get('success' , [PayPalController::class , 'success'])->name('success');
Route::get('cancel' , [PayPalController::class , 'cancel'])->name('cancel');


Route::get('2FA', [PostController::class, 'twoFA'])->name('twoFA');
Route::get('qrcode', [PostController::class, 'qrcode'])->name('qrcode');
Route::post('/verify-two-factor', [VerificationController::class, 'verifyTwoFactor'])->name('verifyTwoFactor');

