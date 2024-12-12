<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\Specialite;

use Illuminate\Http\Request;

class EntrepriseController extends Controller
{

    public function accueil()
    {
        return view('entreprise.accueil.accueil-vueEntreprise');
    }

    public function accueilEtudiant()
    {
        $entreprises = Entreprise::with(['specialites' => function ($query) {
            $query->distinct();
        }])->get();
        return view('etudiant.entreprise.entreprise-vueEtudiant', compact('entreprises'));
    }

    public function accueilEntreprise()
    {
        $entreprises = Entreprise::with(['specialites' => function ($query) {
            $query->distinct();
        }])->get();
        return view('entreprise.entreprise.entreprise-vueEntreprise', compact('specialites'));
    }

    public function create()
    {
        $specialites = Specialite::all();
        return view('professeur.entreprise.entreprise-creerEntreprise', compact('specialites'));
    }

    public function show($id){
        // Récupérer l'entreprise avec ses relations (par exemple, spécialités)
        $entreprise = Entreprise::with('specialites')->findOrFail($id);

        // Retourner une vue avec les détails de l'entreprise
        return view('etudiant.entreprise.entreprise-detailEntreprise');
    }

    public function store(Request $request)
    {
        // Validation des données du formulaire
        $validated = $request->validate([
            'raison_sociale' => 'required|string|max:255',
            'nom_contact' => 'nullable|string|max:255',
            'nom_resp' => 'nullable|string|max:50',
            'rue_entreprise' => 'nullable|string|max:50',
            'cp_entreprise' => 'nullable|string|max:50',
            'ville_entreprise' => 'required|string|max:50',
            'tel_entreprise' => 'nullable|string|max:50',
            'fax_entreprise' => 'nullable|string|max:50',
            'email' => 'nullable|email',
            'observation' => 'nullable|string|max:255',
            'site_entreprise' => 'nullable|string|max:255',
            'specialites' => 'nullable|array',
            'specialites.*' => 'exists:specialite,num_spec',
            'niveau' => 'string|max:255',
            'login' => 'string|max:255',
            'mdp' => 'string|max:255',

        ]);

        // Créer et enregistrer l'entreprise
        $entreprise = Entreprise::create($validated);

        // Attacher les spécialités à l'entreprise
        if ($request->has('specialites')) {
            $entreprise->specialites()->attach($request->specialites);
        }

        // Rediriger après l'enregistrement
        return redirect()->route('entreprise.accueil')->with('success', 'Entreprise créée avec succès');
    }

}
