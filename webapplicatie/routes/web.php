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

Route::get('/index', [App\Http\Controllers\HomeController::class, 'index'])->name('events');

/**
 * Routes User Profile
 */
Route::get('/profiles/{username}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.show');
Route::get('/profiles/{username}/create-step-one', [App\Http\Controllers\ProfilesController::class, 'createStepOne'])->name('profile.create.step.one');
Route::patch('/profiles/{username}/create-step-one', [App\Http\Controllers\ProfilesController::class, 'storeStepOne'])->name('profile.store.step.one');
Route::get('/profiles/{username}/create-step-two', [App\Http\Controllers\ProfilesController::class, 'createStepTwo'])->name('profile.create.step.two');
Route::patch('/profiles/{username}/create-step-two', [App\Http\Controllers\ProfilesController::class, 'storeStepTwo'])->name('profile.store.step.two');

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
