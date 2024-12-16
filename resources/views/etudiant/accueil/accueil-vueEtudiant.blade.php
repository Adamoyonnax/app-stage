@extends('layouts.main')

@section('content')

    <div class="container">
        <!-- Titre de la page, affichant le prénom de l'étudiant -->
        <h1>Page d'accueil de {{ $etudiant->prenom_etudiant }}</h1>
        <p>Bienvenue, vous êtes connecté(e) en tant qu'étudiant.</p>
    </div>

    <!-- Lien pour modifier le profil de l'étudiant -->
    <a href="{{ route('etudiant.edit') }}">
        <button type="button">Modifier mon profil</button>
    </a>

    <!-- Formulaire pour se déconnecter -->
    <form action="{{ route('logout') }}" method="POST">
        <!-- Protection CSRF pour éviter les attaques CSRF sur la déconnexion -->
        @csrf
        <button type="submit">Se déconnecter</button>
    </form>
@endsection

