@extends('layouts.main')

@section('content')
    <div class="connection" style="width: 50%">

        <h1 class="text-center">Gestion des stages</h1>
        <p class="text-center">Vous n'êtes pas connecté. Identifiez-vous pour poursuivre la navigation.</p>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Login -->
            <div class="mb-4">
                <label for="login" class="block text-sm font-medium text-gray-300">Login :</label>
                <input type="text" id="login" name="login" class="input" style="color: black" required autofocus>
            </div>

            <!-- Mot de passe -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-300">Mot de passe :</label>
                <input type="password" id="password" name="password" class="input" style="color: black" required>
            </div>

            <!-- Bouton de connexion -->
            <div class="text-center">
                <x-primary-button class='bg-gray-300'>Envoyer</x-button>
            </div>
        </form>
    </div>
@endsection
