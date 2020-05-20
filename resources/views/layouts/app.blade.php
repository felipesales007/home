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
        <!-- spinner -->
        <div class="site-loader"></div>

        <!-- menu -->
        @include('layouts.components.menu')

        <!-- corpo -->
        <div class="main-content">
            @yield('content')
        </div>

        <!-- rodapé -->
        @include('layouts.components.footer')

        <!-- whatsapp -->
        @include('layouts.components.whatsapp')

        <!-- javascript -->
        @include('layouts.import.js')
    </body>
</html>
