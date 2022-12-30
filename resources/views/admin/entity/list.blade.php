@extends('layouts.master')

@section('title', $title)

@section('content')
    <div class="container-fluid">
        <a href="{{route('admin.'.$prefix.'.add')}}">Add</a>
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                @foreach ($headers as $header)
                <th>{{$header['title']}}</th>
                @endforeach
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($records as $record)
                <tr>
                    @foreach ($headers as $key =>  $header)
                        @if($key === 'id')
                            <td><a href="{{route('admin.'.$prefix.'.show', ['id' => $record->id])}}">{{$record->id}}</a></td>
                        @elseif($key === 'image')
                            <td><img style="height: 50px" src="{{env('APP_URL')}}/{{env('APP_PATH')}}/storage/app/{{$record->image}}" alt=""></td>
                        @elseif($key === 'status')
                            <td><input class="form-check-input" type="checkbox" @if ($record->status) checked @endif ></td>
                        @else
                            <td>{{$record->getValue($key)}}</td>
                        @endif
                    @endforeach
                    <td>
                        @if($prefix === 'lesson')
                            <a href="{{route('admin.skill.listByLesson', ['lesson_id' => $record->id])}}">Skills</a>
                        @endif
                        <a href="{{route('admin.'.$prefix.'.edit', ['id' => $record->id])}}">Edit</a>
                        <a  href="#" onclick='confirm("Are You Sure Want to Delete?") ? window.location.href = "{{route('admin.'.$prefix.'.delete', ['id' => $record->id])}}" : "";'>Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop

@section('scripts')

@stop
