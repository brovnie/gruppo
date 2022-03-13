<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@extends('partials.head')
    <body class="antialiased">
        @extends('partials.header')
        <div class="main">
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
        </div>
</div>
    </body>
</html>
