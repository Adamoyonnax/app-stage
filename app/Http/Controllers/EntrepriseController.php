<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use Illuminate\Http\Request;

class EntrepriseController extends Controller
{

    public function accueil()
    {
        return view('entreprise.accueil.accueil-vueEntreprise'); // Afficher la vue d'accueil du professeur
    }

    public function index()
    {
        $entreprises = Entreprise::with(['specialites' => function ($query) {
            $query->distinct();
        }])->get();
        return view('etudiant.entreprise.entreprise-vueEtudiant', compact('entreprises'));
    }

    public function show($id){
        // Récupérer l'entreprise avec ses relations (par exemple, spécialités)
        $entreprise = Entreprise::with('specialites')->findOrFail($id);

        // Retourner une vue avec les détails de l'entreprise
        return view('etudiant.entreprise.entreprise-detailEntreprise', compact('entreprise'));
    }
}
