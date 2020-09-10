<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">     
        <title> @yield('title', "unkownpage") </title>
        <link rel="stylesheet" href={{ asset('css/app.css') }}>
    </head>
    <body>
        
        @include('layout.navbar')

        <div class="container">
            @yield('content')
        </div>

        @include('layout.sidebar')
        
        {{-- @section('sidebar')
            We are Pleased to join our page :)             
        @show --}}


</body>
</html>
