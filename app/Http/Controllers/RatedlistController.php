<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RatedlistController extends Controller
{
    public function index(){
        return view('ratedlist', [
            'title' => 'Ratedlist',
            'active' => 'ratedlist'
        ]);
    }
}
