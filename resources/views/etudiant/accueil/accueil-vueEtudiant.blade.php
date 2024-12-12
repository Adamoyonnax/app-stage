@extends('layouts.main')

@section('content')

    <div class="container">
        <h1>Page d'accueil de {{ $etudiant->prenom_etudiant }}</h1>
        <p>Bienvenue, vous êtes connecté(e) en tant qu'étudiant.</p>
    </div>

    <a href="{{ route('etudiant.edit') }}">
            <button type="button">Modifier mon profil</button>
    </a>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Se déconnecter</button>
    </form>
@endsection

