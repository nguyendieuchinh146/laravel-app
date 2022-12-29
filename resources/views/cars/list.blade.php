@extends('layouts.master')

@section('title', 'Car - List')

@section('content')
    <div class="container-fluid">
        <a href="{{route('cars.import')}}">Import</a>
        <a href="{{route('cars.add')}}">Add</a>
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Make</th>
                <th scope="col">Model</th>
                <th scope="col">Produced On</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($cars as $car)
                <tr>
                    <td><a href="{{route('cars.show', ['id' => $car->id])}}">{{$car->id}}</a></td>
                    <td>{{$car->make}}</td>
                    <td>{{$car->model}}</td>
                    <td>{{$car->produced_on}}</td>
                    <td>
                        <a href="{{route('cars.edit', ['id' => $car->id])}}">Edit</a>
                        <a  href="#" onclick='confirm("Are You Sure Want to Delete?") ? window.location.href = "{{route('cars.delete', ['id' => $car->id])}}" : "";'>Delete</a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@stop

@section('scripts')

@stop
