<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Workout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class RecommendationController extends Controller
{
    public function getRecommendations(Request $request)
    {
        $workouts = $request->input('workouts');
        $userId = Auth::id(); // Get the authenticated user's ID
        $numRecommendations = $request->input('num_recommendations', 3); // Default value is 3

        $pythonScriptPath = base_path('python/User_Based_Recommendation_System.py');

        // Set the user ID and number of recommendations as environment variables
        putenv("USER_ID=$userId");
        putenv("NUM_RECOMMENDATIONS=$numRecommendations");

        $command = sprintf('python %s', $pythonScriptPath);
        exec($command, $output, $returnValue);

        if ($returnValue !== 0) {
            // Handle Python script execution error
            return response()->json(['error' => 'Failed to execute Python script'], 500);
        }

        // Find the line containing the JSON output
        $jsonOutput = null;
        foreach ($output as $line) {
            if (preg_match('/^\[{/', $line)) {
                $jsonOutput = trim($line); // Trim any leading/trailing whitespace
                break;
            }
        }

        if (empty($jsonOutput) || trim($jsonOutput) === '[]') {
            // Handle the case when the Python script doesn't return any JSON output or returns an empty array
            $recommendedWorkouts = collect(); // Return an empty collection
        } else {
            // Decode the JSON output
            $recommendedWorkouts = collect(json_decode($jsonOutput, true));

            if ($recommendedWorkouts->isEmpty()) {
                // Handle the case when the JSON output is empty
                $recommendedWorkouts = collect();
            }
        }

        // Log the JSON output for debugging
        Log::info('JSON output: ' . $jsonOutput);

        // Decode the JSON output
        // $recommendedWorkouts = json_decode($jsonOutput, true);

        if ($recommendedWorkouts === null) {
            // Handle the case when the Python script output cannot be decoded as an array
            Log::error('Invalid JSON output: ' . json_last_error_msg());
            return response()->json(['error' => 'Invalid output format from Python script'], 500);
        }

        // Get the workout titles and IDs from the JSON output
        $recommendedWorkoutsTitles = $recommendedWorkouts->pluck('workout');
        $recommendedWorkoutsIds = $recommendedWorkouts->map(function ($workout) use ($workouts) {
            $title = $workout['workout'];
            $workoutId = $workouts->where('title', $title)->pluck('id')->first();
            return $workoutId;
        });

        // Load the recommended workouts from the database
        $recommendedWorkoutsModels = Workout::whereIn('id', $recommendedWorkoutsIds)->get();

        $recommendedWorkoutsModels = $recommendedWorkoutsModels->map(function ($workout) use ($userId) {
            $userRated = $workout->ratings()->where('user_id', $userId)->exists();
            $averageRating = $workout->ratings()->avg('rating');
            $ratingsCount = $workout->ratings()->distinct('user_id')->count(); // Count distinct users who have rated

            $workout->userRated = $userRated;
            $workout->averageRating = $averageRating;
            $workout->ratingsCount = $ratingsCount;

            return $workout;
        });

        return $recommendedWorkoutsModels;
        }
}
