<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Etudiant;
use App\Models\Professeur;

class ConnexionController extends Controller
{
    // Gestion de la connexion
    public function login(Request $request)
    {
        // Valider les données d'entrée
        $validated = $request->validate([
            'login' => 'required|string',  // Identifiant (login, email, matricule, etc.)
            'mdp' => 'required|string',  // Mot de passe
        ]);

        // Chercher si l'utilisateur est un étudiant
        $etudiant = Etudiant::where('login', $validated['login'])->first();
        if ($etudiant && $etudiant->mdp === $validated['mdp']) {
            // Connexion de l'étudiant
            Auth::login($etudiant);  // On utilise Auth::login pour authentifier l'étudiant
            return redirect()->route('etudiant.accueil');  // Rediriger vers l'accueil de l'étudiant
        }

        // Chercher si l'utilisateur est un professeur
        $professeur = Professeur::where('login', $validated['login'])->first();
        if ($professeur && $professeur->mdp === $validated['mdp']) {
            // Connexion du professeur
            Auth::login($professeur);  // On utilise Auth::login pour authentifier le professeur
            return redirect()->route('professeur.accueil');  // Rediriger vers l'accueil du professeur
        }

        // Si l'authentification échoue
        return redirect()->to(url()->previous() . '?error=IDMauvaise')->withInput();
    }

    // Déconnexion
    public function logout()
    {
        Auth::logout();
        return redirect('/');  // Redirection vers la page d'accueil
    }
}
