
    <span>Race Time: </span>
    <span class="time">{{substr($race->closing_time, 0, -3)}}</span>
    <br>
    <span>Race Status: </span>
    <span class="status {{$race->isClosed()}}">   {{$race->isClosed()}}</span>
    <br>
    <span>Race Location: </span>
    <span class="status {{$race->meeting->location}}">   {{$race->isClosed()}}</span>

    <ol>
        @foreach ($race->competitors as $competitor)
            {{$competitor->position}}
        @endforeach
    </ol>

