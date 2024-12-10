<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function accueil()
    {
        return view('etudiant.accueil.accueil-vueEtudiant'); // Afficher la vue d'accueil de l'étudiant
    }
}
