<?php

use App\Http\Controllers\BusController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\UserTripController;
use App\Models\Location;
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

Route::get('/', function () {
    $locations = Location::get();
    return view('index', compact('locations'));
});

Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/admin', [DashboardController::class, 'home'])->name('dashboard');
    Route::get('/orders', [DashboardController::class, 'orders'])->name('orders');

    Route::resource('locations',LocationController::class);
    Route::resource('buses',BusController::class);
    Route::resource('trips',TripController::class);

});
require __DIR__.'/auth.php';


Route::get('search/trips', [UserTripController::class, 'search'])->name('search.trips');
Route::get('select/trip/{id}', [UserTripController::class, 'selectTrip'])->name('select.trip');
Route::post('store/user/trip',[UserTripController::class, 'storeTrip'])->name('store.user_trip');
