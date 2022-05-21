<div class="flex items-center md:hidden container">
@if(Request::path() === '/index')
<div class="mr-10">
    <a href="url()->previous()">Go back</a>
</div>
@endif
<div class="">
    <p class="font-bold">@yield('pageTitle')</p>
</div>