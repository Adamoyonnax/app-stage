@extends('layouts.main')

@section('content')
<article id="entreprise">
    <h1>Bienvenue sur le site</h1>
    <h2>Liste des entreprises</h2> <a href= "{{ route('entreprise.create') }}"><img src='{{asset('icons/ajouter.png')}}' style="height: 20px; width : 20px"> Ajouter une entreprise</a>

    @if($entreprises->isEmpty())
        <p>Aucune entreprise trouvée.</p>
    @else
        <div class='list'>
            <table border="1">
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
                    @foreach($entreprises as $entreprise)
                        <tr>
                            <td>
                                <a href= "{{ route('entreprise.show', ['id' => $entreprise->num_entreprise]) }}"><img src='{{asset('icons/voir.png')}}' style="height: 20px; width : 20px"'></a>
                            </td>

                            <td>{{ $entreprise->raison_sociale }}</td>

                            <td>{{ $entreprise->nom_contact }}</td>

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
@endsection
