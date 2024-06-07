@extends('layouts.main')

@section('content')

<div class="container-fluid text-color h-100">
@if ($playlist->workouts->count())
        <div class=" d-flex justify-content-center align-items-center flex-column my-3 text-center">
            <h1 class="fw-bold pt-3 display-3 mb-3">{{ $playlist->name }}</h1>
            <div class="row container my-2 py-2">
            @foreach ($playlist->workouts as $workout)
                    <div class="col-12 col-lg-4 my-3">
                    <div class="card text-bg-dark h-100 hoverbg text-light card-container">
                        <a href="/workout/{{ $workout->id }}" class="text-decoration-none h-100" style="color: white;">



                                <div class="ratio ratio-16x9">
                                    <iframe src="{{ $workout->video }}" allowfullscreen></iframe>
                                </div>
                                <div class="card-body">
                                    <a href="/workout/{{ $workout->id }}" class="text-decoration-none" style="color: white;">
                                        <h5 class="card-title">{{ $workout->title }}</h5>
                                    </a>
                                </div>

                        </a>
                    </div>
                    </div>
                @endforeach
            </div>
        </div>

        </div>
@else
    <div class="d-flex justify-content-center align-items-center" style="height: 50vh;">
        <h1 class="display-5 text-light text-center">No Workout Found</h1>
    </div>
@endif
@endsection
