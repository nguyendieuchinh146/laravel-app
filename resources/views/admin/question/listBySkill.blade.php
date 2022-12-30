@extends('layouts.master')

@section('title', 'Skill - List')

@section('content')
    <div class="container-fluid">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Description</th>
                <th>Spelling</th>
                <th>Template</th>
                <th>Answer</th>
                <th>Image</th>
                <th>Audio</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($questions as $key => $question)
                <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$question->title}}</td>
                    <td>{{$question->description}}</td>
                    <td>{{$question->spelling}}</td>
                    <td>{{$question->template_name}}</td>
                    <td>{{$question->answer}}</td>
                    <td><img style="height: 50px" src="{{env('APP_URL')}}/{{env('APP_PATH')}}/{{$question->image}}" alt=""></td>
                    <td><audio controls>
                            <source src="{{env('APP_URL')}}/{{env('APP_PATH')}}/{{$question->audio}}" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio></td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@stop

@section('scripts')

@stop
