<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-landingpage">

    <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 col-xl-5 bg-thememain full-height">
            <div class="text-color p-5 m-5 d-flex flex-column align-items-start">

                @if (session()->has('success'))
                <div class="container alert alert-success alert-dismissible fade show d-flex justify-content-between" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="background: transparent">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif

                @if (session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show container d-flex justify-content-between" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="background: transparent">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif

              <h1 class="display-1 fw-bold mb-4">SIGN IN YOUR ACCOUNT</h1>
              <form class="container" action="/login" method="post" >
                @csrf
                <div class="mt-2">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">


                    @error('email')
                    <div class="invalid-feedback text-danger">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>

                  <div class="mt-2">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" required>

                    @error('password')
                    <div class="invalid-feedback text-danger">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>

                <div class="mt-2 form-check">
                  <input type="checkbox" class="form-check-input" id="rememberMe">
                  <label class="form-check-label" for="rememberMe">Remember me</label>
                </div>
                <button type="submit" class="btn btn-success mt-2 container">Log In</button>
                </form>
            <div class="d-block text-center mt-2 text-light container">
                    Not Registered?
                    <a href="/register" class="container">Register</a>
            </div>

            </div>
          </div>
        </div>
      </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
