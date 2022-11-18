<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"  class="white">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Vidyasagar University') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        {{-- <style>
            *container-fluid{
                background-color: red
            }
        </style> --}}
    </head>
    <body >
        <div class="font-sans text-gray-900 antialiased" >
            {{-- <div style="background-color: aqua"> --}}
                {{ $slot }}
            {{-- </div> --}}

        </div>
    </body>
</html>
