@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Modifier votre profil</h1>

        <!-- Formulaire pour modifier le profil du professeur -->
        <form action="{{ route('professeur.update') }}" method="POST">
            @csrf <!-- Protection CSRF pour éviter les attaques CSRF -->

            <!-- Champ pour le prénom du professeur -->
            <div>
                <label for="prenom_prof">Prénom :</label>
                <input type="text" name="prenom_prof" id="prenom_prof"
                    value="{{ old('prenom_prof', $professeur->prenom_prof) }}" required>
                <!-- Affichage d'une erreur de validation si présente -->
                @error('prenom_prof')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>

            <!-- Champ pour le nom du professeur -->
            <div>
                <label for="nom_prof">Nom :</label>
                <input type="text" name="nom_prof" id="nom_prof"
                    value="{{ old('nom_prof', $professeur->nom_prof) }}" required>
                <!-- Affichage d'une erreur de validation si présente -->
                @error('nom_prof')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>

            <!-- Champ pour l'email du professeur -->
            <div>
                <label for="email">Email :</label>
                <input type="email" name="email" id="email"
                    value="{{ old('email', $professeur->email) }}" required>
                <!-- Affichage d'une erreur de validation si présente -->
                @error('email')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>

            <!-- Bouton de soumission pour mettre à jour les informations -->
            <button type="submit">Mettre à jour</button>
        </form>
    </div>
@endsection
