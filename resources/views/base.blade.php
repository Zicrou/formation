<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>@yield('title') | Formation </title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid">
          <a class="navbar-brand" href="/">Formation</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          @php
              $route = request()->route()->getName();
          @endphp
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a href="{{ route('cour.index') }}" @class(["nav-link", "active" => str_contains($route, 'cours.')]) aria-current="page">Cours</a>
              </li>
            </ul>
            {{-- <div class="ms-auto">
              @auth
              <ul class="navbar-nav">
                <li class="nav-item">
                  <form action="{{ route('logout') }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="nav-link">Se déconnecter</button>
                  </form>
                </li>
              </ul>
              @endauth
            </div> --}}
          </div>
        </div>
    </nav>
 @yield('content')
</body>
</html>