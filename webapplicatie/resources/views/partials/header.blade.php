<div class="fixed w-full z-10">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container grid grid-cols-2 mx-auto">
                <a class="navbar-brand hidden md:block" href="{{ url('/') }}">
                    <div class="img-wrapper logo">
                        <img src="/storage/logo/logo_horizontal.svg" alt="logo Gruppo" class="img">
                    </div>
                </a>
                @if(Request::path() === '/')
                    @include('partials.header-welcome')
                @else
                    @include('partials.header-gruppoapp')
                @endif
            </div>
        </nav>
</div>