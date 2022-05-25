@extends('layouts.app')
@section('pageTitle', 'Resultaten')
@section('title', 'Gruppo App resultaten')
@section('pageClass', 'results')

@section('content')
<div class="container mx-auto">
    <div class="">
        <div class="text-left">
            <div class="">
                <p class="fake-h1 text-center md:text-left">{{ __('Resultaten') }}</p>
                <div class="ml-0 mr-auto">
                    <p class="mt-5 mb-3 fake-h2 text-center md:text-left w-full">{{__('Kies de beste speler!')}}</p>
<form method="post" action="/events/{{$event->id}}/team/{{Auth::user()->id}}/results" >
    @csrf
    @method('PATCH')
    <div class="grid grid-cols-2">
    @foreach($event->participants()->get() as $participant)
        @if($participant->user->id != Auth::user()->id) 
            <div class="results--single-player">
                <div class="img-wrapper profile-img--xl profile-shadow radio--select-img">
                <img class="img rounded-full" src="/storage/{{$participant->profil_photo}}" alt="profile picture"> 
                    <input type="radio" value="{{$participant->id}}" name="best_player_id" class="hidden-radio">
                    <div class="input--checked-border"></div>
                </div>
                <label for="best_player_id">{{$participant->name}} <span>{{$participant->get_username() }} </span></label>  
            </div>  
        @endif
    @endforeach
</div>
    <div class="mt-5 mx-10">
        <button type="submit" class="btn btn--orange btn--inline pt-fix-5 mt-10">{{__('Indienen')}}</button>
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
