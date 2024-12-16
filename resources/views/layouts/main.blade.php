<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Site gestion de stage</title>

    <!-- Intégration de la feuille de style CSS générée par Vite (outil de développement moderne utilisé dans Laravel) -->
    @vite('resources/css/app.css')

    <!-- Liens vers des fichiers CSS externes -->
    <!-- Les fichiers CSS sont chargés pour styliser différents aspects de l'application -->
    <link rel="stylesheet" href="{{ asset('css/tableau.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bouton.css') }}">
    <link rel="stylesheet" href="{{ asset('css/general.css') }}">
    <link rel="stylesheet" href="{{ asset('css/formulaire.css') }}">
</head>
<body>
    <!-- Barre de navigation (menu principal du site) -->
    <nav>
        <!-- Lien vers l'accueil. Il change en fonction du type d'utilisateur (professeur, entreprise, étudiant) grâce à la session -->
        <a id="onglet_accueil" class="actif" href="{{ session('user_type') === 'professeur' ? route('professeur.accueil') : (session('user_type') === 'entreprise' ? route('entreprise.accueil') : (session('user_type') === 'etudiant' ? route('etudiant.accueil') : route('accueil'))) }}"><span>Accueil</span></a>
        <!-- Lien vers la section entreprise. Le lien change également en fonction du type d'utilisateur -->
        <a id="onglet_entreprise" href="{{ session('user_type') === 'professeur' ? route('professeur.entreprise') : (session('user_type') === 'entreprise' ? route('entreprise.entreprise') : (session('user_type') === 'etudiant' ? route('etudiant.entreprise') : route('accueil'))) }}""><span>Entreprise</span></a>

        <!-- Lien vers la section stagiaires, qui est actuellement vide (pas d'URL définie) -->
        <a id="onglet_stagiaire" href=""><span>Stagiaires</span></a>
        <!-- Lien vers la section Inscrire, également sans URL pour l'instant -->
        <a id="onglet_inscrire" href=""><span>Inscrire</span></a>
        <!-- Lien vers la page d'Aide, encore une fois sans URL définie -->
        <a id="onglet_aide" href=""><span>Aide</span></a>
        <!-- Lien de déconnexion, qui redirige l'utilisateur vers la route de déconnexion Laravel -->
        <a id="onglet_deconnexion" href="{{ route('logout') }}"><span>Déconnexion</span></a>

        <!-- Section inférieure du menu de navigation (pour ajouter des liens supplémentaires) -->
        <div class="bottom">
            <!-- Lien vers un possible afficher les onglets -->
            <a id="onglet_developper" href=""><span>Developper</span></a>

            <!-- Lien vers une fonction pour réduire ou minimiser l'onglet -->
            <a id="onglet_reduire" href=""><span>Réduire</span></a>
        </div>
    </nav>

    <!-- Corps principal de la page -->
    <div id="corps">
        <header>
            <h1>Bienvenue sur le site</h1>
            <hr>
        </header>

        <!-- Zone où le contenu spécifique de chaque page sera inséré -->
        @yield('content')
    </div>
</body>
</html>

