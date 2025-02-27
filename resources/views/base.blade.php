<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <title>@yield('title') | Cours </title>
</head>

<body>
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
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link fs-5 fw-bold active" aria-current="page" href="/">Acceuil</a>
            </li>
          </ul>
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link fs-5 fw-bold active" aria-current="page" href="/">Acceuil</a>
            </li>
            <li class="nav-item">
              <a href="{{ route('cour.index') }}" @class(["nav-link fs-5 fw-bold", "text-grey" => str_contains($route, 'cours.')]) aria-current="page">Cours</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fs-5 fw-bold " href="#">Nos Services</a>
            </li>
            @auth
            <li class="nav-item ">
              <a href="{{ route('cart.index') }}" @class(["nav-link", "fw-bold", "fs-5"]) aria-current="page">Panier</a>
            </li>
              <li class="nav-item ">
                <a href="{{ route('dashboard.index') }}" @class(["nav-link", "fw-bold", "fs-5"]) aria-current="page">Dashboard</a>
              </li>
              @elseguest
                <li class="nav-item ">
                  <a href="{{ route('login') }}" @class(["nav-link", "fw-bold", "fs-5 btn btn-primary text-white"]) aria-current="page">Se connecter</a>
                </li>
                <li class="nav-item ">
                  <a href="{{ route('register') }}" @class(["nav-link", "fw-bold", "fs-5"]) aria-current="page">S'inscrire</a>
                </li>
              @endauth 
          </ul>
          
        </div>
      </div>
    </nav>
  </header>

 @yield('content')

 @include('layouts.footer');
</body>
</html>