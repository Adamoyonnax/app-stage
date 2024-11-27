<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;
use App\Models\Professeur;
use Illuminate\Support\Facades\Auth;

class AccueilController extends Controller
{
    public function index()
    {
        // Récupérer l'utilisateur actuellement connecté
        $user = Auth::user();

        // Vérifier si l'utilisateur est authentifié
        if (!$user) {
            return redirect('/'); // Rediriger vers la page de connexion ('/') si l'utilisateur n'est pas authentifié
        }

        // Vérifier si l'utilisateur est un étudiant
        if ($user instanceof Etudiant) {
            return view('accueil.vueEtudiant-accueil', compact('user'));
        }

        // Vérifier si l'utilisateur est un professeur
        if ($user instanceof Professeur) {
            return view('accueil.vueProfesseur-accueil', compact('user'));
        }
    }
}
