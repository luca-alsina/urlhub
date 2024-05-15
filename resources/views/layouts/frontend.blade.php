<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@lang('pages/common.title')</title>

    @livewireStyles
    @filamentStyles
    @vite(['resources/css/main.css', 'resources/js/app.js'])
</head>

<body class="@yield('css_class')">
    @include('partials.header')

    @yield('content')

    @livewireScripts
    @filamentScripts
</body>

</html>
