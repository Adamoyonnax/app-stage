<?php

use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AccueilController;

use Illuminate\Support\Facades\Route;
require __DIR__.'/auth.php';


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
    return view('accueil');
});

Route::get('/entreprise', [EntrepriseController::class, 'index'])->name('entreprise');
Route::get('/accueil', [AccueilController::class, 'index'])->name('accueil');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


