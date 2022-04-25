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
                    <div>
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
                            <p>{{ __('Team') }}  <participating-players></participating-players>/<span>{{$event->allowed_participants}}</span></p>
                        </div>
                    <team-list></team-list>
                    </div>
                    <div>
                        Map
                    </div>
                    @if($event->isUserParticipating($event->participants))
                    <div >
                        <p>{{__('Eindstand')}}</p>
                        <div>
                            @if($event->match_results != null) 
                                <p>{{$event->match_results}}</p>
                            @else
                                <div>
                                    <p>{{__('Invullen na de wedstrijd')}}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                    @endif
                    <match-summary></match-summary>
                    <add-remove-player user-id="{{ Auth::user()->id }}"></add-remove-player>
                </div>
            </div>
        </div>
    </div>
</div>
<div> 
</div>
@endsection
