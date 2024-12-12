@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Modifier votre profil</h1>


        <form action="{{ route('professeur.update') }}" method="POST">
            @csrf
            <!-- Prénom -->
            <div>
                <label for="prenom_prof">Prénom :</label>
                <input type="text" name="prenom_prof" id="prenom_prof" value="{{ old('prenom_prof', $professeur->prenom_prof) }}" required>
                @error('prenom_prof')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="nom_prof">Nom :</label>
                <input type="text" name="nom_prof" id="nom_prof" value="{{ old('nom_prof', $professeur->nom_prof) }}" required>
                @error('nom_prof')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email">Email :</label>
                <input type="email" name="email" id="email" value="{{ old('email', $professeur->email) }}" required>
                @error('email')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit">Mettre à jour</button>
        </form>
    </div>
@endsection
