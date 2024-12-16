<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entreprise;
use App\Models\professeur; // À changer dans le modèle pour respecter la convention PascalCase

class ProfesseurController extends Controller
{
    // Méthode d'accueil pour le professeur
    public function accueil()
    {
        // Récupère l'ID du professeur stocké dans la session
        $professeurId = session('professeur_id');

        // Trouve le professeur dans la base de données avec l'ID récupéré
        $professeur = professeur::find($professeurId); // Utilisez 'professeur' en minuscule ici comme votre modèle

        // Retourne la vue d'accueil pour le professeur avec ses informations
        return view('professeur.accueil.accueil-vueProfesseur', compact('professeur'));
    }

    // Méthode pour afficher le formulaire de modification du profil du professeur
    public function edit()
    {
        // Récupère l'ID du professeur à partir de la session
        $professeurId = session('professeur_id');

        // Trouve le professeur à partir de l'ID
        $professeur = professeur::find($professeurId); // Utilisez toujours 'professeur' en minuscule ici

        // Retourne la vue pour modifier le profil du professeur avec ses informations
        return view('professeur.accueil.accueil-modifierProfil', compact('professeur'));
    }

    // Méthode pour mettre à jour les informations du professeur
    public function update(Request $request)
    {
        // Validation des données envoyées par le formulaire
        $validated = $request->validate([
            'nom_prof' => 'required|string|max:64',
            'prenom_prof' => 'required|string|max:64',
            'email' => 'required|email'
        ]);

        // Récupère l'ID du professeur à partir de la session
        $professeurId = session('professeur_id');

        // Trouve le professeur à partir de l'ID
        $professeur = professeur::find($professeurId); // Utilisez 'professeur' en minuscule ici

        // Met à jour les informations du professeur avec les données validées
        $professeur->update($validated);

        // Redirige vers la page d'accueil du professeur avec un message de succès
        return redirect()->route('professeur.accueil')->with('success', 'Votre profil a été mis à jour avec succès.');
    }

    // Méthode pour afficher la liste des entreprises pour le professeur
    public function accueilEntreprise()
    {
        // Récupère toutes les entreprises avec leurs spécialités distinctes
        $entreprises = Entreprise::with(['specialites' => function ($query) {
            $query->distinct(); // Récupérer les spécialités sans répétitions
        }])->get();

        // Retourne la vue affichant les entreprises disponibles pour le professeur
        return view('professeur.entreprise.entreprise-vueProfesseur', compact('entreprises'));
    }
}
