@extends('layouts.master')

@section('title', $title)

@section('content')
    <div class="container-fluid">
        <form method="POST" action="{{ route('admin.'.$prefix.'.update') }}" enctype="multipart/form-data">
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
            @foreach ($headers as $key => $header)
                @if($header['type'] === 'hidden')
                    <input id="{{$key}}" name="{{$key}}" class="form-control" type="hidden" value="{{$record->getValue($key)}}">
                @elseif($header['type'] === 'select')
                    <div class="form-group">
                        <label for="{{$key}}">{{$header['title']}}</label>
                        <select class="form-select form-select-sm" name="{{$key}}" id="{{$key}}">
                            @foreach ($header['items'] as $item)
                                <option value="{{$item['key']}}" @if ($record->getValue($key) === $item['key']) selected @endif>{{$item['value']}}</option>
                            @endforeach
                        </select>
                    </div>
                @elseif($header['type'] === 'input')
                    <div class="form-group">
                        <label for="{{$key}}">{{$header['title']}}</label>
                        <input id="{{$key}}" name="{{$key}}" class="form-control" type="text" value="{{$record->getValue($key)}}">
                    </div>
                @elseif($header['type'] === 'text')
                    <div class="form-group">
                        <label for="{{$key}}">{{$header['title']}}</label>
                        <textarea id="{{$key}}" name="{{$key}}" class="form-control">{{$record->getValue($key)}}</textarea>
                    </div>
                @elseif($header['type'] === 'file')
                    <div class="form-group">
                        <label for="{{$key}}">{{$header['title']}}</label>
                        <input id="{{$key}}" name="{{$key}}" class="form-control" type="file" value="">
                        <input id="image_hidden_name" name="image_hidden_name" class="form-control" type="hidden" value="{{$record->getValue($key)}}" />
                    </div>
                @elseif($header['type'] === 'checkbox')
                    <div class="form-group">
                        <label for="{{$key}}">{{$header['title']}}</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" id="{{$key}}" type="checkbox" name="{{$key}}" value="1" @if ($record->getValue($key)) checked @endif>
                        </div>
                    </div>
                @endif
            @endforeach
            <div class="form-group mt-3">
                <button class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>
@stop

@section('scripts')

@stop
