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
        ->orderByPivot('created_at', 'desc')
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

            $this->saveRatingToCSV($existing_rating);
        } else {
            // Create a new rating
            $new_rating = Rating::create([
                'user_id' => $user_id,
                'workout_id' => $workout_id,
                'rating' => $rating,
            ]);

            $this->saveRatingToCSV($new_rating);
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

private function saveRatingToCSV($rating)
{
    $csvPath = storage_path('app/public/docs/ratings.csv');
    $csvData = [
        $rating->user_id,
        $rating->workout_id,
        $rating->rating,
        now()->format('Y-m-d H:i:s'),
    ];

    $file = fopen($csvPath, 'r+');
    $isRatingExists = false;
    $rows = [];
    while (($data = fgetcsv($file)) !== false) {
        if ($data[0] == $rating->user_id && $data[1] == $rating->workout_id) {
            // Update the existing row with the new rating
            $data[2] = $rating->rating;
            $data[3] = now()->format('Y-m-d H:i:s');
            $isRatingExists = true;
        }
        $rows[] = $data;
    }
    fclose($file);

    if ($isRatingExists) {
        // If the rating exists, update the file
        $file = fopen($csvPath, 'w');
        foreach ($rows as $row) {
            fputcsv($file, $row);
        }
        fclose($file);
    } else {
        // If the rating doesn't exist, append it to the file
        $file = fopen($csvPath, 'a');
        fputcsv($file, $csvData);
        fclose($file);
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

        $this->deleteRatingFromCSV($rating);

        return redirect()->back()->with('success', 'Your rating has been removed.');
    } else {
        return redirect()->back()->with('error', 'You are not authorized to remove this rating.');
    }
}

private function deleteRatingFromCSV($rating)
{
    $csvPath = storage_path('app/public/docs/ratings.csv');
    $lines = file($csvPath); // Remove FILE_IGNORE_NEW_LINES flag
    $rowsToDelete = [];

    foreach ($lines as $lineNumber => $line) {
        $data = str_getcsv(trim($line)); // Trim the line to remove the newline character

        if ($data[0] == $rating->user_id && $data[1] == $rating->workout_id) {
            $rowsToDelete[] = $lineNumber;
        }
    }

    foreach (array_reverse($rowsToDelete) as $rowToDelete) {
        unset($lines[$rowToDelete]);
    }

    $lines = array_values($lines);


    file_put_contents($csvPath, $lines);
}
}
