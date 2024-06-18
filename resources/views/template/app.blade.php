<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('template.partials._head')
    </head>

    <body class="antialiased bg-bgPrimary h-full">
        <div id="app" class="box-border h-screen mt-4">
            <router-view/>
        </div>
    </body>
</html>
