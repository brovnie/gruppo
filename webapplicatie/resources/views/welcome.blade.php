<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('partials.head')
    <body class="antialiased">
        @include('partials.header')
        <div class="main" id="app">
            <div class="grid grid-cols-2 bg-white w-full">
                <div>
                    <h1>Gruppo slogan</h1>
                </div>
                <div>
                    <div id="login" class="@if(Session::has('register_validation_form') == true) hidden @endif">
                        @include('auth.login');
                            <p>{{ __('Nog geen account?') }} <button id="register-trigger">{{ __('Register') }}</button></p>
                    </div>
                    
                    <div id="register" class="@if(Session::has('register_validation_form') == true) active @else hidden @endif">
                        @include('auth.register');
                            <p>{{ __('Al een account?') }} <button id="login-trigger">{{ __('Inloggen') }}</button></p>
                    </div>
                </div>
            </div>
        </div>        
    </body>
</html>
