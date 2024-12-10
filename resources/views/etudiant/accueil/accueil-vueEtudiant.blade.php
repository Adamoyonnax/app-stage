@extends('layouts.app')

@section('content')

    <div class="container">

        <!-- Déboguer avec dd -->
        @php
            dd(auth()->user()); // Vérifie l'état de l'utilisateur connecté
        @endphp

        <h1>Page d'accueil de l'étudiant</h1>
        <p>Contenu de la page d'accueil de l'étudiant.</p>

    </div>
@endsection
