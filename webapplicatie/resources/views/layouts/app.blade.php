<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('partials.head')
<body>
    <div id="app">
    @include('partials.header')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
