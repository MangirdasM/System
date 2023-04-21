<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UzsakymaiController;
use App\Http\Controllers\InventoriusController;
use App\Http\Controllers\LoginController;

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

// Show all darbuotojai
Route::get('/darbuotojai', [UserController::class, 'index']);

// Show create form
Route::get('/darbuotojai/sukurti', [UserController::class, 'create']);

// Store listing data
Route::post('/darbuotojai', [UserController::class, 'store']);

// Show edit and update form
Route::get('/redaguoti',[UserController::class,'edit']);

Route::put('/redaguoti',[UserController::class,'update']);



// Show all inventorius
Route::get('/inventorius', [InventoriusController::class, 'index']);

// Show create form
Route::get('/inventorius/sukurti', [InventoriusController::class, 'create']);

// Store listing data
Route::post('/inventorius', [InventoriusController::class, 'store']);

Route::get('/inventorius/{inv}', [InventoriusController::class, 'show']);

// Show edit form
Route::get('inventorius/{inv}/redagavimas', [InventoriusController::class, 'edit']);

Route::put('inventorius/{inv}', [InventoriusController::class, 'update']);






// Show all uzsakymai
Route::get('/uzsakymai', [UzsakymaiController::class, 'index'])->middleware("auth");;

// Createe uzsakymas
Route::get('/uzsakymai/sukurti', [UzsakymaiController::class, 'create']);

// Store uzsakymas data
Route::post('/uzsakymai', [UzsakymaiController::class, 'store']);

Route::get('/uzsakymai/{uzsakymas}', [UzsakymaiController::class, 'show']);

// Show edit form
Route::get('uzsakymai/{uzsakymas}/redagavimas', [UzsakymaiController::class, 'edit']);

// Update listing
Route::put('uzsakymai/{uzsakymas}', [UzsakymaiController::class, 'update']);

// Delete listing
Route::delete('uzsakymai/{uzsakymas}', [UzsakymaiController::class, 'delete']);


// Show login form
Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware("guest");

// Login user
Route::post('/users/authenticate', [LoginController::class, 'authenticate']);

// Log user out
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');




Route::view('/pagrindinis', 'pagrindinis');


#Route::post('/uzimtumas', [UzimtumasController::class, 'store']);

Route::post('/edit/password', [UserController::class, 'updatePassword']);
