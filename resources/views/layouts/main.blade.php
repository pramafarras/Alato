<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alato | {{ $title }}</title>
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


</head>
<body class="bg-thememain min-vh-100">

<!-- NAVIGATION BAR -->
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark text-light">
    <div class="container-fluid px-4">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{($title === "Home") ? 'active' : ''}}"  aria-current="page" href="/">HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about">ABOUT</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#programs">PROGRAMS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#faq">FAQ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contact">CONTACT</a>
          </li>
        </ul>

        <div class="d-flex align-items-center bottom-0 end-0 profile-icon">
            <div class="position-relative">


        @auth

            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ auth()->user()->username }}
              <!-- PROFILE -->
            </a>
            <ul class="dropdown-menu dropdown-menu-black dropdown-menu-start dropdown-menu-lg-end">
                <li><a class="dropdown-item" href="/ratedlist">Rated List</a></li>
                <li><a class="dropdown-item" href="/myplaylist">MyPlaylist</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                  <form action="/logout" method="post">
                    @csrf
                      <button type="submit" class="dropdown-item">
                            LOGOUT <i class="bi bi-box-arrow-right"></i>
                      </button>
                  </form>
                </li>
                </ul>

        @else
        <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a href="/login" class="nav-link">LOGIN</a>
              </li>
        </ul>
        @endauth

          </div>
      </div>
      </div>
    </div>
  </nav>
  <!-- NAVIGATION BAR SELESAI -->

<div class="flex-grow-1">
    @yield('content')
</div>

<footer class="container-fluid bg-dark text-center d-flex justify-content-center align-items-center m-0 mt-auto text-color" id="contact">

    <div class="container px-5 py-3 px-lg-3">
      <h1 class="display-5 fw-bold mb-3">GET IN TOUCH</h1>
      <h3>CONTACT US</h3>
      <p class="fs-7 mb-0">Have a question? Contact us</p>
          <p class="fs-7 mb-0">Tel: 123-456-7890</p>
          <p class="fs-7 mb-0">Email: alato@gmail.com</p>
        </div>
</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
