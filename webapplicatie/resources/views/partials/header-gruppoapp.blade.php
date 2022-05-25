<div class="mobile-app-header md:hidden w-screen">
    <div class="flex items-center md:hidden container h-full w-full">
    
    @if(Request::path() === '/index')
    
    <div class="mr-10 flex-1">
        <a href="url()->previous()" class="fake-h4">Go back</a>
    </div>
    
    @endif
    
    <div class="h-full flex items-center md:hidden w-full">
        <p class="fake-h3 flex-1">@yield('pageTitle')</p>
    </div>

</div>