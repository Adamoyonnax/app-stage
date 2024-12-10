@extends('layouts.main')

@section('content')

    <div class="container">
        <h1>Page d'accueil de {{ session('prenom') }}</h1>
        <p>Contenu de la page d'accueil de l'étudiant.</p>
    </div>
@endsection

