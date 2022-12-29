@extends('layouts.master')

@section('title', 'Course - Show')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <a href="{{ route('admin.course.edit', ['id' => $course->id]) }}">Edit</a>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <td>Code</td>
                        <td>{{ $course->code }}</td>
                    </tr>
                    <tr>
                        <td>Title</td>
                        <td>{{ $course->title }}</td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>{{ $course->description }}</td>
                    </tr>
                    <tr>
                        <td>Image</td>
                        <td><img style="height: 50px" src="{{env('APP_URL')}}/{{env('APP_PATH')}}/storage/app/{{$course->image}}" alt=""></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td><input class="form-check-input" type="checkbox" @if ($course->status) checked @endif ></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-6"></div>
        </div>
    </div>
@stop

@section('scripts')

@stop

