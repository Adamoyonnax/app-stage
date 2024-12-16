@extends('layouts.main')

@section('content')

    <div class="container">
        <!-- Titre de la page, affichant le nom de l'entreprise -->
        <h1>Page d'accueil de {{ session('societe') }}</h1>
        <p>Contenu de la page d'accueil de l'Entreprise.</p>
    </div>

    <!-- Formulaire pour se déconnecter -->
    <form action="{{ route('logout') }}" method="POST">
        <!-- Protection CSRF pour éviter les attaques CSRF sur la déconnexion -->
        @csrf
        <button type="submit">Se déconnecter</button>
    </form>
@endsection
