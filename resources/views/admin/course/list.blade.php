@extends('layouts.master')

@section('title', 'Course - List')

@section('content')
    <div class="container-fluid">
        <a href="{{route('admin.course.add')}}">Add</a>
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Code</th>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($courses as $course)
                <tr>
                    <td><a href="{{route('admin.course.show', ['id' => $course->id])}}">{{$course->id}}</a></td>
                    <td>{{$course->code}}</td>
                    <td>{{$course->title}}</td>
                    <td>{{$course->description}}</td>
                    <td><img style="height: 50px" src="{{env('APP_URL')}}/{{env('APP_PATH')}}/storage/app/{{$course->image}}" alt=""></td>
                    <td><input class="form-check-input" type="checkbox" @if ($course->status) checked @endif ></td>
                    <td>
                        <a href="{{route('admin.course.edit', ['id' => $course->id])}}">Edit</a>
                        <a  href="#" onclick='confirm("Are You Sure Want to Delete?") ? window.location.href = "{{route('admin.course.delete', ['id' => $course->id])}}" : "";'>Delete</a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@stop

@section('scripts')

@stop
