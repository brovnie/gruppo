@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @isset($message)
                        <p>{{$message}}</p>
                    @endisset
                    <div>
                        {{Auth::user()->id}}
                            <div>
                                <img src="/storage/{{$event->getAdmin()->profil_photo}}" alt="profile picture">
                            </div>
                            <div>
                                <p><span>{{$event->getAdmin()->name}}<span> &#64;{{$event->getAdmin()->user->username}} | {{$event->getDate("created_at")}}</p>
                        </div>
                    </div>
                    <div>
                            <div>
                                <p>Date: {{$event->getDate('date')}}</p>
                            </div>
                            <div>
                                <p>Time: {{$event->getTimeWithoutSeconds()}}</p>
                            </div>
                            <div>
                                <p>Sport: {{$event->sport}}</p>
                            </div>
                             <div>
                                <p>Place: {{$event->location}}</p>
                            </div>
                    </div>
                    <div>
                        <div>
                            <p>{{ __('Team') }}  
                                <participating-players></participating-players> / <span>{{$event->allowed_participants}}</span>
                            </p>
                        </div>
                    <team-list></team-list>
                    </div>
                    @if(Auth::user())
                    <div>
                        Map
                    </div>
                    @endif
                    <div>
                        <p>{{ __('Best Speler') }} <p>
                            <best-player></best-player>
                    </div>
                    @if(Auth::user())

                        @if ($event->isGameToday() && $event->isUserParticipating() && $event->hasUserChooseBestPlayer() == false) 
                            <close-game user-id="{{ Auth::user()->id }}" event-date="{{ $event->date }}" event-start-time="{{ $event->start_time }}" ></close-game>
                        @endif

                        @if(Auth::user()->id !=  $event->getAdmin()->user->id)     
                            <add-remove-player user-id="{{ Auth::user()->id }}"></add-remove-player>
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
