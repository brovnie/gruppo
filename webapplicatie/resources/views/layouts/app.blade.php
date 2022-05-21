<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('partials.head')
<body class="gruppo-app @yield('pageClass')">
    <div id="app">
    @include('partials.header')
        <main class="py-4">
            @yield('content')
        </main>
    @include('partials.mobile-nav')
    @include('partials.footer')
    </div>
</body>
</html>
