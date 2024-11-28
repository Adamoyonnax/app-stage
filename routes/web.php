<?php

use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\Auth\ConnexionController;

use Illuminate\Support\Facades\Route;
require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('accueil');
});

// Traitement de la connexion
Route::post('/login', [ConnexionController::class, 'login'])->name('login');
Route::post('/logout', [ConnexionController::class, 'logout'])->name('logout');

Route::get('/etudiant/accueil', [EtudiantController::class, 'accueil'])->name('etudiant.accueil');
Route::get('/professeur/accueil', [ProfesseurController::class, 'accueil'])->name('professeur.accueil');


Route::get('/etudiant', [EntrepriseController::class, 'index'])->name('entreprise');
Route::get('/accueil', [AccueilController::class, 'index'])->name('accueil');











Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


