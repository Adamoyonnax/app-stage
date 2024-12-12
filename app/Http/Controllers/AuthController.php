<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Etudiant;
use App\Models\Professeur;
use App\Models\Entreprise;


class AuthController extends Controller
{
    // Etablit la connexion
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
            session([
                'user_type' => 'etudiant',
                'etudiant_id' => $etudiant->num_etudiant,
                'prenom' => $etudiant->prenom_etudiant,
            ]);
<<<<<<< HEAD

            if (Auth::guard('etudiant')->check()) {
                return redirect()->route('etudiant.accueil');
            } else {
                // Débogage si l'utilisateur n'est pas authentifié
                dd('L\'authentification a échoué malgré la connexion.');
            }

=======
            return redirect()->route('etudiant.accueil');
>>>>>>> e666abb81ebdaa8c65e8186e555fb7ec2c1fb3f2
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

        // Vérifier si l'utilisateur est un professeur
        $entreprise = Entreprise::where('login', $request->login)->first();
        if ($entreprise && $entreprise->mdp === $request->mdp) {
            Auth::guard('entreprise')->login($entreprise);
            session([
                'user_type' => 'entreprise',
                'entreprise_id' => $entreprise->num_entreprise,
                'societe' => $entreprise->raison_sociale,
            ]);
            return redirect()->route('entreprise.accueil');
        }

        // Si l'utilisateur n'est pas trouvé ou les mots de passe ne correspondent pas
        return redirect()->route('accueil')->with('error_connexion', 'Identifiants incorrects');
    }

    public function logout()
    {
        auth()->logout();
        session()->flush();
        return redirect()->route('accueil'); // Rediriger vers la page de connexion après la déconnexion
    }
}

