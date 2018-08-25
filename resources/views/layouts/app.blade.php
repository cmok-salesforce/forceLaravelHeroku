<html>
    <head>
        <title>@yield('title')</title>
    </head>
    <body>
        <h1>@yield('header')</h1>
        
        @section('body')
            This is the master body.
        @show

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>