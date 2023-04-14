<!DOCTYPE html>
<html>

<head>
    <title>Détails de l'événement</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/event_details.css') }}">
    @include('components/header')
</head>

<body>
    @include('components/navbar')
    <div class="container text-center mt-5">
        <h1>{{ $event->name }}</h1>
        <div>
            <h2>{{ $event->date }}
                <h2>
        </div>
        <img src="{{ asset('images/events/' . $event->id . '.jpg') }}" class="img-fluid mt-4 event-image"
            alt="Image de l'événement">
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2>Type d'événement</h2>
                        <p>{{ $event->type }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2>Description</h2>
                        <p>{{ $event->description }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2>Localisation</h2>
                        <p>{{ $event->location }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2>Nom du campus</h2>
                        <p>{{ $event->campus }}</p>
                    </div>
                </div>
            </div>
        </div>
        <br>
        @if (Auth::check())
            <button class="btn btn-primary" onclick="like()">Like</button>
            <button class="btn btn-primary" onclick="subscribe()">Participer</button>
            <button class="btn btn-primary" onclick="unsubscribe()">Ne plus participer</button>
            <div id="subscribers">
                <br>
                @if ($attendees->isNotEmpty())
                    <p>Participants :</p>
                @endif
                <ul id="list-subscribers" class="list-group">
                    @foreach ($attendees as $attendee)
                        <li class="list-group-item">{{ $attendee->firstname }} {{ $attendee->lastname }}</li>
                        <br>
                    @endforeach
                </ul>
                <p>Nombre de likes : <span id="likes-count">{{ $event->likes }}</span></p>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="card">
                            <div class="card-header">
                                Discussion - {{ $event->name }}
                            </div>
                            <div id="card-body">
                            </div>
                            <div class="card-footer">
                                <textarea class="form-control" rows="3"></textarea>
                                <br>
                                <button class="btn btn-primary" onclick="sendMessage()">Send</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        @else
            <div class="alert alert-warning">
                Vous devez être connecté pour accéder à la conversation.
            </div>
        @endif
    </div>
</body>

<script>
    window.onload = function() {
        getMessage();
    }
</script>

<script>
    function sendMessage() {
        var message = document.querySelector('textarea').value;
        document.querySelector('textarea').value = '';

        // Check if the user is logged in
        @if (Auth::check())
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                }
            };
            xhttp.open("POST", "/api/messages", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("event_id={{ $event->id }}&user_id={{ Auth::user()->id }}&message=" + message);
        @endif
    }

    function getMessage() {
        setInterval(function() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var messagesDiv = document.getElementById("card-body");
                    messagesDiv.innerHTML = ''; // Clear the messages div
                    var messages = JSON.parse(this.responseText);
                    messages.forEach(function(message) {
                        var messageDiv =
                            '<div class="message"><div class="sender"><span class="badge badge-primary">' +
                            message.nickname + '</span></div><div class="content">' + message
                            .message + '</div></div>';
                        messagesDiv.insertAdjacentHTML('beforeend',
                            messageDiv);
                    });
                }
            };
            xhttp.open("GET", "/api/messages/event/{{ $event->id }}", true);
            xhttp.send();
        }, 1000);
    }

    function subscribe() {
        @if (Auth::check())
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var subscribersCount = document.getElementById("list-subscribers");
                    // add the user to the list of subscribers
                    subscribersCount.insertAdjacentHTML('beforeend',
                        '<li id="list-subscribers" class="list-group-item">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</li>'
                        );
                }
                if (this.readyState == 4 && this.status == 400) {
                    alert("Vous êtes déjà inscrit à cet événement");
                }
            };
            xhttp.open("POST", "/events/{{ $event->id }}/subscribe", true);
            xhttp.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').getAttribute(
                'content'));
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("event_id={{ $event->id }}&user_id={{ Auth::user()->id }}");
        @endif
    }

    function unsubscribe() {
        @if (Auth::check())
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var subscribersCount = document.getElementById("list-subscribers");
                    // remove the user from the list of subscribers
                    subscribersCount.remove();
                }
                if (this.readyState == 4 && this.status == 400) {
                    alert("Vous n'êtes pas inscrit à cet événement");
                }
            };
            xhttp.open("POST", "/events/{{ $event->id }}/unsubscribe", true);
            xhttp.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').getAttribute(
                'content'));
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("event_id={{ $event->id }}&user_id={{ Auth::user()->id }}");
        @endif
    }

    function getLikesCount(callback) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                callback(this.responseText);
            }
        };
        xhttp.open("GET", "/api/events/likes/{{ $event->id }}", true);
        xhttp.send();
    }

    function like() {
        @if (Auth::check())
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var likesCount = document.getElementById("likes-count");
                    likesCount.innerHTML = parseInt(likesCount.innerHTML) + 1;
                    setTimeout(function() {
                        getLikesCount(function(responseText) {
                            likesCount.innerHTML = responseText;
                        });
                    }, 3000);
                }
                if (this.readyState == 4 && this.status == 403) {
                    alert("Vous avez déjà liké cet événement");
                }
            };
            xhttp.open("POST", "/api/events/like", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("event_id={{ $event->id }}");
        @endif
    }
</script>


</html>
