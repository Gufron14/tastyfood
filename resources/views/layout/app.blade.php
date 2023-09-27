<!DOCTYPE html>
<html lang="en">

<head>

    @include('layout.header')

</head>

<body>

    <div>
        @if (Request::is('login') || Request::is('register'))
        
        @else
            @if (Request::is('/'))
                @include('layout.navbar')
            @else
                @include('layout.navbar2')
            @endif
        @endif

    </div>

    <div>
        @yield('content')
    </div>

    <div>
        @if (!Request::is('login') && !Request::is('register'))
            @include('layout.footer')
        @endif

    </div>

    @include('layout.script')

</body>

</html>
