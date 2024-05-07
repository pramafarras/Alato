<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipments;

class EquipmentsController extends Controller
{


    public function index(){
        // dd(request('search'));
        $equipments = Equipments::orderBy('id', 'asc');

        if(request('search')){
            $equipments->where('name', 'like', '%' . request('search') . '%');
        }


        return view('equipments', [
            'title' => 'Equipments',
            'equipments' => $equipments->get()
        ]);
    }



    public function show(Equipments $equipment){
        return view('equipment', [
            'title' => 'Equipment',
            'equipment' => $equipment
        ]);
    }
}
