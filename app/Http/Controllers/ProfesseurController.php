<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entreprise;
use App\Models\professeur;



class ProfesseurController extends Controller
{
    public function accueil()
    {
        $professeurId = session('professeur_id');
        $professeur = professeur::find($professeurId);
        return view('professeur.accueil.accueil-vueProfesseur',compact('professeur')); // Afficher la vue d'accueil du professeur
    }

    public function edit()
    {
        $professeurId = session('professeur_id');
        $professeur = professeur::find($professeurId);

        // Afficher la vue avec les données de l'étudiant
        return view('professeur.accueil.accueil-modifierProfil', compact('professeur'));
    }

    public function update(Request $request)
    {
        // Valider les données du formulaire
        $validated = $request->validate([
            'nom_prof' => 'required|string|max:64',
            'prenom_prof' => 'required|string|max:64',
            'email' => 'required|email'
        ]);

        // Récupérer l'ID de l'étudiant à partir de la session
        $professeurId = session('professeur_id');
        $professeur = professeur::find($professeurId);

        // Mettre à jour les informations de l'étudiant
        $professeur->update($validated);

        // Retourner une confirmation ou rediriger avec succès
        return redirect()->route('professeur.accueil')->with('success', 'Votre profil a été mis à jour avec succès.');
    }

    public function accueilEntreprise()
    {
        $entreprises = Entreprise::with(['specialites' => function ($query) {
            $query->distinct();
        }])->get();
        return view('professeur.entreprise.entreprise-vueProfesseur', compact('entreprises'));
    }
}
