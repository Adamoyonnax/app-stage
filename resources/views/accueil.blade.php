<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Liste des Étudiants</title>
    <link rel="stylesheet" href="{{ asset('css/tableau.css') }}">

</head>
<body>
    <h1>Bienvenue sur le site</h1>
    <h2>Liste des étudiants</h2>

    @if($etudiants->isEmpty())
        <p>Aucun étudiant trouvé.</p>
    @else
        <div class='list'>
            <table border="1">
                <thead>
                    <tr>
                        <th>Numéro</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Année d'obtention</th>
                        <th>Classe</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($etudiants as $etudiant)
                        <tr>
                            <td>{{ $etudiant->num_etudiant }}</td>
                            <td>{{ $etudiant->nom_etudiant }}</td>
                            <td>{{ $etudiant->prenom_etudiant }}</td>
                            <td>{{ $etudiant->annee_obtention }}</td>
                            <td>{{ $etudiant->num_classe }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</body>
</html>
