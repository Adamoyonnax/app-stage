<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site gestion de stage</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/tableau.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bouton.css') }}">
    <link rel="stylesheet" href="{{ asset('css/general.css') }}">
    <link rel="stylesheet" href="{{ asset('css/formulaire.css') }}">

</head>
<body>
    <!-- Barre de navigation -->
    <nav>
        <a id="onglet_accueil" class="actif" href="{{ session('user_type') === 'professeur' ? route('professeur.accueil') : (session('user_type') === 'entreprise' ? route('entreprise.accueil') : (session('user_type') === 'etudiant' ? route('etudiant.accueil') : route('accueil'))) }}"><span>Accueil</span></a>
        <a id="onglet_entreprise" href="{{ route('entreprise') }}"><span>Entreprise</span></a>
        <a id="onglet_stagiaire" href=""><span>Stagiaires</span></a>
        <a id="onglet_inscrire" href=""><span>Inscrire</span></a>
        <a id="onglet_aide" href=""><span>Aide</span></a>
        <a id="onglet_deconnexion" href="{{ route('logout') }}"><span>Déconnexion</span></a>
        <div class="bottom">
            <a id="onglet_developper" href=""><span>Developper</span></a>
            <a id="onglet_reduire" href=""><span>Réduire</span></a>
        </div>
    </nav>

    <div id="corps">
        <header>
            <h1>Bienvenue sur le site</h1>
            <hr>
        </header>
        @yield('content')
    </div>

</body>
</html>
