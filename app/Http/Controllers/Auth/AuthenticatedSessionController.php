<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Etudiant;
use App\Models\Professeur;


class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */

    /* public function create(): View
    {
        return view('auth.login');
    } */


    public function store(Request $request)
    {
        $request->validate([
            'login' => 'required|string',
            'mdp' => 'required|string',
        ]);

        // Vérification dans la table 'etudiant'
        $etudiant = Etudiant::where('login', $request->login)->first();
        if ($etudiant && Hash::check($request->mdp, $etudiant->mdp)) {
            Auth::login($etudiant);
            return redirect()->route('etudiant.accueil');
        }

        // Vérification dans la table 'professeur'
        $professeur = Professeur::where('login', $request->login)->first();
        if ($professeur && Hash::check($request->mdp, $professeur->mdp)) {
            Auth::login($professeur);
            return redirect()->route('professeur.accueil');
        }

        return redirect()->route('login')->withErrors(['error_connexion' => 'Identifiants incorrects']);
    }



    /**
     * Destroy an authenticated session.
    */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
