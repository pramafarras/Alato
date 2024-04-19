<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyPlaylistController extends Controller
{
    public function index(){
        return view('myplaylist', [
            'title' => 'MyPlaylist',
            'active' => 'myplaylist'
        ]);
    }
}
