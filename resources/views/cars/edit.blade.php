@extends('layouts.master')
<body>
    <div class="container">
        <form method="POST" action="{{ route('cars.update') }}">
            @csrf
            <input name="id" class="form-control" type="hidden" value="{{$car->id}}">
            <div class="form-group">
                <label for="title">Make</label>
                <input id="make" name="make" class="form-control" type="text" value="{{$car->make}}">
            </div>
            <div class="form-group">
                <label for="model">model</label>
                <input id="model" name="model" class="form-control" type="text" value="{{$car->model}}">
            </div>
            <div class="form-group">
                <label for="title">produced_on</label>
                <input id="produced_on" name="produced_on" class="form-control" type="text" value="{{$car->produced_on}}">
            </div>
            <div class="form-group">
                <button class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>
</body>
