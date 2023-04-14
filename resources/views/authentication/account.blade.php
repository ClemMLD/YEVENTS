<!DOCTYPE html>

<head>
    <title>Compte</title>
    @include('components/header')
</head>

<body>
    @include('components/navbar')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Compte de {{ $user->firstname }} {{ $user->lastname }}</h3>
                    </div>
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            @if (isset($error))
                                <div class="alert alert-danger" role="alert">
                                    {{ $error }}
                                </div>
                            @endif
                            <div class="form-group row">
                                <label for="nickname" class="col-md-4 col-form-label text-md-right">Pseudo</label>
                                <div class="col-md-6">
                                    <input id="nickname" type="text" class="form-control" name="nickname"
                                        value="{{ $user->nickname }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email"
                                        value="{{ $user->email }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Nouveau mot de
                                    passe</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password_confirmation"
                                    class="col-md-4 col-form-label text-md-right">Confirmation</label>
                                <div class="col-md-6">
                                    <input id="password_confirmation" type="password" class="form-control"
                                        name="password_confirmation">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="created_at" class="col-md-4 col-form-label text-md-right">Date de
                                    d'inscription</label>
                                <div class="col-md-6">
                                    <input id="created_at" type="text" class="form-control" name="created_at"
                                        value="{{ $user->created_at->format('M d, Y') }}" readonly>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                    <button type="button" class="btn btn-secondary"
                                        onclick="window.location.reload()">Annuler</button>
                                    <a href="{{ route('logout') }}" class="btn btn-danger">Se déconnecter</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
