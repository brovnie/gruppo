@extends('layouts.app')
@section('pageTitle', 'Resultaten')
@section('title', 'Gruppo App Resultaten')
@section('pageClass', 'event-results')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body w-full">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @isset($message)
                        <p>{{$message}}</p>
                    @endisset
                    <div class="flex relative space-x-5 justify-center md:justify-start mb-10">
                            <div>
                                <div class="img-wrapper profile-img--xl profile-shadow">
                                    <img 
                                        src="/storage/{{$event->getAdmin()->profil_photo}}" 
                                        alt="profile picture"
                                        class="img">
                                </div>
                            </div>
                        
                        <div>
                            <div>
                                <p><span  class="font-bold">{{$event->getAdmin()->name}}<span class="text-graytext font-normal"> &#64;{{$event->getAdmin()->user->username}} ● {{$event->getDate("created_at")}}</p>
                            </div>
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
                    </div></div>
                    <div class="mb-10">
                        <div class="flex mb-5 space-x-3">
                            <p class="inline-block fake-h2">{{ __('Team') }}  </p>
                            <div class="flex space-x-3 items-center">
                                <participating-players></participating-players><div> <p>/ {{$event->allowed_participants}}</p></div>
                            </div>
                        </div>
                    <team-list></team-list>
                    </div>
                    @if(Auth::user() )
                    <div class="hidden">
                        Map
                    </div>
                    @endif
                    <div class="mt-10">
                        <p class="mb-5 fake-h2">{{ __('Best Speler') }} <p>
                            <best-player></best-player>
                    </div>
                    @if( Auth::user() )

                    @if ($event->isGameToday() && $event->isUserParticipating() && $event->hasUserChooseBestPlayer() == false) 
                            <close-game user-id="{{ Auth::user()->id }}" event-date="{{ $event->date }}" event-start-time="{{ $event->start_time }}" ></close-game>
                    @endif
                    @if(is_null($event->best_player)) 
                    @if(Auth::user()->id !=  $event->getAdmin()->user->id)     
                            <add-remove-player user-id="{{ Auth::user()->id }}"></add-remove-player>
                    @endif
                    @endif
                    @else 
                        <p>{{ __('Wil je meer weten over dit speel?')}}</p>
                        <a href="/register">{{ __('Maak een account')}} </a>
                        <p>{{ __('Heb je al een account?') }} <a href="/login">{{__('Log je in')}}</a> </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div> 
</div>
@endsection
