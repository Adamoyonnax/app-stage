@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Modifier votre profil</h1>

        <!-- Formulaire pour modifier le profil de l'étudiant -->
        <form action="{{ route('etudiant.update') }}" method="POST">
            @csrf <!-- Protection CSRF pour éviter les attaques CSRF -->

            <!-- Champ pour le prénom de l'étudiant -->
            <div>
                <label for="prenom_etudiant">Prénom :</label>
                <input type="text" name="prenom_etudiant" id="prenom_etudiant"
                    value="{{ old('prenom_etudiant', $etudiant->prenom_etudiant) }}" required>
                <!-- Si le champ est invalide, afficher le message d'erreur -->
                @error('prenom_etudiant')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>

            <!-- Champ pour le nom de l'étudiant -->
            <div>
                <label for="nom_etudiant">Nom :</label>
                <input type="text" name="nom_etudiant" id="nom_etudiant"
                    value="{{ old('nom_etudiant', $etudiant->nom_etudiant) }}" required>
                <!-- Si le champ est invalide, afficher le message d'erreur -->
                @error('nom_etudiant')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>

            <!-- Bouton pour mettre à jour les informations -->
            <button type="submit">Mettre à jour</button>
        </form>
    </div>
@endsection
