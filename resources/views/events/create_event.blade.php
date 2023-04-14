<!DOCTYPE html>

<header>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/event_details.css') }}">
    @include('components/header')
</header>

<body>
    @include('components/navbar')
    <br>
    <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-10">
                    <h1>Créer un événement</h1>
                </div>
            </div>
            <div class="form-group">
                <label for="name">Nom de l'événement</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nom de l'événement" required>
            </div>
            <div class="form-group">
                <label for="type">Type de l'événement</label>
                <select class="form-control" id="type" name="type" required>
                    <option value="Restaurant">Restaurant</option>
                    <option value="Sport">Sport</option>
                    <option value="Soirée">Soirée</option>
                    <option value="Concert">Concert</option>
                    <option value="Culture">Culture</option>
                    <option value="Jeux vidéos">Jeux vidéos</option>
                    <option value="Autre">Autre</option>
                </select>
            </div>
            <div class="form-group">
                <label for="description">Description de l'événement</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="campus">Campus</label>
                <select class="form-control" id="campus" name="campus" required>
                    <option value="Aix en provence">Aix en provence</option>
                    <option value="Bordeaux">Bordeaux</option>
                    <option value="Lille">Lille</option>
                    <option value="Lyon">Lyon</option>
                    <option value="Montpellier">Montpellier</option>
                    <option value="Nantes">Nantes</option>
                    <option value="Paris">Paris</option>
                    <option value="Rennes">Rennes</option>
                    <option value="Sophia">Sophia</option>
                    <option value="Toulouse">Toulouse</option>
                </select>
            </div>
            <div class="form-group">
                <label for="location">Lieu de l'événement</label>
                <input type="text" class="form-control" id="location" name="location"
                    placeholder="Lieu de l'événement" required>
            </div>
            <div class="form-group">
                <label for="date">Date de l'événement</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="image">Image de l'événement</label>
                <input type="file" class="form-control-file" id="image" name="image" required>
            </div>
            <button type="submit" class="btn btn-primary">Créer l'événement</button>
            <a href="{{ route('events.store') }}" class="btn btn-primary">Retour</a>
        </div>

    </form>
</body>

</html>
