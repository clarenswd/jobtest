@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="columns small-12 medium-4">

                <form method="post" action="/meetings">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" name="location" placeholder="Enter the name of the location.">
                    </div>
                    <div class="form-group">
                        <label for="type">Meeting type</label>
                        <select name="meeting_type"  id="meeting_type" placeholder="Select the type for this meeting">
                            @foreach ($types as $k =>$type)
                                <option value="{{ $type }}">{{ $k }}</option>
                            @endforeach
                        </select>
                    </div>



                    <button type="submit" class="button">Save Meeting</button>

                </form>
            </div>

            <div class="columns small-12 medium-8">

                <table>
                    <thead>
                    <tr>
                        <th width="150">Meeting type</th>
                        <th width="150">Location </th>
                        <th width="150">N. Races</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($meetings)>0)
                        @foreach($meetings as $meeting)
                            <tr>
                                <td>{{$meeting->type}}</td>
                                <td>{{$meeting->location}}</td>
                                <td>{{count($meeting->races)}}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3">No meetings yet.</td>
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