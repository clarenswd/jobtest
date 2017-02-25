@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="columns small-12 medium-4">

                <h5 class="section_title">Register Competitors</h5>
                <form method="post" action="/competitors">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="race">Select Race for the competitor:</label>
                        <select name="race"  id="race" placeholder="Select race">
                            @foreach ($races as $race)
                                <option value="{{ $race->id }}">{{ $race->meeting->location}} - {{ $race->closing_time}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="name">Insert competitor name:</label>
                        <input type="text" name="name">
                    </div>

                    <div class="form-group">
                        <label for="position">Insert the position for the race:</label>
                        <input type="number" name="position" id="position">
                    </div>

                    <button type="submit" class="button">Save Competitor</button>

                </form>
            </div>

            <div class="columns small-12 medium-8">

                <table>
                    <thead>
                        <tr>
                            <th width="150">Runner name</th>
                            <th width="150">Race Meeting </th>
                            <th width="150">Position</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(count($competitors)>0)
                        @foreach($competitors as $competitor)
                            <tr>
                                <td>{{$competitor->name}}</td>
                                <td>{{$competitor->race->meeting->location}} - {{$competitor->race->closing_time}}</td>
                                <td>{{$competitor->position}}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3">No competitors yet.</td>
                        </tr>
                    @endif
                    </tbody>
                </table>

            </div>

        </div>
    </div>

@endsection


@section('jx-scripts')
    <script>
        $(function(){
            //Documentation::
            // http://jonthornton.github.io/jquery-timepicker/
            $('#closing_time').timepicker({step:1, timeFormat:"H:i:s" });

        });
    </script>
@endsection