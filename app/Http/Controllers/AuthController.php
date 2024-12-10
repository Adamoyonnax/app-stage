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
        // dd('ok1');
        if ($etudiant && $etudiant->mdp === $request->mdp) {
            Auth::guard('etudiant')->login($etudiant);
            session([
                'user_type' => 'etudiant',
                'etudiant_id' => $etudiant->num_etudiant,
                'prenom' => $etudiant->prenom_etudiant,
            ]);

            if (Auth::guard('etudiant')->check()) {
                // dd('Utilisateur authentifié en tant qu\'étudiant', Auth::guard('etudiant')->user());
                return redirect()->route('etudiant.accueil');
            } else {
                // Débogage si l'utilisateur n'est pas authentifié
                dd('L\'authentification a échoué malgré la connexion.');
            }

        }
        // Vérifier si l'utilisateur est un professeur
        $professeur = Professeur::where('login', $request->login)->first();
        if ($professeur && $professeur->mdp === $request->mdp) {
            Auth::guard('professeur')->login($professeur);
            session([
                'user_type' => 'professeur',
                'professeur_id' => $professeur->num_prof,
                'prenom' => $professeur->prenom_prof,
            ]);
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

