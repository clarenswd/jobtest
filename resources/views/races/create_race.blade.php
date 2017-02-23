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