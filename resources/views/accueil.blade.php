@extends('layouts.main')

@section('content')
    <div class="connection" style="width: 50%">
        <h1 class="text-center">Gestion des stages</h1>
        <p class="text-center">Vous n'êtes pas connecté. Identifiez-vous pour poursuivre la navigation.</p>

        <!-- Formulaire de connexion -->
        <form method="POST" action="{{ route('connexion') }}">
            @csrf <!-- Protection CSRF pour la sécurité des formulaires dans Laravel -->

            <!-- Champ pour le login (nom d'utilisateur ou identifiant) -->
            <div class="mb-4">
                <label for="login" class="block text-sm font-medium text-gray-300">Login :</label>
                <input type="text" id="login" name="login" class="input" style="color: black" required autofocus>
                <!-- 'required' fait en sorte que ce champ soit obligatoire et 'autofocus' place le curseur dans ce champ dès que la page se charge -->
            </div>

            <!-- Champ pour le mot de passe -->
            <div class="mb-4">
                <label for="mdp" class="block text-sm font-medium text-gray-300">Mot de passe :</label>
                <input type="password" id="mdp" name="mdp" class="input" style="color: black" required>
                <!-- 'required' fait en sorte que ce champ soit obligatoire -->
            </div>

            <!-- Affichage d'un message d'erreur s'il y a un problème de connexion -->
            @if(session('error_connexion'))
                <div class="alert alert-danger">
                    {{ session('error_connexion') }}
                </div>
            @endif
            <!-- Si une erreur est présente dans la session (par exemple mauvaise combinaison login/mdp), elle sera affichée ici. -->

            <!-- Bouton pour envoyer le formulaire -->
            <div class="text-center">
                <!-- Utilisation d'un composant personnalisé pour le bouton -->
                <x-primary-button class='bg-gray-300'>Envoyer</x-primary-button>
            </div>
        </form>
    </div>
@endsection
