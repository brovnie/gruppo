<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('partials.head')
<body>
    <div id="app" class="gruppo-app @yield('pageClass')">
    @include('partials.header')
        <main class="flex flex-col py-0 md:py-4">
            @yield('content')
        </main>
    @include('partials.footer')
    </div>
</body>
</html>