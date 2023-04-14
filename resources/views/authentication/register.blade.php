<!DOCTYPE html>
<html>

<head>
    <title>Inscription</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    @include('components/header')
</head>

<body>
    @include('components/navbar')
    <section class="vh-100 bg-image"
        style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Inscription</h2>
                                @if (isset($error))
                                    <div class="alert alert-danger" role="alert">
                                        {{ $error }}
                                    </div>
                                @endif
                                <form action="{{ route('register') }}">

                                    <div class="form-outline mb-4">
                                        <input type="text" name="firstname" class="form-control form-control-lg"
                                            required />
                                        <label class="form-label" for="firstname">Prénom</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="text" name="lastname" class="form-control form-control-lg"
                                            required />
                                        <label class="form-label" for="lastname">Nom de famille</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="text" name="nickname" class="form-control form-control-lg"
                                            required />
                                        <label class="form-label" for="nickname">Pseudo</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="email" name="email" class="form-control form-control-lg"
                                            required />
                                        <label class="form-label" for="email">Email</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" name="password" class="form-control form-control-lg"
                                            required />
                                        <label class="form-label" for="password">Mot de passe</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" name="password_confirmation"
                                            class="form-control form-control-lg" required />
                                        <label class="form-label" for="password_confirmation">Confirmation du mot de
                                            passe</label>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit"
                                            class="btn btn-success btn-block btn-lg gradient-custom-4">Inscription</button>
                                    </div>

                                    <p class="text-center text-muted mt-5 mb-0">Déjà un compte ? <a
                                            href="{{ route('login-page') }}"
                                            class="fw-bold text-body"><u>Connexion</u></a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
