

@extends('layouts.main')

@section('content')

<div class="container-fluid text-color">
    <div class="container d-flex justify-content-center align-items-center flex-column my-3 text-center">
    <h1 class="fw-bold pt-3 display-3">My Playlist</h1>

{{-- @foreach ($equipments as $eq) --}}
        <div class="row row-cols-1 row-cols-md-2 g-4 my-3">
            <div class="col">
                <div class="card text-bg-dark">
                <img src="gambartemplate.jpg" class="card-img-top m-0" alt="..." style="object-fit: cover;">
                <div class="d-flex flex-column align-items-center justify-content-between position-absolute bottom-0 end-0 p-2 px-4 border" style="background-color: rgb(51, 51, 51); height: auto; z-index: 1;">
                <h5 class="card-title">MyRoutine</h5>
                <div class="d-flex align-items-center align-content-center justify-content-center w-100" style="flex-wrap: nowrap; ">
                    <div class="border-end flex-grow-1" style="height: fit-content;">
                        <span class="align-middle" style="font-size: 0.75rem">Workouts</span>
                    </div>
                    <div class="flex-grow-1">
                        <span class="align-middle">5</span>
                    </div>
                </div>
                <p class="card-text"><small>Your Rate : </small>
                    <i>4</i>
                </p>
                </div>
                </div>
            </div>
        </div>

    </div>
</div>

{{-- @endforeach --}}



@endsection
