<div class="">
<div class="fixed w-full z-10">
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container grid grid-cols-2 md:flex lg:grid-cols-2 mx-auto">
                <a class="navbar-brand hidden md:block md:col-span-1" href="{{ url('/') }}">
                    <div class="img-wrapper logo">
                        <img src="/storage/logo/logo_horizontal.svg" alt="logo Gruppo" class="img">
                    </div>
                </a>
                @if(Request::path() === '/' || Request::path() === '/login')
                    @include('partials.header-welcome')
                @else
                    @include('partials.header-gruppoapp')
                @endif
            </div>
        </nav>
</div>
</div>