@extends('layouts.master')

@section('title', 'Course - Add')

@section('content')
    <div class="container-fluid">
        <form method="POST" action="{{ route('admin.course.update') }}" enctype="multipart/form-data">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @csrf
            <input name="course_group_id" class="form-control" type="hidden" value="1">
            <input name="id" class="form-control" type="hidden" value="">
            <div class="form-group">
                <label for="code">Code</label>
                <input id="code" name="code" class="form-control" type="text" value="">
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input id="title" name="title" class="form-control" type="text" value="">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input id="image" name="image" class="form-control" type="file" value="">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <div class="form-check form-switch">
                    <input class="form-check-input" id="status" type="checkbox" name="status" value="1">
                </div>
            </div>
            <div class="form-group mt-3">
                <button class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>
@stop

@section('scripts')

@stop
