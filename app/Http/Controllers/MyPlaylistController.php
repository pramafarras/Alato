<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Models\Workout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class MyPlaylistController extends Controller
{
    public function index()
    {
        $user = User::findOrFail(Auth::id());
        $playlists = $user->playlists()->with('workouts')->get();

        return view('myplaylist', [
            'title' => 'My Playlists',
            'playlists' => $playlists,
        ]);
    }

    public function showPlaylist($playlistId, Request $request)
{
    $user = User::findOrFail(Auth::id());
    $selectedEquipment = $request->session()->get('selectedEquipment');

    $playlist = $user->playlists()->with('workouts')->findOrFail($playlistId);

    return view('playlistdetail', [
        'title' => $playlist->name,
        'playlist' => $playlist,
        // 'selectedEquipment' => $selectedEquipment,
    ]);
}

public function removePlaylist($playlistId)
{
    $playlist = Playlist::findOrFail($playlistId);

    // Check if the rating belongs to the authenticated user
    if ($playlist->user_id == Auth::id()) {
        $playlist->delete();

        // Remove the 'is_rated' pivot value for the user and workout
        // $user = User::findOrFail(Auth::id());
        // $user->workouts()->updateExistingPivot($playlist->workout_id, ['is_playlist' => false]);

        return redirect()->back()->with('success', 'Your rating has been removed.');
    } else {
        return redirect()->back()->with('error', 'You are not authorized to remove this rating.');
    }
}
    public function addToPlaylist(Request $request, $workoutId){
        $workout = Workout::findOrFail($workoutId);
        $user = User::findOrFail(Auth::id());
        $playlistId = $request->input('playlist');


    if ($playlistId) {
            // Create a new playlist
            $playlist = $user->playlists()->findOrFail($playlistId);
            $playlist->workouts()->attach($workout->id);
            return redirect()->back()->with('success', 'Workout added to the playlist.');
    }


    return redirect()->back()->with('error', 'Please select or create a playlist.');

    }

    public function addPlaylist(Request $request, $workoutId = null)
{
    $validatedData = $request->validate([
        'playlist_name' => 'required|min:3|max:20',
    ], [
        'playlist_name.required' => 'Please insert at least 3 words.',
        'playlist_name.min' => 'Please insert at least 3 words.',
        'playlist_name.max' => 'Please insert less than 20 words.',
    ]);

    $user = User::findOrFail(Auth::id());
    $playlistName = $request->input('playlist_name');

    if ($playlistName) {
        $playlist = $user->playlists()->create(['name' => $playlistName]);

        // If a workoutId is provided, attach the workout to the playlist
        if ($workoutId) {
            $workout = Workout::findOrFail($workoutId);
            $playlist->workouts()->attach($workout->id);
            $message = 'Workout added to the new playlist.';
        } else {
            $message = 'New playlist created successfully.';
        }

        return redirect()->back()->with('success', $message);
    }

    return back()->withInput()->withErrors(['playlist_name' => 'Please provide a playlist name.']);
}

    public function removeFromPlaylist($id, $workoutId)
    {
        $user = User::findOrFail(Auth::id());
        $playlist = $user->playlists()->findOrFail($id);
        $workout = Workout::findOrFail($workoutId);

        $playlist->workouts()->detach($workout->id);

        return redirect()->back()->with('success', 'Workout removed from the playlist.');
    }

    public function uploadImage(Request $request, $playlistId)
{
    $playlist = Playlist::findOrFail($playlistId);

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->storeAs('public/playlist_images', $imageName);

        $playlist->image = $imageName;
        $playlist->save();

        return redirect()->back()->with('success', 'Image uploaded successfully.');
    }

    return redirect()->back()->with('error', 'Please select an image to upload.');
}
}
