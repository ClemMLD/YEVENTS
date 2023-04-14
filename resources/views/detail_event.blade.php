<!DOCTYPE html>
<html>

<head>
    <title>Détails de l'événement</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
@include('header')
@include('navbar')

<body>
    <div class="container text-center mt-5">
        <h1>{{ $event->name }}</h1>
        <div>
            <h2>{{ $event->date }}<h2>
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
            <span id="likes-count">{{ $event->likes }}</span>
            <button class="btn btn-primary" onclick="subscribe()">S'abonner</button>
            <div id="subscribers">
                @foreach ($attendees as $attendee)
                    <p>{{ $attendee->nickname }}</p>
                @endforeach
            </div>
            <br><br>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="card">
                            <div class="card-header">
                                Chat Window
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
                    var subscribersCount = document.getElementById("subscribers");
                    subscribersCount.innerHTML = this.responseText;
                }
            };
            xhttp.open("POST", "/events/{{ $event->id }}/subscribe", true);
            xhttp.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
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
                    likesCount.innerHTML = this.responseText;
                    setTimeout(function() {
                        getLikesCount(function(responseText) {
                            likesCount.innerHTML = responseText;
                        });
                    }, 3000);
                }
            };
            xhttp.open("POST", "/api/events/like", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("event_id={{ $event->id }}");
        @endif
    }
</script>


</html>
