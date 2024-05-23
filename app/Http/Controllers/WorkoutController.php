<?php

namespace App\Http\Controllers;

use App\Models\Workout;
use App\Http\Requests\StoreWorkoutRequest;
use App\Http\Requests\UpdateWorkoutRequest;
use App\Models\Equipments;
use App\Models\EquipmentWorkout;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
class WorkoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    // Check if the 'equipment' parameter is present in the request


    // Retrieve the selected equipment from the request
    $selectedEquipment = $request->input('equipment');

    // Store the selected equipment in the session
    $request->session()->put('selectedEquipment', $selectedEquipment);

    $workoutsQuery = Workout::with('bodyparts', 'equipments')
        ->when($request->has('filterworkout'), function ($query) use ($request) {
            $query->whereHas('bodyparts', function ($query) use ($request) {
                $query->whereIn('bodyparts.id', $request->input('filterworkout', []));
            });
        })
        ->when($request->has('equipment'), function ($query) use ($request) {
            $query->whereHas('equipments', function ($query) use ($request) {
                $query->where('equipments.id', $request->input('equipment'));
            });
        });

    // Apply the search filter after applying other filters
    if ($request->filled('search')) {
        $workoutsQuery->where('title', 'like', '%' . $request->input('search') . '%');
    }

    $workouts = $workoutsQuery->get()
    ->map(function ($workout) {
        $userRated = $workout->ratings()->where('user_id', Auth::id())->exists();
        $averageRating = $workout->ratings()->avg('rating');
        $ratingsCount = $workout->ratings()->distinct('user_id')->count(); // Count distinct users who have rated

        $workout->userRated = $userRated;
        $workout->averageRating = $averageRating;
        $workout->ratingsCount = $ratingsCount; // Assign the ratings count to the workout object

        return $workout;
    });

        if ($workouts->isEmpty()) {
        // If no workouts are found, return the view with an empty $workouts collection
        return view('workout', [
            'title' => 'Workout',
            'workouts' => $workouts,
            'ratings' => [],
            'workout' => null,
            'user' => Auth::user(),
        ]);
    }

    $workout = Workout::first();
    $ratings = Rating::where('workout_id', $workout->id)->get();

    $user = Auth::user();

    return view('workout', [
        'title' => 'Workout',
        'workouts' => $workouts,
        'ratings' => $ratings,
        'workout' => $workouts->first(),
        'user' => $user,
    ]);
}


public function show($id)
{
    $workout = Workout::with('bodyparts', 'equipments', 'ratings')->findOrFail($id);
    $userRated = $workout->ratings()->where('user_id', Auth::id())->first();
    $averageRating = $workout->ratings()->avg('rating');
    $ratings = $workout->ratings;
    $ratingsCount = $workout->ratings()->count(); // Get the count of ratings for the workout
    $equipment = $workout->equipments; // Retrieve the equipment associated with the workout (plural)

    return view('workoutdetail', [
        "title" => "WorkoutDetail",
        "workouts" => $workout,
        'userRated' => $userRated,
        'averageRating' => $averageRating,
        'ratings' => $ratings,
        'ratingsCount' => $ratingsCount, // Pass the count of ratings to the view
        'equipment' => $equipment, // Pass the equipment to the view
    ]);
}





}
