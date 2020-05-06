<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- cabeçalho -->
        @include('layouts.import.head')

        <!-- título da aba -->
        <title>{{ config('app.name') }} - @yield('title')</title>

        <!-- css -->
        @include('layouts.import.css')

        <!-- javascript prioritário -->
        @include('layouts.import.js-head')
    </head>
    <body ondragstart="return false;">
        <!-- corpo -->
        <div>
            <div>
                @yield('content')
            </div>

            <!-- whatsapp -->
            @include('layouts.components.whatsapp')
        </div>

        <!-- javascript -->
        @include('layouts.import.js')
    </body>
</html>
