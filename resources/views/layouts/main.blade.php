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
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="header">
                <hr>
                @include('blocks.menu')
            </div>
            <div class="content">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        @yield('content')
                    </div>
                </div>
            </div>

            <div class="footer">
                <hr>
            </div>
        </div>
    </div>
</body>
</html>
