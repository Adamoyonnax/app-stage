<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Etudiant;
use App\Models\Professeur;

class AuthController extends Controller
{
    public function connexion(Request $request)
    {
        // Valider les données saisies
        $request->validate([
            'login' => 'required|string',
            'mdp' => 'required|string',
        ]);

        // Vérifier si l'utilisateur est un étudiant
        $etudiant = Etudiant::where('login', $request->login)->first();
        if ($etudiant && $etudiant->mdp === $request->mdp) {
            Auth::guard('etudiant')->login($etudiant);
            $dd($etduaitn)
            return redirect()->route('etudiant.accueil');
        }

        // Vérifier si l'utilisateur est un professeur
        $professeur = Professeur::where('login', $request->login)->first();
        if ($professeur && $professeur->mdp === $request->mdp) {
            dd('je passeP');
            Auth::guard('professeur')->login($professeur);
            return redirect()->route('professeur.accueil');
        }
        // Si l'utilisateur n'est pas trouvé ou les mots de passe ne correspondent pas
        return redirect()->route('accueil')->with('error_connexion', 'Identifiants incorrects');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('accueil'); // Rediriger vers la page de connexion après la déconnexion
    }
}

