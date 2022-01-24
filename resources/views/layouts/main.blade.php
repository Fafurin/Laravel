<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
