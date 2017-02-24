@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="columns small-12 medium-4">
                <form method="post" action="/meetings">
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
                <div class="callout warning">
                    <strong>Races data</strong>
                    <p>We currently have <strong>{{count($current_races)}}</strong> races stored in the system.</p>
                </div>
            </div>

            <div class="columns small-12 medium-8">

                <table>
                    <thead>
                    <tr>
                        <th width="150">Race Time</th>
                        <th width="150">Race Meeting </th>
                        <th width="150">N. Competitors*</th>
                        <th width="150">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($current_races as $current_race)
                    <tr>
                        <td>{{$current_race->closing_time}}</td>
                        <td>{{$current_race->meeting->location}}</td>

                        <td>{{count($current_race->competitors)}}</td>
                        <td>{{$current_race->isClosed()}}</td>

                    </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>

        </div>
    </div>

@endsection
