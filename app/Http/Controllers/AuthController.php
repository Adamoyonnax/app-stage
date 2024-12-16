<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Etudiant;
use App\Models\Professeur;
use App\Models\Entreprise;

class AuthController extends Controller
{
    // Méthode pour gérer la connexion des utilisateurs
    public function connexion(Request $request)
    {
        // Valider les données saisies par l'utilisateur
        $request->validate([
            'login' => 'required|string',  // Le champ login est requis et doit être une chaîne de caractères
            'mdp' => 'required|string',    // Le champ mdp (mot de passe) est requis et doit être une chaîne de caractères
        ]);

        // Vérifier si l'utilisateur est un étudiant
        $etudiant = Etudiant::where('login', $request->login)->first();
        if ($etudiant && $etudiant->mdp === $request->mdp) {  // Vérifier si l'étudiant existe et si le mot de passe est correct
            // Authentifier l'étudiant et le connecter via le "guard" spécifique aux étudiants
            Auth::guard('etudiant')->login($etudiant);

            // Stocker les informations de session liées à l'étudiant
            session([
                'user_type' => 'etudiant',  // Type d'utilisateur, ici étudiant
                'etudiant_id' => $etudiant->num_etudiant,  // ID de l'étudiant
                'prenom' => $etudiant->prenom_etudiant,  // Prénom de l'étudiant
            ]);

            // Rediriger l'étudiant vers sa page d'accueil
            return redirect()->route('etudiant.accueil');
        }

        // Vérifier si l'utilisateur est un professeur
        $professeur = Professeur::where('login', $request->login)->first();
        if ($professeur && $professeur->mdp === $request->mdp) {  // Vérifier si le professeur existe et si le mot de passe est correct
            // Authentifier le professeur et le connecter via le "guard" spécifique aux professeurs
            Auth::guard('professeur')->login($professeur);

            // Stocker les informations de session liées au professeur
            session([
                'user_type' => 'professeur',  // Type d'utilisateur, ici professeur
                'professeur_id' => $professeur->num_prof,  // ID du professeur
                'prenom' => $professeur->prenom_prof,  // Prénom du professeur
            ]);

            // Rediriger le professeur vers sa page d'accueil
            return redirect()->route('professeur.accueil');
        }

        // Vérifier si l'utilisateur est une entreprise
        $entreprise = Entreprise::where('login', $request->login)->first();
        if ($entreprise && $entreprise->mdp === $request->mdp) {  // Vérifier si l'entreprise existe et si le mot de passe est correct
            // Authentifier l'entreprise et la connecter via le "guard" spécifique aux entreprises
            Auth::guard('entreprise')->login($entreprise);

            // Stocker les informations de session liées à l'entreprise
            session([
                'user_type' => 'entreprise',  // Type d'utilisateur, ici entreprise
                'entreprise_id' => $entreprise->num_entreprise,  // ID de l'entreprise
                'societe' => $entreprise->raison_sociale,  // Nom de l'entreprise
            ]);

            // Rediriger l'entreprise vers sa page d'accueil
            return redirect()->route('entreprise.accueil');
        }

        // Si aucun utilisateur trouvé avec ces identifiants ou si les mots de passe ne correspondent pas
        // Rediriger l'utilisateur vers la page d'accueil avec un message d'erreur
        return redirect()->route('accueil')->with('error_connexion', 'Identifiants incorrects');
    }

    // Méthode pour gérer la déconnexion
    public function logout()
    {
        // Déconnecter l'utilisateur
        auth()->logout();

        // Effacer toutes les données de session
        session()->flush();

        // Rediriger l'utilisateur vers la page d'accueil après la déconnexion
        return redirect()->route('accueil');
    }
}
