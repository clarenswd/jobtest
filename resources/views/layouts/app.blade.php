<!-- Stored in resources/views/layouts/app.blade.php -->
<html>
<head>
    <title>JOB TEST - @yield('title')</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.0/css/foundation.min.css" />
    {{--icons.--}}
    <link rel="stylesheet" href="/css/pe-icon-7-stroke.css">

    {{--Compiled SCSS --}}
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
<div class="top-bar" id="realEstateMenu">
    <div class="top-bar-left">
        <ul class="menu accordion-menu" data-responsive-menu="accordion" role="tablist" aria-multiselectable="true" data-accordionmenu="39s4i0-accordionmenu" data-responsivemenu="9g2xqu-responsivemenu">
            <li class="menu-text" role="menuitem"><a href="/">Job test</a></li>
        </ul>
    </div>
    <div class="top-bar-right">
        <ul class="menu">
            <li><a href="/">Races</a></li>
            <li><a href="/races/create" >Create Race</a></li>
            <li><a href="/seedraces" >Seed Race Table</a></li>
        </ul>
    </div>
</div>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="callout primary">
        <p>{{ Session::get('message') }}</p>
    </div>
@endif


<!-- BODY FROM PARTIALS -->
<div class="container row">
    @yield('content')
</div>
<!-- EOF BODY FROM PARTIALS -->





<script
        src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous"></script>
@yield ('xtra-js')

@yield ('jx-scripts')
</body>
</html>