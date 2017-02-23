@extends('layouts.app')
@section('content')

            <div class="content">
                <span class="title">Next 5 races</span>
                <ol>
                    @foreach ($races as $race)
                        <li><a href="/races/{{$race->id}}" class="jx-countdown race {{$race->meeting->type}}-race" data-closing-time="{{$race->closing_time}}">{{$race->closing_time}}<i class="pe-7s-angle-right"></i></a></li>
                    @endforeach
                </ol>
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
//                        if(event.offset.minutes > 0) {
//                            format = '%-M:%-S' ;
//                        }

                        $(this).html(event.strftime(format));
                    })
                    .on('finish.countdown', function(event) {
                        $(this).hide()

                    });;
            });
        });
    </script>
@endsection