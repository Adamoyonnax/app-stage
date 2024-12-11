@extends('layouts.main')

@section('content')

    <div class="container">
        <h1>Page d'accueil de {{ session('societe') }}</h1>
        <p>Contenu de la page d'accueil de l'Entreprise.</p>
    </div>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Se déconnecter</button>
    </form>
@endsection
