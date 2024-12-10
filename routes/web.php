<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\AuthController;

use Illuminate\Support\Facades\Route;
// require __DIR__.'/auth.php';

// Page d'accueil de l'application (publique)
Route::get('/', function () {
    return view('accueil');
})->name('accueil');;


Route::post('/connexion', [AuthController::class, 'connexion'])->name('connexion');
Route::post('/logout', function () {
    auth()->logout();
    return redirect()->route('accueil');
})->name('logout');

Route::middleware('auth')->group(function() {
    // Page d'accueil de l'étudiant
    Route::get('/etudiant/accueil', [EtudiantController::class, 'accueil'])->name('etudiant.accueil');

    // Page d'accueil du professeur
    Route::get('/professeur/accueil', [ProfesseurController::class, 'accueil'])->name('professeur.accueil');
});


Route::get('/etudiant', [EntrepriseController::class, 'index'])->name('entreprise');













