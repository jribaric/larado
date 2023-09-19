<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" sizes="16x16" href="public/images/favicon-16x16.png">
        @vite(['resources/css/app.css','resources/js/app.js'])
        <script src="https://kit.fontawesome.com/be547f51d3.js" crossorigin="anonymous"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <title>Laravel</title>
    </head>
    <body class=" bg-cyan-800">
        @include('components.header')
        {{-- <a href="/create" class=" m-2 bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l">Create Task</a> --}}
        <div class="grid mt-10 place-items-center">
            @if(session()->has('message'))
                <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show"
                class="fixed top-12 left-1/2 transform -translate-x-1/2 bg-laravel text-white px-48 py-3">
                    <p>
                    {{session('message')}}
                    </p>
                    </div>
            @endif
            {{ $slot }}
        </div>

    </body>
</html>
