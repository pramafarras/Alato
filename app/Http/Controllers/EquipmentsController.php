<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipments;

class EquipmentsController extends Controller
{

    public function index(){
        return view('equipments', [
            'title' => 'Equipments',
            'equipments' => Equipments::all()
        ]);
    }

    public function show(Equipments $equipment){
        return view('equipment', [
            'title' => 'Equipment',
            'equipment' => $equipment
        ]);
    }
}
