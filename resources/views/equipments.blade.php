

@extends('layouts.main')

@section('content')
    <div class="container-fluid text-center d-flex justify-content-center align-items-center align-content-center py-3">
    <div class="col-md-4">
            <i class="display-6 text-color shadow">Find Your Equipments</i>
            <form action="/equipments">
            <div class="form-group my-2 shadow">
                <div class="input-group">
                <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
                <button type="submit" class="btn btn-success">Search</button>
                </div>
            </div>
            </form>
        </div>
    </div>

    @if ($equipments->count())

    <div class="container-fluid text-color ">
        <div class="container  d-flex justify-content-center align-items-center flex-column my-2">
        <h1 class="fw-bold display-3">EQUIPMENTS LIST</h1>


            <div class="row container my-2 py-2 ">
    @foreach ($equipments as $eq)

              <div class="col-sm-12 col-md-4 mb-3 image-container">
                <a href="/bodyparts" class="card text-bg-dark h-100 hover">
                    <img src="data:image/png;base64,{{ base64_encode($eq->image) }}" class="img-fluid rounded-start p-3" >

                    <div class="card-img-overlay d-flex  justify-content-center align-items-end">
                      <h5 class="card-title text-light w-100 py-2 text-center bg-black bg-opacity-50 position-relative">{{ $eq["name"] }}</h5>
                    </div>
                </a>
              </div>


    @endforeach
            </div>
    </div>
    </div>
    @else
        <h1 class="display-3 text-light text-center mb-3">No Equipment Found</h1>
    @endif

@endsection
