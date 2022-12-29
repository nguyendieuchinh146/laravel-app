@extends('layouts.master')

@section('title', 'Course - Edit')

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
            <input name="course_group_id" class="form-control" type="hidden" value="{{$course->course_group_id}}" />
            <input name="id" class="form-control" type="hidden" value="{{$course->id}}" />
            <div class="form-group">
                <label for="code">Code</label>
                <input id="code" name="code" class="form-control" type="text" value="{{$course->code}}" />
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input id="title" name="title" class="form-control" type="text" value="{{$course->title}}" />
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control">{{$course->description}}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input id="image" name="image" class="form-control" type="file" value="" />
                <input id="image_name" name="image_name" class="form-control" type="hidden" value="{{$course->image}}" />
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <div class="form-check form-switch">
                    <input class="form-check-input" id="status" type="checkbox" name="status" value="1" @if ($course->status) checked @endif />
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
