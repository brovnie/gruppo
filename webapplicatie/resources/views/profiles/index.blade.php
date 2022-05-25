@extends('layouts.app')
@section('pageTitle', 'Profile')
@section('title', 'Gruppo App profile')
@section('pageClass', 'user-profile')

@section('content')
<div class="container mx-auto px-5 md:px-0 text-center md:text-left">
    <div>
        <p class="font-bold fake-h2 mb-5">{{$user->username}}</p>
    </div>
    <div>
        <div class="img-wrapper profile-img--xl profile-shadow mx-auto md:mx-0">
            <img class="img" src="/storage/{{$user->profile->profil_photo}}" alt="profile picture">
        </div>
</div>
<div>
<profile-stats 
    user-id="{{$user->id}}" 
    friends="4" 
    participated="{{ $user->profile->participated }}" 
    smileys="{{ $user->profile->smileys }}">
</profile-stats>

    <p class="fake-h3 mt-5 mb-3 pt-5">Over mij</p>
    <div>
        <p>{{ $user->profile->biography ?? 'test'}}</p>
    </div>
    <div class="flex gap-5 py-5 mt-5 text-center md:mx-20">
        <div class="flex-1">
            <p>
                {{$user->profile->favorite_sport ?? 'n/a'}} 
            </p>
        </div>
    <div class="flex-1">
    <p><span></span>
        {{$user->profile->location ?? "n/a"}} 
</p>
    </div>
    <div class="flex-1">
    <p><span></span>
        {{$user->profile->get_age() ?? "n/a"}} years
 </p>
    </div>
</div>
<div class="mt-5"><a href="/profiles/{{$user->username}}/edit" class="btn btn--inline btn--yellow w-auto">Profile bewerken</a></div>
</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
