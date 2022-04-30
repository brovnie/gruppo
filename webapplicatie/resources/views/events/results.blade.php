@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Resultaten') }}</div>
                <div class="card-body">
                    <p>{{__('Kies de beste speler!')}}</p>
<form method="post" action="/events/{{$event->id}}/team/{{Auth::user()->id}}/results">
    @csrf
    @method('PATCH')
    @foreach($event->participants()->get() as $participant)
        @if($participant->user->id != Auth::user()->id) 
            <div>
                <img src="/storage/{{$participant->profil_photo}}" alt="profile picture"> 
                <input type="radio" value="{{$participant->id}}" name="best_player_id">
                <label for="best_player_id">{{$participant->name}} <span>{{$participant->get_username() }} </span></label>  
            </div>  
        @endif
    @endforeach
    <div>
        <button type="submit">{{__('Indienen')}}</button>
    </div>
</form>
    </div>
            </div>
        </div>
    </div>
</div>
<div> 
</div>
@endsection
