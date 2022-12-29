@extends('layouts.master')

@section('title', 'Car - Import')

@section('content')
    <div class="container-fluid">
        <form method="POST" action="{{ route('cars.import.file') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-4">
                <label for="title">File</label>
                <input id="file" name="file" class="form-control" type="file">
            </div>
            <div class="form-group">
                <button class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>
@stop

@section('scripts')

@stop

