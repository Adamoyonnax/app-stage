@extends('layouts.main')

@section('content')
    <h1>Créer une entreprise</h1>

    <form action="{{ route('entreprise.store') }}" method="POST">
        @csrf <!-- Token CSRF pour la sécurité -->

        <div>
            <label for="raison_sociale">Nom de l'entreprise :*</label>
            <input type="text" name="raison_sociale" id="raison_sociale" value="{{ old('raison_sociale') }}" required>
            @error('raison_sociale')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="nom_contact">Nom du contact :</label>
            <input type="text" name="nom_contact" id="nom_contact" value="{{ old('nom_contact') }}">
            @error('nom_contact')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="nom_resp">Nom du reponsable :</label>
            <input type="text" name="nom_resp" id="nom_resp" value="{{ old('nom_resp') }}">
        </div>

        <div>
            <label for="rue_entreprise">Rue :</label>
            <input type="text" name="rue_entreprise" id="rue_entreprise" value="{{ old('rue_entreprise') }}">
            @error('rue_entreprise')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="cp_entreprise">Code Postal :</label>
            <input type="text" name="cp_entreprise" id="cp_entreprise" value="{{ old('cp_entreprise') }}">
            @error('cp_entreprise')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="ville_entreprise">Ville* :</label>
            <input type="text" name="ville_entreprise" id="ville_entreprise" value="{{ old('ville_entreprise') }}" required>
            @error('ville_entreprise')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="tel_entreprise">Téléphone* :</label>
            <input type="text" name="tel_entreprise" id="tel_entreprise" value="{{ old('tel_entreprise') }}" required>
            @error('ville_entreprise')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="fax_entreprise">FAX :</label>
            <input type="text" name="fax_entreprise" id="fax_entreprise" value="{{ old('fax_entreprise') }}">
            @error('fax_entreprise')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}">
            @error('email')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="observation">Observation :</label>
            <input type="text" name="observation" id="observation" value="{{ old('observation') }}">
            @error('observation')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="site_entreprise">Site :</label>
            <input type="text" name="site_entreprise" id="site_entreprise" value="{{ old('site_entreprise') }}">
            @error('site_entreprise')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="niveau">Niveau* :</label>
            <input type="text" name="niveau" id="niveau" value="{{ old('niveau') }}" required>
            @error('niveau')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="specialites">Spécialité :</label>
            <select name="specialites[]" id="specialites" multiple>
                @foreach ($specialites as $specialite)
                    <!-- Utilisation de 'libelle' pour la valeur et 'nom' pour l'affichage -->
                    <option value="{{ $specialite->num_spec }}" {{ in_array($specialite->num_spec, old('specialites', [])) ? 'selected' : '' }}>
                        {{ $specialite->libelle }}
                    </option>
                @endforeach
            </select>
            @error('specialite')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="login">Login :</label>
            <input type="text" name="login" id="login" value="{{ old('login') }}">
            @error('login')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="mdp">Mot de passe :</label>
            <input type="password" name="mdp" id="mdp" value="{{ old('mdp') }}">
            @error('mdp')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>




        <div>
            <button type="submit">Créer</button>
        </div>
    </form>
@endsection