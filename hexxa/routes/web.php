<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
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
    Route::get('login', [PostController::class, 'login']);
    Route::get('register', [PostController::class, 'registerr']);
    Route::get('posts/{post:slug}', [PostController::class, 'blog_details']);

});


