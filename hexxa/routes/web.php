<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\GoogleAuthController;
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
    Route::get('', [PostController::class, 'home']);
    Route::get('travel', [PostController::class, 'travel']);

    Route::get('pricing', [PostController::class, 'pricing']);
    Route::get('team', [PostController::class, 'team']);

    Route::get('shop', [PostController::class, 'shop']);
    Route::get('contact-us', [PostController::class, 'contact_us']);

    Route::get('team-details', [PostController::class, 'team_details']);
//    Route::get('login', [PostController::class, 'login']);

//    Route::get('register', [PostController::class, 'register']);
    Route::get('posts/{post:slug}', [PostController::class, 'blog_details']);

    Route::get('all-post/{page?}', [PostController::class, 'index'])->where('page', '[0-9]+')
        ->name('posts.index');

});


Route::get('register' , [RegisterController::class , 'create'])->middleware('guest');
Route::post('register' , [RegisterController::class , 'store'])->middleware('guest');

Route::get('login' , [SessionsController::class , 'create'])->middleware('guest');
Route::post('login' , [SessionsController::class , 'store'])->middleware('guest');

Route::post('logout' , [SessionsController::class , 'destroy'])->middleware('auth');



Route::post('posts/{post:slug}/comments' , [CommentController::class , 'store']);
Route::post('comments/{comment:id}/sub-comments', [SubCommentController::class, 'store']);



Route::get('auth/google' , [GoogleAuthController::class , 'redirect'])->name('google-auth');
Route::get('auth/google/call-back' , [GoogleAuthController::class, 'callbackGoogle']);

Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
});

Route::get('/auth/callback', function () {
    $githubUser = Socialite::driver('github')->stateless()->user();

    $user = User::updateOrCreate([
        "email" => $githubUser->email,
        "username" => $githubUser->nickname,
    ] , [
        'name' => $githubUser->getName(),
        'username' => $githubUser->getNickname(),
        'email' => $githubUser->getEmail(),
        'github_id' => $githubUser->getId(),
        'github_token' => $githubUser->token,
        'github_refresh_token' => $githubUser->refreshToken,
    ]);

    if ($user) {
        Auth::login($user);
        return redirect('/');
    }
    else {
        return redirect('/')->with('error', 'User creation failed');
    }


});
