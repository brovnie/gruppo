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
                    <p>Welcome to events</p>
                    <p class="font-bold">Current user: {{$user->username}}</p>
                    @foreach($events as $event)
                    <div>
                        
                        @foreach($profiles as $profile) 
                            @if($event->admin_id == $profile->user_id)
                            <div>
                                <img src="/storage/{{$profile->profil_photo}}" alt="profile picture">
                            </div>
                            <div>
                                <p><span>{{$profile->name}}<span> &#64;{{$profile->user->username}} | {{$event->getDate('created_at')}}</p>
                            @endif
                        @endforeach
                            <div>
                                <p class="">{{$event->description}}</p>
                            </div>
                            <div>
                                <div>
                                    <p class="">Date: {{$event->getDate('date')}}</p>
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
                        </div>
                        <a href="/events/{{$event->id}}" alt="check event"> Event </a>
                    </div>
                    @endforeach
                    <p class="font-bold">{{$user->username}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div>
    <a href="/events/create" >Create event</a>
</div>
@endsection
