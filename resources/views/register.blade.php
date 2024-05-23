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
              <h1 class="display-1 fw-bold mb-5">SIGN UP</h1>
              <form action="/register" method="post" class="container">
                @csrf
                <div class="mb-0">
                    <label for="Username" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="username" required value="{{ old('username') }}">

                  @error('username')
                  <div class="invalid-feedback text-danger">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="mt-2">
                  <label for="email" class="form-label">Email address</label>
                  <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required>


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

                <button type="submit" class="btn btn-success mt-3 container">Sign Up</button>
            </form>
                <div class="d-block text-center mt-2 text-light container">
                    Already Registered?
                    <a href="/login" class="px-2">Login</a>
                </div>

            </div>
          </div>
        </div>
      </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
