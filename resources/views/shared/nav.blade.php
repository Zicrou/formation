<style>
    .navbar .nav-link.nav-active {
    color: var(--bs-warning) !important;
    font-weight: 700;
    border-bottom: 2px solid var(--bs-warning);
}
</style>
@php
    $route = request()->route()->getName();
  @endphp
<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary border">
      <div class="container">
        <a class="navbar-brand fs-5" href="/">Formation</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a @class([
                'nav-link fs-5 fw-bold',
                "text-waring" => request()->routeIs('home'),
                "text-black",
            ])  aria-current="page" href="/">Acceuil</a>
            </li>
            <li class="nav-item">
              <a href="{{ route('cour.index') }}" @class(["nav-link fs-5 fw-bold", "text-warning" => request()->routeIs('cour.*'),"text-black" => !request()->routeIs('cour.*')]) aria-current="page">Cours</a>
            </li>
            <li class="nav-item">
              <a  @class(["nav-link", "fw-bold", "fs-5", "text-warning" => request()->routeIs('services'), "text-black"]) href="#">Nos Services</a>
            </li>
            @auth
            <li class="nav-item ">
              <a href="{{ route('cart.index') }}" @class(["nav-link", "fw-bold", "fs-5","text-black" => !request()->routeIs('cart.*'), "text-warning" => request()->routeIs('cart.*')]) aria-current="page">Panier</a>
            </li>
              <li class="nav-item ">
                <a href="{{ route('dashboard.index') }}" @class(["nav-link", "fw-bold", "fs-5","text-warning" => request()->routeIs('dashboard.*'), "text-black"]) aria-current="page">Dashboard</a>
              </li>
              @elseguest
                <li class="nav-item">
                  <a href="{{ route('login') }}" class="nav-link fw-bold fs-5 btn btn-warning text-black" aria-current="page">Se connecter</a>
                </li>
                <li class="nav-item ">
                  <a href="{{ route('register') }}" @class(["nav-link", "fw-bold","mx-3", "fs-5", "btn btn-dark", "text-white"]) aria-current="page">S'inscrire</a>
                </li>
              @endauth 
          </ul>
          
        </div>
      </div>
    </nav>
  </header>
