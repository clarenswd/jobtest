@extends('layouts.app')

@section('xtra-js')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.js"></script>
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="columns small-12 medium-4">

                <form method="post" action="/races">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="meeting">Meeting</label>
                        <select name="meeting"  id="meeting" placeholder="Select Meeting">
                            @foreach ($meetings as $meeting)
                                <option value="{{ $meeting->id }}">{{ $meeting->location}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="closing_time">Closing Time</label>
                        <input type="text" name="closing_time" id="closing_time" placeholder="Select time">
                    </div>

                    <button type="submit" class="button">Save Race</button>

                </form>
            </div>

            <div class="columns small-12 medium-8">
                <div class="callout warning">
                    <h6>Races data</h6>
                    <p>We currently have <strong>{{count($current_races)}}</strong> stored in the system.</p>
                </div>
                <table>
                    <thead>
                    <tr>
                        <th width="150">Race Time</th>
                        <th width="150">Race Location | Meeting *</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($current_races as $current_race)
                    <tr>
                        <td>{{$current_race->closing_time}}</td>
                        <td>{{$current_race->meeting->location}}</td>

                    </tr>
                    @endforeach
                    </tbody>
                </table>

                <small>
                   * I didn't fully understand what exactly meeting was, I hope it will get explained in the next revision. I assumed and from google, those are the actual fields races take place.

                </small>
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