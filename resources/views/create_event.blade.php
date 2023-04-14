@include('header')
@include('navbar')

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
            <input type="text" class="form-control" id="name" name="name" placeholder="Nom de l'événement">
        </div>
        <div class="form-group">
            <label for="type">Type de l'événement</label>
            <select class="form-control" id="type" name="type">
                <option value="restaurant">Restaurant</option>
                <option value="sport">Sport</option>
                <option value="soirée">Soirée</option>
                <option value="concert">Concert</option>
                <option value="culture">Culture</option>
                <option value="jeux vidéos">Jeux vidéos</option>
                <option value="autre">Autre</option>
            </select>
        </div>
        <div class="form-group">
            <label for="description">Description de l'événement</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="campus">Campus</label>
            <select class="form-control" id="campus" name="campus">
                <option value="aix-en-provence">Aix en provence</option>
                <option value="bordeaux">Bordeaux</option>
                <option value="lille">Lille</option>
                <option value="lyon">Lyon</option>
                <option value="montpellier">Montpellier</option>
                <option value="nantes">Nantes</option>
                <option value="paris">Paris</option>
                <option value="rennes">Rennes</option>
                <option value="sophia">Sophia</option>
                <option value="toulouse">Toulouse</option>
            </select>
        </div>
        <div class="form-group">
            <label for="location">Lieu de l'événement</label>
            <input type="text" class="form-control" id="location" name="location" placeholder="Lieu de l'événement">
        </div>
        <div class="form-group">
            <label for="date">Date de l'événement</label>
            <input type="date" class="form-control" id="date" name="date">
        </div>
        <div class="form-group">
            <label for="image">Image de l'événement</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Créer l'événement</button>
        <a href="{{ route('events.store') }}" class="btn btn-primary">Retour</a>
    </div>
