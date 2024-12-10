@section('content')
    <div class="container">
        <h1>Bienvenue, {{ auth()->user()->login }} !</h1>
        <p>Vous êtes connecté en tant que professeur.</p>

        <!-- Ajoute ici d'autres informations ou sections spécifiques au professeur -->
        <a href="{{ route('logout') }}">Déconnexion</a>
    </div>
@endsection
