<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- <script src="https://cdn.tailwindcss.com"></script> --}}

        <title>Laravel</title>

        <!-- Fonts -->
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
    </head>

    <body class="antialiased bg-bgPrimary">
        <div id="app">
            <App/>
        </div>
    </body>
</html>
