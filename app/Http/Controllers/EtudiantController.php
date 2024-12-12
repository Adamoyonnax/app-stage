<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Entreprise;
use App\Models\Etudiant;



class EtudiantController extends Controller
{
    public function accueil()
    {
        $etudiantId = session('etudiant_id');
        $etudiant = Etudiant::find($etudiantId);
        return view('etudiant.accueil.accueil-vueEtudiant', compact('etudiant'));
    }

    public function accueilEntreprise()
    {
        $entreprises = Entreprise::with(['specialites' => function ($query) {
            $query->distinct();
        }])->get();
        return view('etudiant.entreprise.entreprise-vueEtudiant', compact('entreprises'));
    }

    public function edit()
    {
        $etudiantId = session('etudiant_id');
        $etudiant = Etudiant::find($etudiantId);

        // Afficher la vue avec les données de l'étudiant
        return view('etudiant.accueil.accueil-modifierProfil', compact('etudiant'));
    }

    public function update(Request $request)
    {
        // Valider les données du formulaire
        $validated = $request->validate([
            'nom_etudiant' => 'required|string|max:64',
            'prenom_etudiant' => 'required|string|max:64'
        ]);

        // Récupérer l'ID de l'étudiant à partir de la session
        $etudiantId = session('etudiant_id');
        $etudiant = Etudiant::find($etudiantId); // Trouver l'étudiant à mettre à jour

        // Mettre à jour les informations de l'étudiant
        $etudiant->update($validated);

        // Retourner une confirmation ou rediriger avec succès
        return redirect()->route('etudiant.accueil')->with('success', 'Votre profil a été mis à jour avec succès.');
    }
}
