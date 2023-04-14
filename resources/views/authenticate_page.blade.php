<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('navbar.css') }}">

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

                <p class="text-center text-muted mt-5 mb-0">Pas de compte ?<a href="{{ route('register_page') }}"
                    class="fw-bold text-body"><u>Se connecter</u></a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
