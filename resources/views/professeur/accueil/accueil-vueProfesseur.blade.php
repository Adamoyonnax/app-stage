@extends('layouts.main')

@section('content')

    <div class="container">
        <h1>Page d'accueil de {{ $professeur->prenom_prof }}</h1>
        <p>Contenu de la page d'accueil du professeur.</p>

        <a href="{{ route('professeur.edit') }}">
            <button type="button">Modifier mon profil</button>
        </a>
    </div>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Se déconnecter</button>
    </form>
@endsection

