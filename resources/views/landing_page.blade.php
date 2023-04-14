<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Yevents</title>
    <link rel="stylesheet" href="{{ asset('home.css') }}">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    @include('navbar')

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
