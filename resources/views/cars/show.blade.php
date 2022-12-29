@extends('layouts.master')

@section('title', 'Car - Show')

@section('content')
    <div class="container-fluid">
        <ul>
            <li>Make: {{ $car->make }}</li>
            <li>Model: {{ $car->model }}</li>
            <li>Produced on: {{ $car->produced_on }}</li>
        </ul>
        <a href="{{ route('cars.edit', ['id' => $car->id]) }}">Edit</a>
    </div>
@stop

@section('scripts')

@stop

