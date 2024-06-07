

@extends('layouts.main')

@section('content')

<div class="container-fluid text-color">
@if ($workouts->count())

        <div class="d-flex justify-content-center align-items-center flex-column my-3 text-center mx-2 mx-lg-5 px-2 px-lg-3">
        <h1 class="fw-bold pt-3 display-3 mb-5">RATED LIST</h1>

        @foreach ($workouts as $data)
    <div class="mb-3 container border-bottom hoverrated pt-3 rounded-top position-relative w-100 w-lg-50" style="max-height: 300px;">
        <a href="/workout/{{ $data->id }}" class="text-decoration-none" style="color: white;">
            <div class="col-md-3 w-100">
                <h1 class="text-start">{{ $data->title }}</h1>
            </div>
            <div class="col-md-9 mb-2 w-100">
                <div class="d-flex align-items-start align-content-start justify-content-between flex-column mb-3" style="text-align: left;">
                    <h4>Equipment</h4>
                    <ul class="list-inline m-0" style="font-size: 15px">

                            <li class="list-inline-item"><i>{{ $data->equipments->name }}</i></li>

                    </ul>
                    <h4 class="mt-3">Bodyparts</h4>
                    <ul class="list-inline m-0" style="font-size: 15px; display: flex; flex-wrap: wrap;">
                        @forelse($data->bodyparts as $bodypart)
                            <li class="list-inline-item"><i>{{ $bodypart->name }}</i>{{ !$loop->last ? ',' : '' }}</li>
                        @empty
                            <li class="list-inline-item"><i>no bodypart</i></li>
                        @endforelse
                    </ul>
                </div>
                <hr class="w-100 my-2 border-1 ">
                <div class="d-flex align-items-center align-content-center">
                    <span class="d-flex">
                        <i class="text-light me-2">Your Rate : {{ $data->userRated }}</i>
                        <div class="rating">
                            @for($i = 1; $i <= $data->userRated; $i++)
                                <i class="bi bi-star-fill checked"></i>
                            @endfor
                            @for($j = $data->userRated + 1; $j <= 5; $j++)
                                <i class="bi bi-star-fill"></i>
                            @endfor
                        </div>
                    </span>
                </div>
            </div>
        </a>
        <div class="position-absolute bottom-0 end-0 me-2 mb-2">
            <button class="btn btn-link p-0 me-2" style="color: rgb(153, 33, 33)" type="submit" data-bs-toggle="modal" data-bs-target="#removeRatedModal-{{ $data->id }}"><i class="bi bi-trash3-fill" style="font-size: 1em;"></i></button>
        </div>
        <!-- Remove rating modal -->
        <div class="modal fade text-black" id="removeRatedModal-{{ $data->id }}" tabindex="-1" aria-labelledby="removeRatedModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="{{ route('rating.remove', $data->userRating->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <div class="modal-header">
                            <h5 class="modal-title" id="removeRatedModalLabel">Delete <i>{{ $data->title }}</i></h5>
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
                </div>
            </div>
        </div>
    </div>
@endforeach

        </div>
    </div>


    @else
        <h1 class="container-fluid d-flex align-items-center justify-content-center flex-column display-3 text-center text-light" style="min-height: 85vh;">You haven't rated any workout</h1>
    @endif


@endsection
