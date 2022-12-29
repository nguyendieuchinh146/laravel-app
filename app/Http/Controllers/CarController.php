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
    public function list()
    {
        $cars = Car::get();
        return view('cars.list', array('cars' => $cars));
    }
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
        $input = $request->all();
        $make = $input['make'];
        $model = $input['model'];
        $produced_on = $input['produced_on'];
        if($input['id'] !== null){
            Car::where('id', $input['id'])->update(['make' => $make, 'model' => $model, 'produced_on' => $produced_on]);
        }else{
            Car::create(['make' => $make, 'model' => $model, 'produced_on' => now()]);
        }

        return Redirect::route('cars.list')->with('message', 'Car saved correctly!!!');
    }
    public function importView()
    {
//        $rootPath = $_SERVER['DOCUMENT_ROOT'].env('APP_PATH');
//        $file = $rootPath.'resources/assets/xls/cars.xlsx';
//        Excel::import(new CarsImport, $file);die;
        return view('cars.import');
    }
    public function import(Request $request)
    {
        $file = $request->file('file')->store('temp');
        Excel::import(new CarsImport, $file);
        return back();
    }
    public function delete($id)
    {
        $data = Car::where('id', $id)->delete();
        return back();
    }
}
