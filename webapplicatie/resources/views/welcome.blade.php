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
                    <div>
                        @include('auth.login');
                            <p>Nog geen account? <a>Register</a></p>
                    </div>
                    <div>
                        @include('auth.register');
                    </div>
                </div>
            </div>
        </div>        
    </body>
</html>
