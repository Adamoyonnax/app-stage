@extends('layouts.main')

@section('content')
<article id="entreprise">
    <h1>Bienvenue sur le site</h1>
    <h2>Liste des entreprises</h2>

    <!-- Vérification si la list d'entreprises est vide -->
    @if($entreprises->isEmpty())
        <p>Aucune entreprise trouvée.</p>
    @else
        <div class='list'>
            <table border="1">
                <!-- En-têtes de la table -->
                <thead>
                    <tr>
                        <th>Opération</th>
                        <th>Entreprise</th>
                        <th>Contact</th>
                        <th>Adresse</th>
                        <th>Site</th>
                        <th>Spécialité</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Boucle pour afficher chaque entreprise -->
                    @foreach($entreprises as $entreprise)
                        <tr>
                            <!-- Colonne "Opération" avec un lien pour afficher les détails de l'entreprise -->
                            <!-- D'autres opérations devront être ajouté dans cette partie -->
                            <td>
                                <a href= "{{ route('entreprise.show', ['id' => $entreprise->num_entreprise]) }}">
                                    <img src='{{asset('icons/voir.png')}}' style="height: 20px; width : 20px">
                                </a>
                            </td>

                            <!-- Nom de l'entreprise -->
                            <td>{{ $entreprise->raison_sociale }}</td>

                            <!-- Contact de l'entreprise -->
                            <td>{{ $entreprise->nom_contact }}</td>

                            <!-- Adresse de l'entreprise (avec gestion conditionnelle pour rue et code postal) -->
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

                            <!-- Lien vers le site web de l'entreprise -->
                            <td>
                                <a href="{{ $entreprise->site_entreprise }}" target="_blank" rel="noopener noreferrer">
                                    {{ $entreprise->site_entreprise }}
                                </a>
                            </td>

                            <!-- Spécialités de l'entreprise (si disponibles) -->
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
@endsection
