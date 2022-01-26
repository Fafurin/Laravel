<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{asset('js/app.js')}}" defer></script>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>@yield('title')</title>
</head>
<body>
    <div class="header">
        <h3> This is the header </h3>
    </div>

    <div class="content">
        @yield('content')
    </div>

    <div class="footer">
        <h3> This is the footer </h3>
    </div>
</body>
</html>
