<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sprightly</title>
    {!! Html::script('js/jquery.min.js') !!}
    {!! Html::script('js/bootstrap.min.js') !!}
    {!! Html::script('js/bootstrap-tagsinput.js') !!}
    {!! Html::script('js/chart.js') !!}

    {!! Html::style('css/bootstrap.css') !!}
    {!! Html::style('css/exclusive.css') !!}
    {!! Html::style('css/bootstrap-tagsinput.css') !!}
</head>
<body>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/projects">
                <span><i class="glyphicon glyphicon-education"></i>&nbsp;Sprightly</span>
                </a>
        </div>

        <div class="collapse navbar-collapse" id="navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li>
                        <a href="{{ url('/login') }}">
                            <span><i class="glyphicon glyphicon-log-in"></i></span>
                            &nbsp;Login
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/register') }}">
                            <span><i class="glyphicon glyphicon-unchecked"></i></span>
                            &nbsp;Register
                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{ url('/logout') }}">
                            <span><i class="glyphicon glyphicon-log-out"></i></span>
                            &nbsp;Logout
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    @yield('content')
</div>

</body>
</html>