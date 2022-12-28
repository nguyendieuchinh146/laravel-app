@extends('layouts.master')
<body>
    <div class="container">
        <form method="POST" action="{{ route('cars.import.file') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">File</label>
                <input id="file" name="file" class="form-control" type="file" >
            </div>
            <div class="form-group">
                <button class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>
</body>
