<?php

use Illuminate\Support\Facades\Route;
use App\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/events', [App\Http\Controllers\HomeController::class, 'index'])->name('events');

/**
 * Routes User Profile
 */
Route::get('/profiles/{username}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.show');
Route::get('/profiles/{username}/create', [App\Http\Controllers\ProfilesController::class, 'create'])->name('profile.create');
Route::post('/profiles/{username}', [App\Http\Controllers\ProfilesController::class, 'store'])->name('profile.store');
Route::get('/profiles/{username}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])->name('profile.edit');
Route::patch('/profiles/{username}', [App\Http\Controllers\ProfilesController::class, 'update'])->name('profile.update');

/**
 * Routes Post 
 */

 /**
 * Routes Apis 
 */
Route::get('/api/v1/cities', [App\Http\Controllers\APIs\BelgianCitiesApi::class, 'getCity']);
