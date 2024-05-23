<?php

namespace App\Http\Controllers;

use App\Http\Requests\BodypartsRequest;
use App\Models\Bodyparts;
use App\Http\Requests\StoreBodypartsRequest;
use App\Http\Requests\UpdateBodypartsRequest;
use App\Models\BodypartCategory;
use App\Models\Equipments;
use App\Models\Workout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;

class BodypartsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id, Request $request)
    {
        $equipment = Equipments::with('bodyparts.category')->findOrFail($id);
        $filteredBodyparts = $equipment->bodyparts->load('category');
        $categories = $filteredBodyparts->pluck('category')->unique();


        return view('bodyparts', [
            'title' => 'Bodyparts',
            'categories' => $categories,
            'equipment' => $equipment,
            'filteredBodyparts' => $filteredBodyparts,
            'selectedBodypartIds' => [],

        ]);
    }

    public function validate($id, Request $request)
{

    $validatedData = $request->validate([
        'filterworkout' => 'required|array|min:1',
    ], [
        'filterworkout.required' => 'Please select at least one bodypart.',
        'filterworkout.min' => 'Please select at least one bodypart.',
    ]);

    $selectedBodypartIds = $request->input('filterworkout', []);

    return redirect()->route('workout', [
        'filterworkout' => $selectedBodypartIds,
        'equipment' => $id,
    ]);
}


}
