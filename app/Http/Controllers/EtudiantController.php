<?php

namespace App\Http\Controllers;

use App\Models\Etudiant; // Ne pas oublier !!!!
use Illuminate\Http\Request;

class EtudiantController extends Controller{

    public function index()
    {
        // Récupérer tous les étudiants
        $etudiants = Etudiant::all();

        // Charger la vue d'accueil avec la liste des étudiants
        return view('accueil', compact('etudiants'));
    }
}
