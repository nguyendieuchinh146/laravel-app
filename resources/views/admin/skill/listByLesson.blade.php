@extends('layouts.master')

@section('title', 'Skill - List')

@section('content')
    <div class="container-fluid">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Code</th>
                <th>Title</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($skills as $skill)
                <tr>
                    <td>{{$skill->id}}</td>
                    <td>{{$skill->code}}</td>
                    <td>{{$skill->title}}</td>
                    <td>{{$skill->description}}</td>
                    <td>
                        <a href="{{route('admin.question.listBySkill', ['skill_id' => $skill->id])}}">Questions</a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@stop

@section('scripts')

@stop
