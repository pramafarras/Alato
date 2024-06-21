@extends('layouts.main')

@section('content')

@if ($equipment->bodyparts->count())

    <div class="container-fluid text-color">
        <h1 class="fw-bold text-center pt-3 display-3">CHOOSE BODY PARTS</h1>

        <div class="d-flex justify-content-center">
            <div class="container" style="width: 38rem">

        <form action="{{ route('bodyparts.submit', ['equipment' => $equipment->id]) }}" method="POST" class="needs-validation">
            @csrf
            <input type="hidden" name="equipment" value="{{ $equipment->id }}">
            <input type="hidden" name="bodyparts_required" value="">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
      @foreach ($categories as $category)

          <div class="card my-3 text-bg-dark">
            <div class="px-2 pt-2 card-title fw-bold text-center card-header border-light">
              <h4>{{ $category->category }}</h4>
            </div>
            <div class="row card-body">
              <div class="w-100">

                <ul class="form-check list-group list-group-flush ">
            @foreach ($filteredBodyparts as $bodypart)
                @if ($bodypart->category->id === $category->id)
                  <li class="text-bg-dark d-flex flex-col-reverse justice-content-between mb-2 list-group-item w-100 ">
                    <div class="li-hover py-1 btn-group-vertical w-100 container rounded" data-toggle="buttons" role="group" aria-label="Basic radio toggle button group">
                      <label class="label-li w-100 d-flex justify-content-between align-items-between flex-row-reverse">
                        <input type="checkbox" autocomplete="off" name="filterworkout[]" value="{{ $bodypart->id }}"

                        @if(in_array($bodypart->id, $selectedBodypartIds))
                        checked
                        @endif
                        class="form-check-input">

                        {{ $bodypart->name }}
                      </label>
                    </div>
                  </li>
                    @endif
                @endforeach
                </ul>


              </div>
            </div>
          </div>

        @endforeach
        <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-success px-5 mb-3 btn-hover">SUBMIT</button>
    </div>
    </form>
    </div>
</div>
</div>




    @else
        <h1 class="display-3 text-light text-center my-3">No Bodypart Found</h1>
    @endif

 @endsection
