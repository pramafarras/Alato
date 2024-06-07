@extends('layouts.main')

@section('content')


{{-- modal --}}
<div class="modal fade text-black" id="createPlaylistModal" tabindex="-1" aria-labelledby="createPlaylistModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-theme3">

            <form action="{{ route('playlist.add') }}" method="POST" id="createPlaylistForm">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="createPlaylistModalLabel">Create New Playlist</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-start">
                    <div class="mt-2">
                        <input type="text" name="playlist_name" class="form-control @error('playlist_name') is-invalid @enderror" id="playlistNameInput" placeholder="Playlist Name" value="{{ old('playlist_name') }}">
                        @error('playlist_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
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
<div class="container-fluid text-color h-100">
@if ($playlists->count())

    <div class="container d-flex justify-content-center align-items-center flex-column my-3 text-center">
        <h1 class="fw-bold pt-3 display-3 mb-3">My Playlist</h1>

        <button type="button" class="btn btn-success btn-hover mb-3" data-bs-toggle="modal" data-bs-target="#createPlaylistModal">
            Create New Playlist <i class="bi bi-plus-circle"></i>
        </button>

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
        <div class="row container my-2 py-2">
        @foreach ($playlists as $playlist)

            <div class="col-sm-12 col-md-6 mb-4">
                <div class="card text-bg-dark h-100 hoverbg text-decoration-none card-container position-relative">

                    <div class="position-absolute top-0 end-0 me-2 mt-2">
                        <button type="submit" class="btn btn-link p-0 me-2" style="color: rgb(255, 255, 255); position: relative; z-index: 1;" data-bs-toggle="modal" data-bs-target="#removePlaylistModal-{{ $playlist->id }}"><i class="bi bi-x-lg" style="font-size: 1em;"></i></button>
                    </div>



                    <a href="{{ route('playlist.show', $playlist->id) }}" class="text-decoration-none" style="color: white;">
                    <div class="d-flex justify-content-center align-items-center h-100" style="min-height: 22em; max-height: 25em;">
                        @if ($playlist->image)
                        <div class="ratio ratio-16x9 w-100 h-100">
                            <img src="{{ asset('storage/playlist_images/' . $playlist->image) }}" class="img-fluid rounded-start h-100" alt="Playlist Thumbnail">
                        </div>
                            <div class="position-absolute bottom-0 start-0 mb-3 ms-3 d-flex justify-content-start align-items-start align-content-start flex-column ">
                                <form action="{{ route('playlist.upload-image', $playlist->id) }}" method="POST" enctype="multipart/form-data" style="width: 90px;">
                                    @csrf
                                    <input type="file" name="image" class="form-control form-control-sm w-100" required onchange="this.form.submit()">

                                </form>

                            </div>
                        @else
                            <i>Upload Images For This Playlist</i>

                            <div class="position-absolute bottom-0 start-0 mb-3 ms-3 d-flex justify-content-start align-items-start align-content-start flex-column ">
                                <small class="mb-1 w-100 text-center" style="font-size: 14px">Max 2mb</small>
                                <form action="{{ route('playlist.upload-image', $playlist->id) }}" method="POST" enctype="multipart/form-data" style="width: 90px;">
                                    @csrf
                                    <input type="file" name="image" class="form-control form-control-sm w-100" required onchange="this.form.submit()">

                                </form>

                            </div>
                        @endif
                    </div>




                        <div class="bg-black d-flex flex-column align-items-center justify-content-center position-absolute bottom-0 end-0 p-2 px-4 mb-2 rounded-start">
                            <div>
                                <h5 class="card-title">{{ $playlist->name }}</h5>
                                <div class="d-flex align-items-center align-content-center justify-content-center" style="flex-wrap: nowrap;">
                                    <div class="d-inline-flex align-items-center">
                                        <span class="align-middle">Workouts | {{ $playlist->workouts->count() }}</span>
                                    </div>
                                </div>
                            </div>

                        </div>

                </a>
            </div>

            <div class="modal fade text-black" id="removePlaylistModal-{{ $playlist->id }}" tabindex="-1" aria-labelledby="removePlaylistModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form action="{{ route('playlist.remove', $playlist->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                        <div class="modal-header">
                            <h5 class="modal-title" id="removePlaylistModalLabel">Remove <i>{{ $playlist->name }}</i></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-start">
                            Are you sure you want to remove this playlist?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                                <button type="submit" class="btn btn-danger">Remove</button>

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
<div class="d-flex justify-content-center align-items-center h-100" style="height: 50vh;">
    <h1 class="display-5 text-light text-center">No Playlist Found</h1>
</div>
@endif

</div>

@endsection
