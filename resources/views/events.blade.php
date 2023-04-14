<!doctype html>
<html lang="en">

@include('header')
@include('navbar')

<body>
    <div class="container">
        <br>
        <div class="row">
            <div class="col-10">
                <h1>Les événements</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-10">
                <p>Voici la liste des événements</p>
            </div>
        </div>
        <br>
        <div class="container-events">
            <div class="row">
            @foreach ($events as $event)
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('images/events/' . $event->id . '.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->name }}</h5>
                        <p class="card-text">{{ $event->description }}</p>
                        <a href="{{ route('events.show', ['id' => $event->id]) }}" class="btn btn-primary">Voir l'événement</a>
                    </div>
                </div>
        @endforeach
            </div>
    </div>
    <br>
    <div class="row create-event-button">
            <a href="{{ route('events.create') }}" class="btn btn-primary">Créer un événement</a>
    </div>
</body>

</html>
