<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('navbar.css') }}">
<link rel="stylesheet" href="{{ asset('authenticate.css') }}">
<nav class="navbar navbar-expand-lg navbar-light">
          <a class="navbar-brand" href="#">Yevents</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="#">Acceuil<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Campus
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Aix en provence</a>
            <a class="dropdown-item" href="#">Bordeaux</a>
            <a class="dropdown-item" href="#">Lille</a>
            <a class="dropdown-item" href="#">Lyon</a>
            <a class="dropdown-item" href="#">Montpellier</a>
            <a class="dropdown-item" href="#">Nantes</a>
            <a class="dropdown-item" href="#">Paris</a>
            <a class="dropdown-item" href="#">Rennes</a>
            <a class="dropdown-item" href="#">Sophia</a>
            <a class="dropdown-item" href="#">Toulouse</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Tous les campus</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Types d'évenements
        </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Cinema</a>
                <a class="dropdown-item" href="#">Restaurant</a>
                <a class="dropdown-item" href="#">Sport</a>
                <a class="dropdown-item" href="#">Soiree</a>
                <a class="dropdown-item" href="#">Concert</a>
                <a class="dropdown-item" href="#">Culture</a>
                <a class="dropdown-item" href="#">Jeux vidéo</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Autre</a>
            </div>
    </li>
    <li class="nav-item active">
            <a class="nav-link" href="#">Authentification<span class="sr-only">(current)</span></a>
        </li>
</ul>
<img src="{{ asset('images/logo.svg') }}" alt="logo" class="logo">
</div>
</nav>


<section class="vh-100 bg-image"
  style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Inscription</h2>
              <form>

                <div class="form-outline mb-4">
                  <input type="text" id="form3Example1cg" class="form-control form-control-lg" />
                  <label class="form-label" for="name">Nom</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="email" name="email" class="form-control form-control-lg" />
                  <label class="form-label" for="email"> Email</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" name="password" class="form-control form-control-lg" />
                  <label class="form-label" for="password">Mot de passe</label>
                </div>

                <div class="d-flex justify-content-center">
                  <button type="button"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">S'inscrire</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Déjà un compte ?<a href="{{ route('authenticate_page') }}"
                    class="fw-bold text-body"><u>S'inscrire</u></a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
