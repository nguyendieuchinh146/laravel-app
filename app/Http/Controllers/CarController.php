<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Car;

class CarController extends Controller
{
    public function show($id)
    {
        $car = Car::find($id);
        return view('cars.show', array('car' => $car));
    }
}
