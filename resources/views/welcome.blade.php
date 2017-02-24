@extends('layouts.app')
@section('content')

            <div class="content columns small-12 medium-6">
                <h5 class="title text-center">Next 5 races</h5>
                <ul class="list_races">
                    @if(count($races)==0)
                        <span>All races are closed.</span>
                    @endif
                    @foreach ($races as $race)
                        <li>
                            <a href="/races/{{$race->id}}" class="jx-countdown race {{$race->meeting->type}}-race" data-closing-time="{{$race->closing_time}}">
                                <span class="jx-countdown-value">{{$race->closing_time}}</span>

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

            @include('project-info')






@endsection

@section('xtra-js')
    <script src="/js/jquery.countdown.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
    <script>
        $(function(){
            $('a.jx-countdown').each(function(){
                var selfy =$(this);
                var now = moment().format("YYYY-MM-DD");
                selfy.countdown(now +" "+selfy.data('closing-time'))
                    .on('update.countdown', function(event) {
                        var format = '%H:%M:%S';

                        if(event.offset.minutes > 0) {
                            format = '%-M mins %-S sec' ;
                        }
                        if(event.offset.minutes > 0) {
                            format = '%-M mins %-S sec' ;
                        }
                        $('.jx-countdown-value', selfy).html(event.strftime(format));
                    })
                    .on('finish.countdown', function(event) {
                        selfy.addClass("finished");
                        selfy.parent('li').hide();
                        //Get new batch ajax




                    });;
            });
        });
    </script>
@endsection