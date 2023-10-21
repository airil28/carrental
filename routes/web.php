<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth2\LoginController;
use App\Http\Controllers\Auth2\RegisterController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\RenterController;
use App\Http\Controllers\VehicleOwnerController;
use App\Http\Controllers\ReservationController;


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
    return view('welcome');
});

// Auth::routes();
// Route::view('/login', 'login');



Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/cars', [CarController::class, 'index'])->name('cars');
Route::get('/get-car-data', 'OwnerController@getCarData')->name('get-car-data');

//Register
Route::get('register', [RegisterController::class,'showRegisterForm'])->name('register');
Route::post('/register',  [RegisterController::class,'register']);

// Auth
Route::get('login', [LoginController::class,'showLoginForm'])->name('login');
Route::post('login', [LoginController::class,'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Renter Routes
// Route::middleware(['auth', 'role:renter'])->group(function () {
    Route::get('renter',[RenterController::class,'index'])->name('renter.dashboard');
    Route::get('rented-vehicle',[RenterController::class,'showRentedVehicle'])->name('rented-vehicle');
// });

// Vehicle Owner Routes
// Route::middleware(['auth', 'role:vehicle_owner'])->group(function () {
    Route::get('vehicle_owner', [VehicleOwnerController::class, 'index'])->name('vehicle_owner.dashboard');
    Route::post('vehicle', [VehicleController::class, 'store'])->name('vehicle.store');
    Route::delete('/vehicles/{id}', [VehicleController::class ,'destroy'])->name('vehicles.destroy');
// });

// Reservation
Route::get('vehicles/{vehicle}/reserve', [ReservationController::class,'showReservationForm'])->name('reserve-form');
Route::get('reservation/list', [ReservationController::class,'showReservation'])->name('show-reservation');
Route::post('vehicles/{vehicle}/reserve', [ReservationController::class,'reserve'])->name('reservations.store');
Route::post('confirm-payment/{reservation}', [ReservationController::class,'confirmPayment'])->name('confirm-payment');

