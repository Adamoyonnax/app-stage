@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Bienvenue, {{ $user->nom }}</h1>

        @if ($user instanceof App\Models\Etudiant)
            <p>Votre ID Étudiant : {{ $user->id }}</p>
            <p>Votre email : {{ $user->email }}</p>
            <!-- Autres informations spécifiques à l'étudiant -->
        @elseif ($user instanceof App\Models\Professeur)
            <p>Professeur ID : {{ $user->id }}</p>
            <p>Nom : {{ $user->nom_prof }}</p>
            <!-- Autres informations spécifiques au professeur -->
        @endif

        <!-- Autres informations ou actions selon votre application -->
    </div>
@endsection
