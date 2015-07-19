<!DOCTYPE html>
<html>
    <head>
        <title>Lunch Run</title>
        <link href='http://fonts.googleapis.com/css?family=Courgette' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" media="all" type="text/css" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.min.js"></script>
        <script type="text/javascript" src="/js/jquery-ui-timepicker-addon.js"></script>
        <script type="text/javascript" src="/js/jquery-ui-sliderAccess.js"></script>
        <link rel="stylesheet" media="all" type="text/css" href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" />
        <link rel="stylesheet" media="all" type="text/css" href="/css/jquery-ui-timepicker-addon.css" />
        <link rel='stylesheet' href='/css/style.css' />
        @yield('header')
    </head>
    <body class='inside'>
        <div class='pull-right toprightmenu print-hide'>
            <a href="/organizations">Home</a> |
            <a href="/auth/logout">Logout</a>
        </div>

        <div id="page_header">

            <div class="container">

                        <h1> <img src="/img/round-logo.png" height="42" width="42"> Lunch.Run</h1>

            </div><!-- end container -->


        </div><!-- end page_header -->

        @if (session('status'))
        <div class='container'>
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        </div>
        @endif

        <div class='container'>
            <div id="main-content">
                @yield('content')
            </div>
        </div>

        <div class="footer">
        </div>

    </body>
</html>