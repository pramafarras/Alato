

@extends('layouts.main')

@section('content')

    <div class="container-fluid text-color">
        <div class="d-flex justify-content-center align-items-center flex-column my-3 text-center mx-5 px-3">
        <h1 class="fw-bold pt-3 display-3">RATED LIST</h1>

    {{-- @if ($Workout->count()) --}}


    {{-- @foreach ($equipments as $eq) --}}

            <div class="card mb-3 w-100" style="max-height: 150px" >
                <div class="row g-0">
                <div class="col-md-4 bg-workout">
                    {{-- <img src="home_wallpaper.jpg" class="card-img-top m-0 img-fluid" alt="..." style="object-fit: cover;"> --}}
                </div>
                <div class="col-md-8">
                    <div class="card-body text-start">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-footer card-text">
                        <small class="text-body-secondary">Your Rate : </small>
                        <i>4</i>
                    </p>
                    </div>
                </div>
                </div>
            </div>

        </div>
    </div>

    {{-- @endforeach --}}
    {{-- @else
        <p class="text-center fs-4">You haven't rated any workout</p>
    @endif --}}


@endsection
