<?php

namespace App\Http\Controllers;

use App\Models\Workout;
use App\Http\Requests\StoreWorkoutRequest;
use App\Http\Requests\UpdateWorkoutRequest;

class WorkoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('workout', [
            'title' => 'Workout',
            'workout' => Workout::all()
        ]);

    }

    public function indexdetail()
    {

        return view('workoutdetail', [
            'title' => 'WorkoutDetail',
            'active' => 'workoutdetail'
        ]);

    }

}
