<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Imports\CarsImport;
use Maatwebsite\Excel\Facades\Excel;

class CarController extends Controller
{
    public function show($id)
    {
        $car = Car::find($id);
        return view('cars.show', array('car' => $car));
    }
    public function add()
    {
        return view('cars.add');
    }
    public function edit($id)
    {
        $car = Car::find($id);
        return view('cars.edit', array('car' => $car));
    }
    public function update(Request $request)
    {
        $id = $request->input('id');
        $make = $request->input('make');
        $model = $request->input('model');
        $produced_on = $request->input('produced_on');
        if($id){
            Car::where('id', $id)->update(['make' => $make, 'model' => $model, 'produced_on' => $produced_on]);
        }else{
//            $id = DB::table('cars')->insert(['make' => $make, 'model' => $model, 'produced_on' => now()]);
            $car = Car::create(['make' => $make, 'model' => $model, 'produced_on' => now()]);
        }

        return Redirect::route('cars.edit', ['id' => $id])->with('message', 'Car saved correctly!!!');
    }
    public function importView()
    {
        $rootPath = $_SERVER['DOCUMENT_ROOT'].env('APP_PATH');
        $file = $rootPath.'resources/assets/xls/cars.xlsx';
        Excel::import(new CarsImport, $file);die;
        return view('cars.import');
    }
    public function import(Request $request)
    {
        $file = $request->file('file')->store('temp');
        Excel::import(new CarsImport, $file);
        return back();
    }
}
