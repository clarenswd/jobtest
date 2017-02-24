@extends('layouts.app')
@section('content')
    <div class="time">  {{$race->closing_time}}</div>

    <ul>
        @foreach ($race->competitors as $competitor)
            {{$competitor->position}}
        @endforeach
    </ul>

@endsection