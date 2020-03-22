<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Intellipharm - @yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="css/app.css" rel="stylesheet">
    </head>
    <body>
        <div id="app" class="container">
            @yield('content')
        </div>
        <!-- Include JS -->
        <script src="js/app.js"></script>
    </body>
</html>
