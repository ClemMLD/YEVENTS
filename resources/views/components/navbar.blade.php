<link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
<nav class="navbar navbar-expand-lg navbar-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <a class="navbar-brand" href="{{ route('home') }}">Yevents</a>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('home') }}">Acceuil<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Campus
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('events', ['campus' => 'Aix en provence']) }}">Aix en provence</a>
                    <a class="dropdown-item" href="{{ route('events', ['campus' => 'Bordeaux']) }}">Bordeaux</a>
                    <a class="dropdown-item" href="{{ route('events', ['campus' => 'Lille']) }}">Lille</a>
                    <a class="dropdown-item" href="{{ route('events', ['campus' => 'Lyon']) }}">Lyon</a>
                    <a class="dropdown-item" href="{{ route('events', ['campus' => 'Montpellier']) }}">Montpellier</a>
                    <a class="dropdown-item" href="{{ route('events', ['campus' => 'Nantes']) }}">Nantes</a>
                    <a class="dropdown-item" href="{{ route('events', ['campus' => 'Paris']) }}">Paris</a>
                    <a class="dropdown-item" href="{{ route('events', ['campus' => 'Rennes']) }}">Rennes</a>
                    <a class="dropdown-item" href="{{ route('events', ['campus' => 'Sophia']) }}">Sophia</a>
                    <a class="dropdown-item" href="{{ route('events', ['campus' => 'Toulouse']) }}">Toulouse</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('events') }}">Tous les campus</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Types d'évenements
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('events', ['type' => 'Restaurant']) }}">Restaurant</a>
                    <a class="dropdown-item" href="{{ route('events', ['type' => 'Sport']) }}">Sport</a>
                    <a class="dropdown-item" href="{{ route('events', ['type' => 'Soirée']) }}">Soirée</a>
                    <a class="dropdown-item" href="{{ route('events', ['type' => 'Concert']) }}">Concert</a>
                    <a class="dropdown-item" href="{{ route('events', ['type' => 'Culture']) }}">Culture</a>
                    <a class="dropdown-item" href="{{ route('events', ['type' => 'Jeux vidéos']) }}">Jeux vidéos</a>
                    <a class="dropdown-item" href="{{ route('events', ['type' => 'Autre']) }}">Autre</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('events') }}">Tous les types</a>
                </div>
            </li>
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login-page') }}">Login/register</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile') }}">Mon profil</a>
                </li>
            @endguest
        </ul>
        <img src="{{ asset('images/logo.svg') }}" alt="logo" class="logo">
    </div>
</nav>
