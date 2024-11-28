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
        // Valider les données de la requête
        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        // Vérifier dans la table `etudiants`
        $etudiant = Etudiant::where('login', $request->login)->first();
        if ($etudiant && $request->password === $etudiant->mdp) {
            // Authentifier l'étudiant
            Auth::login($etudiant);

            return redirect()->route('accueil-vueEtudiant');
        }

        // Vérifier dans la table `professeurs`
        $professeur = Professeur::where('login', $request->login)->first();
        if ($professeur && $request->password === $professeur->mdp) {
            // Authentifier le professeur
            Auth::login($professeur);

            return redirect()->route('accueil-vueProfesseur');
        }

        // Si aucune correspondance
        return redirect()->to(url()->previous() . '?error=1')->withInput();
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
