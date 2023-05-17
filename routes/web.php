<?php

use App\Services\pdfService;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ApklausosController;
use App\Http\Controllers\UzsakymaiController;
use App\Http\Controllers\InventoriusController;

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
Route::get('/redagavimas',[UserController::class,'edit']);

// Update user
Route::put('/redaguoti',[UserController::class,'update']);



// Show all inventorius
Route::get('/inventorius', [InventoriusController::class, 'index']);

// Show create form
Route::get('/inventorius/sukurti', [InventoriusController::class, 'create']);

// Store listing data
Route::post('/inventorius', [InventoriusController::class, 'store']);

// Show single inventorius
Route::get('/inventorius/{inv}', [InventoriusController::class, 'show']);

// Show edit form
Route::get('inventorius/{inv}/redagavimas', [InventoriusController::class, 'edit']);

// Update inventorius
Route::put('inventorius/{inv}', [InventoriusController::class, 'update']);

// Delete inventorius
Route::delete('inventorius/{inventorius}', [InventoriusController::class, 'delete']);






// Show all uzsakymai
Route::get('/uzsakymai', [UzsakymaiController::class, 'index'])->middleware("auth");

// Createe uzsakymas
Route::get('/uzsakymai/sukurti', [UzsakymaiController::class, 'create']);

// Store uzsakymas data
Route::post('/uzsakymai', [UzsakymaiController::class, 'store']);

// Show single uzsakymas
Route::get('/uzsakymai/{uzsakymas}', [UzsakymaiController::class, 'show']);

// Show edit form
Route::get('uzsakymai/{uzsakymas}/redagavimas', [UzsakymaiController::class, 'edit']);

// Update listing
Route::put('uzsakymai/{uzsakymas}', [UzsakymaiController::class, 'update']);

// Delete listing
Route::delete('uzsakymai/{uzsakymas}', [UzsakymaiController::class, 'delete']);


// Show login form
Route::get('/prisijungimas', [LoginController::class, 'login'])->name('login')->middleware("guest");

// Login user
Route::post('/users/authenticate', [LoginController::class, 'authenticate']);

// Log user out
Route::post('/atsijungti', [LoginController::class, 'logout'])->middleware('auth');




Route::view('/pagrindinis', 'pagrindinis');

Route::view('/kalendorius', 'kalendorius');


// Update password
Route::post('/edit/password', [UserController::class, 'updatePassword']);

// Show all apklausos
Route::get('/apklausos', [ApklausosController::class, 'index'])->middleware("auth");

// Show single apklausa
Route::get('/apklausos/{apklausa}', [ApklausosController::class, 'show']);

// Fill apklausa form
Route::get('apklausos/{apklausa}/pildyti', [ApklausosController::class, 'edit']);

// Update apklausa
Route::put('/apklausos/{apklausa}', [ApklausosController::class, 'update']);

// Save as pdf
Route::get('/uzsakymai/{uzsakymas}/pdf', [pdfService::class, 'createPDF']);