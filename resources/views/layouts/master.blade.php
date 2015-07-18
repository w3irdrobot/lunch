<!DOCTYPE html>
<html>
<head>
    <title>Lunch Run</title>
</head>
<body>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @yield('content')
</body>
</html>