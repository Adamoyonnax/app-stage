<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfesseurController extends Controller
{
    public function create(): View
    {
        return view('professeur.accueil-vueProfesseur');
    }
}
