<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entreprise;
use App\Models\Etudiant;

class EtudiantController extends Controller
{
    // Méthode d'accueil pour l'étudiant
    public function accueil()
    {
        // Récupère l'ID de l'étudiant stocké dans la session
        $etudiantId = session('etudiant_id');

        // Trouve l'étudiant dans la base de données avec l'ID récupéré
        $etudiant = Etudiant::find($etudiantId);

        // Retourne la vue d'accueil pour l'étudiant avec les informations de l'étudiant
        return view('etudiant.accueil.accueil-vueEtudiant', compact('etudiant'));
    }

    // Méthode pour afficher la liste des entreprises pour l'étudiant
    public function accueilEntreprise()
    {
        // Récupère toutes les entreprises avec leurs spécialités distinctes
        $entreprises = Entreprise::with(['specialites' => function ($query) {
            $query->distinct(); // Récupérer les spécialités sans répétitions
        }])->get();

        // Retourne la vue affichant les entreprises disponibles pour l'étudiant
        return view('etudiant.entreprise.entreprise-vueEtudiant', compact('entreprises'));
    }

    // Méthode pour afficher le formulaire de modification du profil de l'étudiant
    public function edit()
    {
        // Récupère l'ID de l'étudiant à partir de la session
        $etudiantId = session('etudiant_id');

        // Trouve l'étudiant à partir de l'ID
        $etudiant = Etudiant::find($etudiantId);

        // Retourne la vue pour modifier le profil de l'étudiant avec ses informations
        return view('etudiant.accueil.accueil-modifierProfil', compact('etudiant'));
    }

    // Méthode pour mettre à jour les informations de l'étudiant
    public function update(Request $request)
    {
        // Validation des données du formulaire
        $validated = $request->validate([
            'nom_etudiant' => 'required|string|max:64', // Nom de l'étudiant obligatoire
            'prenom_etudiant' => 'required|string|max:64' // Prénom de l'étudiant obligatoire
        ]);

        // Récupère l'ID de l'étudiant à partir de la session
        $etudiantId = session('etudiant_id');

        // Trouve l'étudiant dans la base de données en utilisant l'ID
        $etudiant = Etudiant::find($etudiantId);

        // Met à jour les informations de l'étudiant avec les données validées
        $etudiant->update($validated);

        // Redirige vers la page d'accueil avec un message de succès
        return redirect()->route('etudiant.accueil')->with('success', 'Votre profil a été mis à jour avec succès.');
    }
}
