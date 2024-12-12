
@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Modifier votre profil</h1>


        <form action="{{ route('etudiant.update') }}" method="POST">
            @csrf
            <!-- Prénom -->
            <div>
                <label for="prenom_etudiant">Prénom :</label>
                <input type="text" name="prenom_etudiant" id="prenom_etudiant" value="{{ old('prenom_etudiant', $etudiant->prenom_etudiant) }}" required>
                @error('prenom_etudiant')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="nom_etudiant">Nom :</label>
                <input type="text" name="nom_etudiant" id="nom_etudiant" value="{{ old('nom_etudiant', $etudiant->nom_etudiant) }}" required>
                @error('prenom_etudiant')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit">Mettre à jour</button>
        </form>
    </div>
@endsection
