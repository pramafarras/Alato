@extends('layouts.main')

@section('content')

      <div class=" text-center d-flex justify-content-center align-items-center align-content-center py-3" style="background-color: transparent;">
        <div class="fulltext-margin">
            <i class="display-6 text-color shadow">Find Your Favorite Workout</i>
      <div class="form-group my-2 shadow">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search">
          <button type="button" class="btn btn-success">Search</button>
        </div>
      </div>
    </div>
    </div>

      <!-- card 1 -->
      <div class="container-fluid">
        <div class="row m-5">
        <div class="col-lg-3 mb-4 d-flex justify-content-center align-items-center align-content-center">
            <div class="card text-bg-dark shadow border-0" style="width: 25rem;">
                <img src="gambartemplate.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fuga nemo nulla debitis quo magnam sunt qui quisquam repellendus voluptate vel beatae,</p>
                <div class="container-fluid align-items-start">
                    <div class="row text-start d-flex justify-content-start align-items-center align-content-center mb-2">
                      <div class="col-2 ">
                        <button class="border-0 btn btn-outline-warning mb-2" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star " viewBox="0 0 16 16">
                                <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z"/>
                              </svg>
                          </button>
                      </div>
                      <div class="col-9" style="font-size: small;">
                        5.0
                      </div>
                    </div>
                  </div>
                <div class="container-fluid">
                    <div class="row mb-3">
                      <div class="col-6 text-start" style="font-size: small;">
                        Difficulty
                      </div>
                      <div class="col-6 text-end" style="font-size: small;">
                        Medium
                      </div>

                    </div>
                  </div>
                <a href="#" class="btn btn-outline-success  container-fluid">Open</a>
                </div>
            </div>
        </div>


@endsection
