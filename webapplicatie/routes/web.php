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

/**
 * Routes Dashboard 
 */
Route::group(['middleware' => 'auth'], function() {
    Route::post('/events', [App\Http\Controllers\EventsController::class, 'store'])->name('event.store');
});
Route::get('/index', [App\Http\Controllers\HomeController::class, 'index'])->name('events');

/**
 * Routes User Profile
 */
Route::group(['middleware' => 'auth'], function() {
    Route::get('/profiles/{username}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])->name('profile.edit');
    Route::patch('/profiles/{username}', [App\Http\Controllers\ProfilesController::class, 'update'])->name('profile.update');
});
Route::get('/profiles/{username}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.show');
Route::get('/profiles/{username}/create-step-one', [App\Http\Controllers\ProfilesController::class, 'createStepOne'])->name('profile.create.step.one');
Route::patch('/profiles/{username}/create-step-one', [App\Http\Controllers\ProfilesController::class, 'storeStepOne'])->name('profile.store.step.one');
Route::get('/profiles/{username}/create-step-two', [App\Http\Controllers\ProfilesController::class, 'createStepTwo'])->name('profile.create.step.two');
Route::patch('/profiles/{username}/create-step-two', [App\Http\Controllers\ProfilesController::class, 'storeStepTwo'])->name('profile.store.step.two');


/**
 * Routes Single Event
 */
Route::group(['middleware' => 'auth'], function() {
    Route::get('/events/create', [App\Http\Controllers\EventsController::class, 'create'])->name('event.create');
    Route::get('/events/{event}/edit', [App\Http\Controllers\EventsController::class, 'edit'])->name('event.edit');
    Route::patch('/events/{event}', [App\Http\Controllers\EventsController::class, 'update'])->name('event.update');
});
Route::get('/events/{event}', [App\Http\Controllers\EventsController::class, 'index'])->name('event.show');

/**
 * Routes Event Team
 */
Route::group(['middleware' => 'auth'], function(){
    Route::patch('/events/{event}/team', [App\Http\Controllers\EventsController::class, 'addPlayer'])->name('event.addPlayer');
    Route::delete('/events/{event}/team/{user_id}', [App\Http\Controllers\EventsController::class, 'destroyPlayer'])->name('event.destroyPlayer');
    Route::patch('/events/{event}/team/{user_id}/results', [App\Http\Controllers\EventsController::class, 'updateBestPlayer'])->name('event.updateBestPlayer');  
    Route::get('/events/{event}/team/{user_id}/results', [App\Http\Controllers\EventsController::class, 'indexResults'])->name('event.indexResults');  
});
Route::get('/events/{event}/team', [App\Http\Controllers\EventsController::class, 'getTeam'])->name('event.getTeam');
Route::get('/events/{event}/availabilty', [App\Http\Controllers\EventsController::class, 'checkAvailabilty'])->name('event.checkAvailabilty');

/**
 * Routes Apis 
*/
Route::get('/api/v1/cities', [App\Http\Controllers\APIs\BelgianCitiesApi::class, 'getCity']);