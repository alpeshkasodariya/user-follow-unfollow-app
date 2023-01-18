<?php
 
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('users', [\App\Http\Controllers\UserController::class, 'index']);  

Route::get('users/{user}', [\App\Http\Controllers\UserController::class, 'show']);

Route::post('users/{user}/follow', [\App\Http\Controllers\FolllowUnfollowController::class, 'follow']);

Route::post('users/{user}/unfollow', [\App\Http\Controllers\FolllowUnfollowController::class, 'unfollow']);

Route::get("search-followers", [\App\Http\Controllers\SearchController::class, 'search']);

Route::get("search-followers/{name}", [\App\Http\Controllers\SearchController::class, 'search']);
