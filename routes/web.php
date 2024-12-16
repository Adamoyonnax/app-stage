<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\ProfesseurController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\AuthController;

use Illuminate\Support\Facades\Route;

// Page d'accueil publique
Route::get('/', function () {
    return view('accueil');
})->name('accueil');

// Routes de connexion et déconnexion
Route::post('/connexion', [AuthController::class, 'connexion'])->name('connexion');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Routes pour l'étudiant
Route::middleware('auth:etudiant')->group(function () {
    Route::get('/etudiant/accueil', [EtudiantController::class, 'accueil'])->name('etudiant.accueil');
    Route::get('/etudiant/profil', [EtudiantController::class, 'edit'])->name('etudiant.edit');
    Route::post('/etudiant/profil', [EtudiantController::class, 'update'])->name('etudiant.update');
    Route::get('/etudiant/entreprise', [EtudiantController::class, 'accueilEntreprise'])->name('etudiant.entreprise');
    Route::get('/etudiant/entreprise/{id}', [EntrepriseController::class, 'show'])->name('entreprise.show');
});

// Routes pour le professeur
Route::middleware('auth:professeur')->group(function () {
    Route::get('/professeur/accueil', [ProfesseurController::class, 'accueil'])->name('professeur.accueil');
    Route::get('/professeur/profil', [ProfesseurController::class, 'edit'])->name('professeur.edit');
    Route::post('/professeur/profil', [ProfesseurController::class, 'update'])->name('professeur.update');
    Route::get('/professeur/entreprise', [ProfesseurController::class, 'accueilEntreprise'])->name('professeur.entreprise');
    Route::get('/professeur/entreprise/create', [EntrepriseController::class, 'create'])->name('entreprise.create');
    Route::post('/entreprise', [EntrepriseController::class, 'store'])->name('entreprise.store');
});

// Routes pour l'entreprise
Route::middleware('auth:entreprise')->group(function () {
    Route::get('/entreprise/accueil', [EntrepriseController::class, 'accueil'])->name('entreprise.accueil');
    Route::get('/entreprise/entreprise', [EntrepriseController::class, 'accueilEntreprise'])->name('entreprise.entreprise');
});
