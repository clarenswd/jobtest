@extends('layouts.app')
@section('content')

            <div class="content">
                <h5 class="title text-center">Next 5 races</h5>
                <ul class="list_races">
                    @foreach ($races as $race)
                        <li>
                            <a href="/races/{{$race->id}}" class="jx-countdown race {{$race->meeting->type}}-race" data-closing-time="{{$race->closing_time}}">
                                <span class="jx-countdown-value">{{$race->closing_time}}</span>
                                -
                                <span class="location">
                                    <i class="pe-7s-map-marker"></i>
                                        {{$race->meeting->location}}
                                </span>
                                <i class="pe-7s-angle-right"></i>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>


@endsection

@section('xtra-js')
    <script src="/js/jquery.countdown.min.js"></script>
    <script>
        $(function(){
            $('a.jx-countdown').each(function(){
                var selfy =$(this);
                selfy.countdown("2020/10/10"+" "+selfy.data('closing-time'))
                    .on('update.countdown', function(event) {
                        var format = '%H:%M:%S';
                        console.log(event.offset.minutes);

                        if(event.offset.minutes > 0) {
                            format = '%-M mins %-S sec' ;
                        }
                        if(event.offset.minutes > 0) {
                            format = '%-M mins %-S sec' ;
                        }
                        $('.jx-countdown-value', selfy).html(event.strftime(format));
                    })
                    .on('finish.countdown', function(event) {
                        $(this).hide()

                    });;
            });
        });
    </script>
@endsection