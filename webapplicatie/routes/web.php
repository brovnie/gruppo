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
Route::get('/profiles/{username}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])->name('profile.edit');
Route::patch('/profiles/{username}', [App\Http\Controllers\ProfilesController::class, 'update'])->name('profile.update');

/**
 * Routes Post 
 */
Route::get('/events/{event}', [App\Http\Controllers\EventsController::class, 'index'])->name('event.show');
Route::get('/events/create', [App\Http\Controllers\EventsController::class, 'create'])->name('event.create');
Route::post('/events', [App\Http\Controllers\EventsController::class, 'store'])->name('event.store');
Route::get('/events/{event}/edit', [App\Http\Controllers\EventsController::class, 'edit'])->name('event.edit');
Route::patch('/events/{event}', [App\Http\Controllers\EventsController::class, 'update'])->name('event.update');


 /**
 * Routes Apis 
 */
Route::get('/api/v1/cities', [App\Http\Controllers\APIs\BelgianCitiesApi::class, 'getCity']);
