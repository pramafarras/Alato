@extends('layouts.main')

@section('content')

{{-- @if (!session('selectedEquipment')) --}}



{{-- search --}}
<div class="container-fluid text-color h-100">
<div class="text-center d-flex justify-content-center align-items-center align-content-center py-3">
    <div class="col-md-4">
        <i class="display-6 text-color shadow">Find Your Workouts</i>
        <form method="GET" action="{{ route('workout', array_merge(request()->query(), ['search' => null])) }}">
            <div class="form-group my-2 shadow">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
                    <button type="submit" class="btn btn-success">Search</button>
                </div>
            </div>
        </form>
    </div>
</div>

@if (!$workouts->isEmpty())



        <div class=" d-flex justify-content-center align-items-center flex-column">
            <h1 class="fw-bold display-3">WORKOUTS LIST</h1>
            @if (session('success'))
            <div class="alert alert-success" style="padding-top: 0.5rem; padding-bottom: 0.5rem;">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger" style="padding-top: 0.5rem; padding-bottom: 0.5rem;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- recommendation --}}
        @if(isset($recommendedWorkouts) && !$recommendedWorkouts->isEmpty() && $userHasRatedWorkouts)
        <div class="container">
        <hr class="w-100 mx-0 border-3">
            <h3 class="d-flex align-items-start justify-content-start w-100">Recommended Workouts for You</h3>
            <div class="row">
                @foreach($recommendedWorkouts as $workout)

                {{-- modal --}}
                <div class="modal fade text-black" id="createPlaylistModal-{{ $workout->id }}" tabindex="-1" aria-labelledby="createPlaylistModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content bg-theme3">
                            <form action="{{ route('workout.add-playlist', $workout->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="workout_id" value="{{ $workout->id }}">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="createPlaylistModalLabel">Create New Playlist</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-start">
                                    <div class="mt-2">
                                        <input type="text" name="playlist_name" class="form-control" id="playlistNameInput" placeholder="Playlist Name">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- modal end --}}

                    <div class="col-12 col-md-6 col-lg-4 mb-3 @if ($workouts->count() === 1) col-md-12 @elseif ($workouts->count() === 2) col-md-6 @endif">
                        <div class="card text-bg-dark h-100 hoverbg text-light card-container position-relative" >
                            <a href="/workout/{{ $workout->id }}" class="card text-bg-dark h-100 hoverbg text-decoration-none card-container">
                                <div class="ratio ratio-16x9 w-100">
                                            <iframe src="{{ $workout->video }}" allowfullscreen></iframe>
                                </div>

                            <div class="container-fluid card-body d-flex flex-column w-100" style="height: 120px;">

                                    <h5 class="card-title text-light">{{ $workout["title"] }}</h5>
                                    <div class="d-flex align-items-center">
                                        @if ($workout->averageRating > 0)
                                            @if ($workout->ratingsCount == 1)
                                            <div class="p-0 m-0 d-flex align-items-center">
                                                <span class="bi bi-star-fill checked pe-1"></span>
                                                <span>{{ number_format($workout->averageRating, 1) }} | {{ $workout->ratingsCount }} Rating
                                                </span>
                                            </div>
                                            @else
                                            <div class="p-0 m-0 d-flex align-items-center">
                                                <span class="bi bi-star-fill checked pe-1"></span>
                                                <span>{{ number_format($workout->averageRating, 1) }} | {{ $workout->ratingsCount }} Ratings
                                                </span>
                                            </div>
                                            @endif

                                        @else
                                        <div class="p-0 m-0 d-flex align-items-center">
                                            <span class="bi bi-star checked pe-1"></span>
                                            <span>{{ number_format($workout->averageRating, 1) }} | No Rating</span>
                                        </div>
                                        @endif

                                    </div>

                                    <div class="d-flex align-items-center h-100" >

                                        @if ($workout->userRated)

                                            <i class="checked">Rated</i>

                                        @endif


                                    </div>

                            </div>
                        </a>
                        <div class="d-flex justify-content-end align-items-end position-absolute bottom-0 end-0 container">
                            <div class="dropdown" id="dropdownMenu-{{ $workout->id }}">
                            <button class="btn btn-link p-0" style="color: white" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots"></i></button>
                            <ul class="dropdown-menu">

                                <li>
                                    <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#createPlaylistModal-{{ $workout->id }}" data-workout-id="{{ $workout->id }}">
                                        Create New Playlist
                                    </button>
                                </li>
                                @if ($user->playlists->count())
                                <li><hr class="dropdown-divider"></li>
                                @foreach($user->playlists as $playlist)
                                @php
                                $isWorkoutInPlaylist = $playlist->workouts->contains($workout->id);
                            @endphp
                            <li>
                                @if($isWorkoutInPlaylist)
                                    <form action="{{ route('workout.remove-from-playlist', [$playlist->id, $workout->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item">Remove from <i>{{ $playlist->name }}</i></button>
                                    </form>
                                @else
                                    <form action="{{ route('workout.add-to-playlist', $workout->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="playlist" value="{{ $playlist->id }}">
                                        <button type="submit" class="dropdown-item">Add to <i>{{ $playlist->name }}</i></button>
                                    </form>
                                @endif
                            </li>
                                @endforeach

                            @endif
                            </ul>
                        </div>
                        </div>
                    </div>
                    </div>
                @endforeach
            </div>
            <hr class="w-100 mx-0 border-3">
        </div>
        @endif
        {{-- recommendation-end --}}
        <div class="container">
            <div class="row">
                @foreach ($workouts as $workout)

                    {{-- modal --}}
                    <div class="modal fade text-black" id="createPlaylistModal-{{ $workout->id }}" tabindex="-1" aria-labelledby="createPlaylistModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content bg-theme3">
                                <form action="{{ route('workout.add-playlist', $workout->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="workout_id" value="{{ $workout->id }}">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="createPlaylistModalLabel">Create New Playlist</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-start">
                                        <div class="mt-2">
                                            <input type="text" name="playlist_name" class="form-control" id="playlistNameInput" placeholder="Playlist Name">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Create</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- modal end --}}

                    <div class="col-12 col-md-6 col-lg-4 mb-3 @if ($workouts->count() === 1) col-md-12 @elseif ($workouts->count() === 2) col-md-6 @endif">
                        <div class="card text-bg-dark h-100 hoverbg text-light card-container position-relative" >
                            <a href="/workout/{{ $workout->id }}" class="card text-bg-dark h-100 hoverbg text-decoration-none card-container">
                                <div class="ratio ratio-16x9 w-100">
                                            <iframe src="{{ $workout->video }}" allowfullscreen></iframe>
                                </div>
                            {{-- <img src="data:image/png;base64,{{ base64_encode($workout->video) }}" class="img-fluid card-img-top" alt="Workout Image"> --}}
                            <div class="container-fluid card-body d-flex flex-column w-100" style="height: 120px;">

                                    <h5 class="card-title text-light">{{ $workout["title"] }}</h5>
                                    <div class="d-flex align-items-center">
                                        @if ($workout->averageRating > 0)
                                            @if ($workout->ratingsCount == 1)
                                            <div class="p-0 m-0 d-flex align-items-center">
                                                <span class="bi bi-star-fill checked pe-1"></span>
                                                <span>{{ number_format($workout->averageRating, 1) }} | {{ $workout->ratingsCount }} Rating
                                                </span>
                                            </div>
                                            @else
                                            <div class="p-0 m-0 d-flex align-items-center">
                                                <span class="bi bi-star-fill checked pe-1"></span>
                                                <span>{{ number_format($workout->averageRating, 1) }} | {{ $workout->ratingsCount }} Ratings
                                                </span>
                                            </div>
                                            @endif

                                        @else
                                        <div class="p-0 m-0 d-flex align-items-center">
                                            <span class="bi bi-star checked pe-1"></span>
                                            <span>{{ number_format($workout->averageRating, 1) }} | No Rating</span>
                                        </div>
                                        @endif

                                    </div>

                                    <div class="d-flex align-items-center h-100" >

                                        @if ($workout->userRated)

                                            <i class="checked">Rated</i>

                                        @endif


                                    </div>

                            </div>
                        </a>
                        <div class="d-flex justify-content-end align-items-end position-absolute bottom-0 end-0 container">
                            <div class="dropdown" id="dropdownMenu-{{ $workout->id }}">
                            <button class="btn btn-link p-0" style="color: white" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots"></i></button>
                            <ul class="dropdown-menu">

                                <li>
                                    <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#createPlaylistModal-{{ $workout->id }}" data-workout-id="{{ $workout->id }}">
                                        Create New Playlist
                                    </button>
                                </li>
                                @if ($user->playlists->count())
                                <li><hr class="dropdown-divider"></li>
                                @foreach($user->playlists as $playlist)
                                @php
                                $isWorkoutInPlaylist = $playlist->workouts->contains($workout->id);
                            @endphp
                            <li>
                                @if($isWorkoutInPlaylist)
                                    <form action="{{ route('workout.remove-from-playlist', [$playlist->id, $workout->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item">Remove from <i>{{ $playlist->name }}</i></button>
                                    </form>
                                @else
                                    <form action="{{ route('workout.add-to-playlist', $workout->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="playlist" value="{{ $playlist->id }}">
                                        <button type="submit" class="dropdown-item">Add to <i>{{ $playlist->name }}</i></button>
                                    </form>
                                @endif
                            </li>
                                @endforeach

                            @endif
                            </ul>
                        </div>
                        </div>
                    </div>
                    </div>
                @endforeach
            </div>
        </div>


@else
    <div class="d-flex justify-content-center align-items-center" style="height: 50vh;">
        <h1 class="display-5 text-light text-center">No Workout Found</h1>
    </div>
@endif

{{-- @else
<div class="container-fluid d-flex align-items-center justify-content-center flex-column text-light my-5">
    <h1>Please select an equipment first to find workouts you want.</h1>
    <a href="/equipments" class="btn btn-success text-black mt-lg-2 px-3 btn-hover mt-2" style="background-color: #37b937;">SELECT EQUIPMENTS HERE</a>
</div>
@endif --}}

</div>
@endsection
