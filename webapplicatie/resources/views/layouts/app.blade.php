<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@extends('partials.head')
<body>
    <div id="app">
    @extends('partials.header')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
