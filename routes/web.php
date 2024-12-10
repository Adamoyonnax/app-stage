<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\ProfesseurController;
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
    Auth::logout();  // Déconnexion de l'utilisateur
    return redirect()->route('accueil');
})->name('logout');

// Route::middleware('auth:etudiant')->get('/etudiant/accueil', [EtudiantController::class, 'accueil'])->name('etudiant.accueil');
Route::get('/etudiant/accueil', [EtudiantController::class, 'accueil'])->name('etudiant.accueil');
Route::get('/professeur/accueil', [ProfesseurController::class, 'accueil'])->name('professeur.accueil');


Route::get('/etudiant', [EntrepriseController::class, 'index'])->name('entreprise');













