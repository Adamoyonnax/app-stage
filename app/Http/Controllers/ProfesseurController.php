<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfesseurController extends Controller
{
    public function accueil()
    {
        return view('professeur.accueil.accueil-vueProfesseur'); // Afficher la vue d'accueil du professeur
    }
}
