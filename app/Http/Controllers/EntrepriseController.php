<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\Specialite;
use Illuminate\Http\Request;

class EntrepriseController extends Controller
{
    // Méthode d'accueil pour l'entreprise (page d'accueil)
    public function accueil()
    {
        // Retourne la vue d'accueil de l'entreprise
        return view('entreprise.accueil.accueil-vueEntreprise');
    }

    // Méthode pour afficher la liste des entreprises et opérations pour un utilisateur entreprise
    public function accueilEntreprise()
    {
        // Récupère toutes les entreprises avec leurs spécialités (distinctes)
        $entreprises = Entreprise::with(['specialites' => function ($query) {
            $query->distinct();
        }])->get();


        // Retourne la vue des entreprises pour l'utilisateur entreprise (avec les spécialités)
        return view('entreprise.entreprise.entreprise-vueEntreprise', compact('entreprises'));
    }

    // Méthode pour afficher le formulaire de création d'une entreprise
    public function create()
    {
        // Récupère toutes les spécialités disponibles
        $specialites = Specialite::all();

        // Retourne la vue de création d'entreprise avec les spécialités
        return view('professeur.entreprise.entreprise-creerEntreprise', compact('specialites'));
    }

    // Méthode pour afficher les détails d'une entreprise
    public function show($id)
    {
        // Récupère l'entreprise avec ses spécialités (en cas de relations entre les entités)
        $entreprise = Entreprise::with('specialites')->findOrFail($id);

        // Retourne la vue de détail de l'entreprise avec les données de l'entreprise
        return view('etudiant.entreprise.entreprise-detailEntreprise', compact('entreprise'));
    }

    // Méthode pour stocker une nouvelle entreprise dans la base de données
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $validated = $request->validate([
            'raison_sociale' => 'required|string|max:255', // Nom de l'entreprise obligatoire
            'nom_contact' => 'nullable|string|max:255', // Nom du contact, facultatif
            'nom_resp' => 'nullable|string|max:50', // Nom du responsable, facultatif
            'rue_entreprise' => 'nullable|string|max:50', // Rue, facultatif
            'cp_entreprise' => 'nullable|string|max:50', // Code postal, facultatif
            'ville_entreprise' => 'required|string|max:50', // Ville obligatoire
            'tel_entreprise' => 'nullable|string|max:50', // Téléphone, facultatif
            'fax_entreprise' => 'nullable|string|max:50', // Fax, facultatif
            'email' => 'nullable|email', // Email, facultatif mais si présent doit être valide
            'observation' => 'nullable|string|max:255', // Observation, facultatif
            'site_entreprise' => 'nullable|string|max:255', // Site web, facultatif
            'specialites' => 'nullable|array', // Spécialités, facultatif
            'specialites.*' => 'exists:specialite,num_spec', // Vérifier que les spécialités existent
            'niveau' => 'string|max:255', // Niveau, facultatif
            'login' => 'string|max:255', // Login, facultatif
            'mdp' => 'string|max:255', // Mot de passe, facultatif
        ]);

        // Créer une nouvelle entreprise dans la base de données
        $entreprise = Entreprise::create($validated);

        // Si des spécialités sont sélectionnées, les attacher à l'entreprise
        if ($request->has('specialites')) {
            $entreprise->specialites()->attach($request->specialites);
        }

        // Rediriger vers la page d'accueil des entreprises avec un message de succès
        return redirect()->route('entreprise.accueil')->with('success', 'Entreprise créée avec succès');
    }
}
