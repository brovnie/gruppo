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
                                <img src="/storage/{{$admin->profil_photo}}" alt="profile picture">
                            </div>
                            <div>
                                <p><span>{{$admin->name}}<span> &#64;{{$admin->user->username}} | {{$event->created_at}}</p>
                        </div>
                    </div>
                    <p class="font-bold">{{$event->location}}</p>
                    <div>
                    @foreach($event->participants as $participant)
                        @if($participant->id != $event->admin_id)
                            <div>
                                <img src="/storage/{{$participant->profil_photo}}" alt="profile picture " >
                                <a href="/profiles/{{$participant->user->username}}" alt="">Link Profile</a>
                            </div>
                        @endif
                    @endforeach
                    </div>
                    <div>
                        Map
                    </div>
                    <div>
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
                    
                </div>
            </div>
        </div>
    </div>
</div>
<div> 
    <a href="/event/create" >
</div>
@endsection
