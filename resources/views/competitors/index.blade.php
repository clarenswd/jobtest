@extends('layouts.app')
@section('content')

    <div class="content columns small-12 medium-12">
        <h5 class="title text-center">Competitors</h5>
        <ol class="list_races" id="jx-race-holder">
            @if(count($competitors)==0)
                <span>There aren't competitors in the system. However, you could create some <a href="/competitors/create">here</a>.</span>
            @endif
            @foreach ($competitors as $competitor)
                <li>
                    <a href="/competitors/{{$competitor->id}}" class="competitors race">
                        <span class="location">
                            {{$competitor->name}}
                                    <i class="pe-7s-flag"></i> Position  -
                            {{$competitor->position}}
                                </span>
                    </a>
                </li>
            @endforeach
        </ol>
    </div>









@endsection