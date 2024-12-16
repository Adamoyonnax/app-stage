@extends('layouts.main')

@section('content')

    <div class="container">
        <!-- Titre de la page, affichant le nom du professeur -->
        <h1>Page d'accueil de {{ $professeur->prenom_prof }}</h1>
        <p>Contenu de la page d'accueil du professeur.</p>

        <!-- Lien pour modifier le profil de l'étudiant -->
        <a href="{{ route('professeur.edit') }}">
            <button type="button">Modifier mon profil</button>
        </a>
    </div>

    <!-- Formulaire pour se déconnecter -->
    <form action="{{ route('logout') }}" method="POST">
        <!-- Protection CSRF pour éviter les attaques CSRF sur la déconnexion -->
        @csrf
        <button type="submit">Se déconnecter</button>
    </form>
@endsection

