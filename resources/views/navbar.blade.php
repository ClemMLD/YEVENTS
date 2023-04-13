<link rel="stylesheet" href="{{ asset('navbar.css') }}">
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
                    <a class="dropdown-item" href="{{ route('events', ['campus' => 'aix-en-provence']) }}">Aix en provence</a>
                    <a class="dropdown-item" href="{{ route('events', ['campus' => 'bordeaux']) }}">Bordeaux</a>
                    <a class="dropdown-item" href="{{ route('events', ['campus' => 'lille']) }}">Lille</a>
                    <a class="dropdown-item" href="{{ route('events', ['campus' => 'lyon']) }}">Lyon</a>
                    <a class="dropdown-item" href="{{ route('events', ['campus' => 'montpellier']) }}">Montpellier</a>
                    <a class="dropdown-item" href="{{ route('events', ['campus' => 'nantes']) }}">Nantes</a>
                    <a class="dropdown-item" href="{{ route('events', ['campus' => 'paris']) }}">Paris</a>
                    <a class="dropdown-item" href="{{ route('events', ['campus' => 'rennes']) }}">Rennes</a>
                    <a class="dropdown-item" href="{{ route('events', ['campus' => 'sophia']) }}">Sophia</a>
                    <a class="dropdown-item" href="{{ route('events', ['campus' => 'toulouse']) }}">Toulouse</a>
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
                    <a class="dropdown-item" href="{{ route('events', ['type' => 'restaurant']) }}">Restaurant</a>
                    <a class="dropdown-item" href="{{ route('events', ['type' => 'sport']) }}">Sport</a>
                    <a class="dropdown-item" href="{{ route('events', ['type' => 'soiree']) }}">Soirée</a>
                    <a class="dropdown-item" href="{{ route('events', ['type' => 'concert']) }}">Concert</a>
                    <a class="dropdown-item" href="{{ route('events', ['type' => 'culture']) }}">Culture</a>
                    <a class="dropdown-item" href="{{ route('events', ['type' => 'jeux-videos']) }}">Jeux vidéos</a>
                    <a class="dropdown-item" href="{{ route('events', ['type' => 'autre']) }}">Autre</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('events') }}">Tous les types</a>
                </div>
            </li>

        </ul>
        <img src="{{ asset('images/logo.svg') }}" alt="logo" class="logo">
    </div>
</nav>
