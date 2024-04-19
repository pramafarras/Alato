

@extends('layouts.main')

@section('content')

    <div class="container-fluid text-color ">
        <div class="container d-flex justify-content-center align-items-center flex-column my-3">
        <h1 class="fw-bold pt-3 display-3">EQUIPMENTS LIST</h1>
        <div class="my-2 py-2">

    @foreach ($equipments as $eq)

        <a href="/equipments/{{ $eq["id"] }}" style="text-decoration: none;">
            <div class="card mb-3 text-bg-dark" style="max-width: 540px;">
                <div class="row g-0">
                <div class="col-md-4 p-1">
                    <img src="dumbell.png" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                    <h5 class="card-title">{{ $eq["name"] }}</h5>
                    <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Deserunt minus odit porro</p>

                    </div>
                </div>
                </div>
            </div>
        </a>

    @endforeach

        </div>
    </div>
</div>

@endsection
