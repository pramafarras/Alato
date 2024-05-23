<?php

namespace App\Http\Controllers;

use App\Models\Workout;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class RatingController extends Controller
{
    public function index()
{
    $user = User::findOrFail(Auth::id());
    $ratedWorkouts = $user->workouts()
        ->wherePivot('is_rated', true)
        ->with('equipments', 'bodyparts', 'ratings.users')
        ->get();

    $ratedWorkouts->each(function ($workout) use ($user) {
        $userRating = $workout->ratings->where('user_id', $user->id)->first();
        $workout->userRated = $userRating ? $userRating->rating : null;
        $workout->userRating = $userRating;
    });

    return view('ratedlist', [
        'title' => 'Rated List',
        'workouts' => $ratedWorkouts,
    ]);
}

public function add(Request $request, Workout $workoutId)
{
    $rating = $request->input('workout_rating');
    $workout_id = $request->input('workout_id');

    if (!$rating || $rating < 1 || $rating > 5) {
        return redirect()->back()->with('error', 'Invalid rating value');
    }

    $workout_check = Workout::where('id', $workout_id)->first();

    if ($workout_check) {
        $user_id = Auth::id();

        // Check if the rating already exists
        $existing_rating = Rating::where('user_id', $user_id)
            ->where('workout_id', $workout_id)
            ->first();

        if ($existing_rating) {
            // Update the existing rating
            $existing_rating->rating = $rating;
            $existing_rating->save();
        } else {
            // Create a new rating
            Rating::create([
                'user_id' => $user_id,
                'workout_id' => $workout_id,
                'rating' => $rating,
            ]);
        }

        $user = User::with('workouts')->findOrFail($user_id);
        $user->workouts()->syncWithoutDetaching([
            $workout_id => [
                'is_rated' => true,
            ],
        ]);

        return redirect()->back()->with('status', "Thank you for rating this workout");
    } else {
        return redirect()->back()->with('status', "The link was broken");
    }
}

public function removeRating($ratingId)
{
    $rating = Rating::findOrFail($ratingId);

    // Check if the rating belongs to the authenticated user
    if ($rating->user_id == Auth::id()) {
        $rating->delete();

        // Remove the 'is_rated' pivot value for the user and workout
        $user = User::findOrFail(Auth::id());
        $user->workouts()->updateExistingPivot($rating->workout_id, ['is_rated' => false]);

        return redirect()->back()->with('success', 'Your rating has been removed.');
    } else {
        return redirect()->back()->with('error', 'You are not authorized to remove this rating.');
    }
}
}
