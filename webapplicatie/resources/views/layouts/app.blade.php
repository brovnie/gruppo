<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('partials.head')
<body class="gruppo-app @yield('pageClass')">
    <div id="app">
    @include('partials.header')
        <main class="py-4 container mx-auto">
            <div class="py-4 md:grid grid-cols-12 md:gap-20 lg:gap-10">
        <div class="col-span-3 menu-app-pc">
            <div class="">
                @include('partials.mobile-nav')
            </div>
        </div>
        
            <div class="col-span-9">
                @yield('content')
            </div>
</div>
        </main>
    @include('partials.footer')
    </div>
</body>
</html>
