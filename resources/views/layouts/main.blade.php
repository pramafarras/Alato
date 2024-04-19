<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alato | {{ $title }}</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body class="bg-home">

<!-- NAVIGATION BAR -->
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-black text-light">
    <div class="container-fluid px-4">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{($title === "Home") ? 'active' : ''}}"  aria-current="page" href="/home">HOME</a>
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
              {{-- <img src="profile png.png" alt="Profile Icon" width="32" height="32"> --}}
              {{ auth()->user()->username }}
              <!-- PROFILE -->
            </a>
            <ul class="dropdown-menu dropdown-menu-black dropdown-menu-start dropdown-menu-lg-end">
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="/ratedlist">Rated List</a></li>
                <li><a class="dropdown-item" href="/myplaylist">MyPlaylist</a></li>
                <li>
                  <form action="/logout" method="post">
                    @csrf
                      <button type="submit" class="dropdown-item">
                            Logout
                      </button>
                  </form>
                </li>
                </ul>

        @else
        <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a href="/login" class="nav-link">Login</a>
              </li>
        </ul>
        @endauth

          </div>
      </div>
      </div>
    </div>
  </nav>
  <!-- NAVIGATION BAR SELESAI -->

<div>
    @yield('content')
</div>

<div class="container-fluid bg-theme2 text-center d-flex justify-content-center align-items-center m-0 text-color" id="contact">
    <div class="col-lg-3 p-5 p-lg-4 fulltext-margin">
      <h1 class="display-5 fw-bold mb-5">GET IN TOUCH</h1>
      <h3>CONTACT US</h3>
      <p>Have a question? Want to learn more about our programs? Fill out the contact form and we'll get back to you as soon as possible.
          Tel: 123-456-7890
          Email: alato@gmail.com</p>
        </div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
