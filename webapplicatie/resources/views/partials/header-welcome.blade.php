<div class="menu flex-1 col-start-2 md:col-auto " >
    <div class="block lg:hidden">
        <div class="hamburger-icon " id="menu-hamburger">
            <div class="stripe stripe-1 "></div>
            <div class="stripe stripe-2 "></div>
            <div class="stripe stripe-3 "></div>
        </div>
    </div>
    <ul id="menu-list" class="hidden lg:flex space-x-5 items-center static h-full justify-end" >
        <li class="menu-item hover-white">
            <a href="#home" class="px-3 py-4"> Home </a>
        </li>
        <li class="menu-item hover-white">
            <a href="#over" class="px-3 py-4">
                Over Gruppo
            </a>
        </li>
        <li class="menu-item hover-white">
            <a href="#team" class="py-4 px-3"> Team </a>
        </li>
        <li class="menu-item hover-white">
            <a href="#contact" class="px-3 py-4">
                Contact
            </a>
        </li>
@guest
     @if (Route::has('login'))
        <li class="menu-item">
            <a href="{{ route('login') }}" class="py-1 btn btn--inline btn--white btn--inline special-btn">{{ __('Login') }}</a>
        </li>
        @endif
        @else
        <li class="menu-item">
            <div class="menu-collapse">
                <div class="img-wrapper img-wrapper--circle profile-img profile-img--nav">
                    <img class="img" src="/storage/{{Auth::user()->profile->profil_photo}}">
                </div>
                <div class="hidden flex-col space-y-5 collapse">
                    <a class="dropdown-item">{{ __('Go to app') }}</a>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                    </form>
                </div>
            </div>
        </li>
@endguest
    </ul>
</div >   