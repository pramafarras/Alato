<?php

namespace App\Http\Controllers;

use App\Models\Bodyparts;
use App\Http\Requests\StoreBodypartsRequest;
use App\Http\Requests\UpdateBodypartsRequest;

class BodypartsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('bodyparts', [
            'title' => 'Bodyparts',
            'active'=> 'bodyparts',
            // 'bodyparts' => Bodyparts::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBodypartsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Bodyparts $bodyparts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bodyparts $bodyparts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBodypartsRequest $request, Bodyparts $bodyparts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bodyparts $bodyparts)
    {
        //
    }
}
