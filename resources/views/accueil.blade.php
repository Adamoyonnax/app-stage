<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon site stylisé</title>
    <link rel="stylesheet" href="css/tableau.css">
    <link rel="stylesheet" href="css/bouton.css">
    <link rel="stylesheet" href="css/formulaire.css">
    <link rel="stylesheet" href="css/general.css">

</head>
<body>
    <!-- Barre de navigation -->
    <nav>
        <a id="onglet_accueil" class="actif" href="#accueil"><span>Accueil</span></a>
        <a id="onglet_entreprise" href="#entreprise"><span>Entreprise</span></a>
        <a id="onglet_stagiaire" href="#stagiaire"><span>Stagiaires</span></a>
        <a id="onglet_inscrire" href="#inscrire"><span>Inscrire</span></a>
        <a id="onglet_aide" href="#aide"><span>Aide</span></a>
        <div class="bottom">
            <a id="onglet_deconnection" href="#deconnection"><span>Déconnexion</span></a>
        </div>
    </nav>

    <!-- Contenu principal -->
    <div id="corps">
        <header>
            <h1>Bienvenue sur le site</h1>
            <hr>
        </header>

        <div id="contenu">
            <!-- Section Accueil -->
            <article id="accueil">
                <h2>Accueil</h2>
                <p>Bienvenue sur notre site web. Utilisez le menu pour naviguer.</p>
            </article>

            <!-- Section Entreprise -->
            <article id="entreprise">
                <h1>Bienvenue sur le site</h1>
                <h2>Liste des entreprises</h2>

                @if($entreprises->isEmpty())
                    <p>Aucune entreprise trouvée.</p>
                @else
                    <div class='list'>
                        <table border="1">
                            <thead>
                                <tr>
                                    <th>Opération</th>
                                    <th>Entreprise</th>
                                    <th>Responsable</th>
                                    <th>Adresse</th>
                                    <th>Site</th>
                                    <th>Spécialité</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($entreprises as $entreprise)
                                    <tr>
                                        <td>Rien pour le moment</td>

                                        <td>{{ $entreprise->raison_sociale }}</td>

                                        <td>{{ $entreprise->nom_resp }}</td>

                                        <td>
                                            @if ($entreprise->rue_entreprise || $entreprise->cp_entreprise)
                                                {{ $entreprise->rue_entreprise }}
                                                @if ($entreprise->rue_entreprise && $entreprise->cp_entreprise)
                                                    <br>
                                                @endif
                                                {{ $entreprise->cp_entreprise }}
                                            @endif
                                            {{ $entreprise->ville_entreprise }}
                                        </td>

                                        <td><a href="{{ $entreprise->site_entreprise }}" target="_blank" rel="noopener noreferrer">{{ $entreprise->site_entreprise }}</a></td>

                                        <td>
                                            @if ($entreprise->specialites->isEmpty())
                                                Aucune spécialité
                                            @else
                                                @foreach ($entreprise->specialites as $specialite)
                                                    {{ $specialite->libelle }}@if (!$loop->last), @endif
                                                @endforeach
                                            @endif
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </article>
        </div>
    </div>
</body>
</html>
