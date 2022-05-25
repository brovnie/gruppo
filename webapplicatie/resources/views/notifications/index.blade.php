@extends('layouts.app')
@section('pageTitle', 'Notificaties')
@section('title', 'Gruppo App notificaties')
@section('pageClass', 'notifications')

@section('content')
<h1 class="text-center">Comming soon</h1>
<a href="/events/create" class=" fixed bg-primary rouded-full btn--create-event flex justify-center items-center md:hidden"><span class="opacity-0 w-0 h-0">Create event</span>
    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
    </svg>
</a>
@endsection