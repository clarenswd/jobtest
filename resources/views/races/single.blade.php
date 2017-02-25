
    <span>Race Time: </span>
    <span class="time">{{substr($race->closing_time, 0, -3)}}</span>
    <br>
    <span>Race Status: </span>
    <span class="status {{$race->isClosed()}}">   {{$race->isClosed()}}</span>
    <br>
    <span>Race Location: </span>
    <span class="status {{$race->meeting->location}}">   {{$race->meeting->location}}</span>

    <ol>
        @if (count($race->competitors ) > 0)
            @foreach ($race->competitors as $competitor)
               <li> {{$competitor->name}} - {{$competitor->position}}</li>
            @endforeach
        @else
           <li>- No Competitors registered yet.</li>
        @endif
    </ol>

