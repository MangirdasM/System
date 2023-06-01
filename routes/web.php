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
Route::get('/darbuotojai', [UserController::class, 'index'])->middleware('auth');

// Show create form
Route::get('/darbuotojai/sukurti', [UserController::class, 'create'])->middleware('auth');

// Store listing data
Route::post('/darbuotojai', [UserController::class, 'store'])->middleware('auth');

// Show edit and update form
Route::get('/redagavimas',[UserController::class,'edit'])->middleware('auth');

// Update user
Route::put('/redaguoti',[UserController::class,'update'])->middleware('auth');

Route::delete('darbuotojai/{darbuotojas}', [UserController::class, 'delete'])->middleware('auth');;



// Show all inventorius
Route::get('/inventorius', [InventoriusController::class, 'index'])->middleware('auth');

// Show create form
Route::get('/inventorius/sukurti', [InventoriusController::class, 'create'])->middleware('auth');

// Store listing data
Route::post('/inventorius', [InventoriusController::class, 'store'])->middleware('auth');

// Show single inventorius
Route::get('/inventorius/{inv}', [InventoriusController::class, 'show'])->middleware('auth');

// Show edit form
Route::get('inventorius/{inv}/redagavimas', [InventoriusController::class, 'edit'])->middleware('auth');

// Update inventorius
Route::put('inventorius/{inv}', [InventoriusController::class, 'update'])->middleware('auth');

// Delete inventorius
Route::delete('inventorius/{inventorius}', [InventoriusController::class, 'delete'])->middleware('auth');






// Show all uzsakymai
Route::get('/uzsakymai', [UzsakymaiController::class, 'index'])->middleware("auth");

// Createe uzsakymas
Route::get('/uzsakymai/sukurti', [UzsakymaiController::class, 'create'])->middleware('auth');

// Store uzsakymas data
Route::post('/uzsakymai', [UzsakymaiController::class, 'store'])->middleware('auth');

// Show single uzsakymas
Route::get('/uzsakymai/{uzsakymas}', [UzsakymaiController::class, 'show'])->middleware('auth');

// Show edit form
Route::get('uzsakymai/{uzsakymas}/redagavimas', [UzsakymaiController::class, 'edit'])->middleware('auth');

// Update listing
Route::put('uzsakymai/{uzsakymas}', [UzsakymaiController::class, 'update'])->middleware('auth');

// Delete listing
Route::delete('uzsakymai/{uzsakymas}', [UzsakymaiController::class, 'delete'])->middleware('auth');


// Show login form
Route::get('/prisijungimas', [LoginController::class, 'login'])->name('login')->middleware("guest");

Route::get('/', [LoginController::class, 'login'])->name('login')->middleware("guest");

// Login user
Route::post('/users/authenticate', [LoginController::class, 'authenticate']);

// Log user out
Route::post('/atsijungti', [LoginController::class, 'logout'])->middleware('auth');




Route::view('/pagrindinis', 'pagrindinis')->middleware('auth');

Route::view('/kalendorius', 'kalendorius')->middleware('auth');


// Update password
Route::post('/edit/password', [UserController::class, 'updatePassword'])->middleware('auth');

// Show all apklausos
Route::get('/apklausos', [ApklausosController::class, 'index'])->middleware("auth");

// Show single apklausa
Route::get('/apklausos/{apklausa}', [ApklausosController::class, 'show'])->middleware('auth');

// Fill apklausa form
Route::get('apklausos/{apklausa}/pildyti', [ApklausosController::class, 'edit'])->middleware('auth');

// Update apklausa
Route::put('/apklausos/{apklausa}', [ApklausosController::class, 'update'])->middleware('auth');

// Save as pdf
Route::get('/uzsakymai/{uzsakymas}/pdf', [pdfService::class, 'createPDF'])->middleware('auth');