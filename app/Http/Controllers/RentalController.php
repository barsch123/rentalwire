<?php

namespace App\Http\Controllers;

use App\Models\Equipmentrental;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    //
    public function index()
    {
        return view('rentals.rentals');
    }

    public function show($slug){
        $equipment = Equipmentrental::where('slug', $slug)->firstOrFail();
        return view('rentals.details',[
            'equipment' => $equipment
        ]);
    }
}
