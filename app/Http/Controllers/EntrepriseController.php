<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use Illuminate\Http\Request;

class EntrepriseController extends Controller
{
    public function index()
    {
        $entreprises = Entreprise::with(['specialites' => function ($query) {
            $query->distinct();
        }])->get();
        return view('etudiant.entreprise-vueEtudiant', compact('entreprises'));
    }
}
