<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <link href="{{mix('css/app.css')}}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div>
            <div id="app"></div>
        </div>
        <script src="{{mix('js/app.js')}}" ></script>
    </body>
</html>
