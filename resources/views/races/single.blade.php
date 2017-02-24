@extends('layouts.app')
@section('content')
    <div class="time">Race Time:  {{$race->closing_time}}</div>
    <div class="time">Race Status:  {{$race->isClosed()}}</div>

    <ul>
        @foreach ($race->competitors as $competitor)
            {{$competitor->position}}
        @endforeach
    </ul>

@endsection