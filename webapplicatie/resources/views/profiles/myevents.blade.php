@extends('layouts.app')
@section('pageTitle', 'Mijn evenementen')
@section('title', 'Gruppo App mijn evenementen')
@section('pageClass', 'index')

@section('content')
<div class="container mx-auto">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($events->reverse() as $event)
                    <div class="flex relative space-x-5 justify-center md:justify-start">
                    <div class="img-wrapper profile-img--xl profile-shadow">
                                <img class="img" src="/storage/{{$event->getAdminFromEvent($event)->profil_photo}}" alt="profile picture">
                            </div>
                            <div>
                                <p><span class="font-bold">{{$event->getAdminFromEvent($event)->name}}<span class="text-graytext font-normal"> &#64;{{$event->getAdminFromEvent($event)->user->username}} ● {{$event->getDate('created_at')}}</p>
                            <div class="my-3">
                                <p class="">{{$event->description}}</p>
                            </div>


                            <div class="grid grid-cols-2 gap-3 pb-5">
                                <div class="flex items-center space-x-3">
                                    <div class="img-wrapper img-icon">
                                        <img src="/storage/icons/calendar.svg" class="img">
                                    </div>
                                    <p class=""> {{$event->getDate('date')}}</p>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <div class="img-wrapper img-icon">
                                        <img src="/storage/icons/ball.svg" class="img">
                                    </div>
                                    <p>{{$event->sport}}</p>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <div class="img-wrapper img-icon">
                                        <img src="/storage/icons/time.svg" class="img">
                                    </div>
                                    <p><span></span> {{$event->getTimeWithoutSeconds()}}</p>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <div class="img-wrapper img-icon">
                                        <img src="/storage/icons/location.svg" class="img">
                                    </div>
                                    <p><span></span> {{$event->location}}</p>
                                </div>
                            </div>
                            <a href="/events/{{$event->id}}" alt="check event" class="btn btn--inline btn--yellow w-auto block readmore-btn"> Lees meer </a>
                        </div>
                        <a href="/events/{{$event->id}}" alt="check event" class="hidden-link md:hidden"> Event </a>

                    </div>
                    @if($loop->count > 1 && !$loop->last) 
                        <hr class="line-behind my-4">
                    @endif
                    
                    @endforeach

</div>
    <a href="/events/create" class=" fixed bg-primary rouded-full btn--create-event flex justify-center items-center md:hidden"><span class="opacity-0 w-0 h-0">Create event</span>
    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
    </svg>
</a>
@endsection
