<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// all the lists 
Route::get('/',[ListingController::class, 'index']);

//form create listings
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

//data store listings
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

//edit listings
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

//update listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

//delete listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

//manage listings
Route::get('/listings/manage',[ListingController::class, 'manage'])->middleware('auth');

//single list
Route::get('/listings/{listing}', [ListingController::class, 'show']);


//Resgister/creat form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

//make new user
Route::post('/users', [UserController::class, 'store']);

//logout
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//login
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//user authenticate
Route::post('/users/authenticate',[UserController::class, 'authenticate']);