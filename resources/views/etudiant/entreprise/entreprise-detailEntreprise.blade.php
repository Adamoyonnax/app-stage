@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Détails de l'entreprise</h1>

        <!-- Affichage des détails de l'entreprise -->
        <p><strong>Nom de l'entreprise :</strong> {{ $entreprise->raison_sociale }}</p>
        <p><strong>Nom du contact :</strong> {{ $entreprise->nom_contact }}</p>
        <p><strong>Nom du responsable :</strong> {{ $entreprise->nom_resp }}</p>
        <p><strong>Rue :</strong> {{ $entreprise->rue_entreprise }}</p>
        <p><strong>Code postal :</strong> {{ $entreprise->cp_entreprise }}</p>
        <p><strong>Ville :</strong> {{ $entreprise->ville_entreprise }}</p>
        <p><strong>Téléphone :</strong> {{ $entreprise->tel_entreprise }}</p>
        <p><strong>Fax :</strong> {{ $entreprise->fax_entreprise }}</p>
        <p><strong>Email :</strong> {{ $entreprise->email }}</p>
        <p><strong>Observation :</strong> {{ $entreprise->observation }}</p>
        <p><strong>URL du site :</strong> {{ $entreprise->site_entreprise }}</p>
        <p><strong>Niveau :</strong> {{ $entreprise->niveau }}</p>

        <!-- Affichage des spécialités de l'entreprise -->
        <p><strong>Spécialités :</strong>
            @if ($entreprise->specialites->isEmpty())
                Aucune spécialité
            @else
                @foreach ($entreprise->specialites as $specialite)
                    {{ $specialite->libelle }}@if (!$loop->last), @endif
                @endforeach
            @endif
        </p>
    </div>
@endsection
