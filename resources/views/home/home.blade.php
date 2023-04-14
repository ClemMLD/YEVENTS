<!DOCTYPE html>
<html>

<head>
    <title>Bienvenue</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    @include('components/header')
</head>

<body>
    @include('components/navbar')

    <div class="video-header">
        <video autoplay muted loop id="myVideo">
            <source src="{{ asset('video/stock_danse.mp4') }}" type="video/mp4">
        </video>
        <div class="center-title">
            <h1>Yevents</h1>
            <h2>Créez et rejoignez des Evenements. </h2>
        </div>
    </div>
    <br>
    <h1 class="text-center">Les événements du moment</h1>
    <p class="text-center">Quelques événements à ne pas manquer</p>
    <br>
    <div class="container my-5 events">
        <div class="row">
            @foreach ($events as $event)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('images/events/' . $event->id . '.jpg') }}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->title }}
                        <p class="card-text">{{ $event->description }}</p>
                        <a href="{{ route('events.show', ['id' => $event->id]) }}" class="btn btn-primary">Voir
                            l'événement</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</body>
</html>
