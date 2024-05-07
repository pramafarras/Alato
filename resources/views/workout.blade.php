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

    {{-- @if ($workout->count()) --}}

      <div class="container-fluid text-color ">
        <div class="container  d-flex justify-content-center align-items-center flex-column my-2">
        <h1 class="fw-bold display-3">WORKOUT LIST</h1>


            <div class="row container my-2 py-2 ">
    {{-- @foreach ($workout as $eq) --}}


              <div class="col-sm-12 col-md-4 mb-3 image-container">
                <a href="/workoutdetail" class="card text-bg-dark h-100 hover text-decoration-none">
                    <img src="pushup.png" class="img-fluid rounded-start p-3" >

                    <div class="">
                      <h5 class="card-title text-light w-100 py-2 text-center">Lorem, ipsum dolor.</h5>
                    </div>
                </a>
              </div>




    {{-- @endforeach --}}
            </div>
    </div>
    </div>
    {{-- @else
        <h1 class="display-3 text-light text-center mb-3">No Workout Found</h1>
    @endif --}}

@endsection
