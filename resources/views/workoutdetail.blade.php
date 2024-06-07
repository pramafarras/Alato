@extends('layouts.main')

@section('content')

{{-- modal rate --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content bg-theme3">
        <form action="{{ route('workout.rate', $workouts) }}" method="POST">
            @csrf
            <input type="hidden" name="workout_id" value="{{ $workouts->id }}">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Rate {{ $workouts->title }}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="rating-css">
                <div class="star-icon">
                    @if ($userRated)
                        @for ($i = 1; $i <= $userRated->rating; $i++)
                            <input type="radio" value="{{ $i }}" name="workout_rating" checked id="rating{{ $i }}">
                            <label for="rating{{ $i }}" class="bi bi-star-fill"></label>
                        @endfor
                        @for ($j = $userRated->rating+1; $j <= 5; $j++)
                            <input type="radio" value="{{ $j }}" name="workout_rating" id="rating{{ $j }}">
                            <label for="rating{{ $j }}" class="bi bi-star-fill"></label>
                        @endfor
                    @else
                        <input type="radio" value="1" name="workout_rating" checked id="rating1">
                        <label for="rating1" class="bi bi-star-fill"></label>
                        <input type="radio" value="2" name="workout_rating" id="rating2">
                        <label for="rating2" class="bi bi-star-fill"></label>
                        <input type="radio" value="3" name="workout_rating"  id="rating3">
                        <label for="rating3" class="bi bi-star-fill"></label>
                        <input type="radio" value="4" name="workout_rating" id="rating4">
                        <label for="rating4" class="bi bi-star-fill"></label>
                        <input type="radio" value="5" name="workout_rating" id="rating5">
                        <label for="rating5" class="bi bi-star-fill"></label>
                    @endif

                    </div>
                </div>
            </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </form>
      </div>
    </div>
  </div>
{{-- end modal rate --}}

{{-- modal delete rate --}}
<div class="modal fade text-black" id="removeRatedModal" tabindex="-1" aria-labelledby="removeRatedModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
@isset($userRated)


            <form action="{{ route('rating.remove', $userRated->id) }}" method="POST">
                @csrf
                @method('DELETE')
                    <div class="modal-header">
                        <h5 class="modal-title" id="removeRatedModalLabel">Delete <i>{{ $workouts->title }}</i></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-start">
                        Are you sure you want to delete your rate for this workout?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
                @endisset
        </div>
    </div>
</div>
{{-- end modal delete rate --}}

<div class="container-fluid">
<div class="row">
    <div class="col-xl-6 d-flex align-items-center justify-content-center p-0 border-end border-end-lg">
        <div class="ratio ratio-16x9 w-100">

                        <iframe src="{{ $workouts->video }}" allowfullscreen></iframe>

        </div>
    </div>
    <div class="col-xl-6 d-flex align-items-start flex-column text-light py-5 py-5 justify-content-center">
        <div class="container w-100">
        <h1 class="display-6 fw-bold">{{ $workouts->title }}</h1>
            <div class="row w-50 d-flex align-content-center align-items-center justify-content-start mb-2 w-100">
            <div class="col-auto ">
            <h5 class="text-center display-1 fw-bold">{{ number_format($averageRating, 1) }}</h5>
            </div>
            <div class="col-auto d-flex flex-column align-items-start justify-content-center ">
                <div class="rating">
                    @for($i = 1; $i <= number_format($averageRating); $i++)
                    <i class="bi bi-star-fill checked"></i>
                    @endfor
                    @for ($j = number_format($averageRating)+1; $j <= 5; $j++)
                        <i class="bi bi-star-fill"></i>
                    @endfor
                </div>
                <span>
                    @if($ratingsCount > 0)
                        @if($ratingsCount == 1)
                            {{ $ratingsCount }} Rating
                        @else
                            {{ $ratingsCount }} Ratings
                        @endif
                    @else
                        No Rating
                    @endif
                </span>

            </div>
            </div>
        <div class="d-flex align-items-center justify-content-start align-content-center p-0 mb-2">
            @if ($userRated)
            <button type="button" class="btn btn-warning me-2 btn-hover" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Edit My Rate
            </button>
                <button class="btn btn-link p-0 me-2" style="color: rgb(153, 33, 33)" type="submit" data-bs-toggle="modal" data-bs-target="#removeRatedModal"><i class="bi bi-trash3-fill" style="font-size: 1em;" ></i></button>
            <i><small style="font-size: 14px;">You Already Rated</small></i>
            @else
            <button type="button" class="btn btn-warning btn-hover" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Rate This Workout
            </button>
            @endif
        </div>



        <div class="d-flex flex-column">
            <h2>Equipment</h2>
            <ul style="font-size: 21px">

                        <li><i>{{ $workouts->equipments->name }}</i> </li>


            </ul>
            <h2>Bodypart</h2>
                <ul style="font-size: 21px">
                    @forelse($workouts->bodyparts as $bodypart)
                        <li><i>{{ $bodypart->name }}</i> </li>
                        @empty
                        <li><i>no bodypart</i> </li>
                    @endforelse
                </ul>

            <hr class="w-100 mx-0 border-3 ">

            <div class="w-75">
                <h2 class="mt-2">Execution</h2>
                <pre class="wrap-text fs-6 fs-lg-4">{{ $workouts->execution }}</pre>
                <h2>Tips</h2>
                <pre class="wrap-text fs-6 fs-lg-4">{{ $workouts->tips }}</pre>
            </div>
        </div>
        </div>
      </div>
    </div>
  </div>


@endsection
